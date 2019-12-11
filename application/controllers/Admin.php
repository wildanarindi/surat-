<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public $konten = array('main_view' => '', );
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
        $this->load->model('Admin_model', 'admin', TRUE);
        $this->load->model('User_model', 'user', TRUE);
        $this->load->model('Role_model', 'role', TRUE);
        $this->load->model('Access_model', 'access', TRUE);
        $this->load->helper('logged_helper', TRUE);
	}
//adm
	public function index()
	{
        $data['title'] = 'Admin';
		$this->konten['main_view'] = $this->load->view('admin/index',$data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);
	}

// Roleeeeee --------------------------------------------------------------------------------------------


public function role()
{
    $data = array(
        'title' =>  'role',
        'role' =>  $this->db->get('user_role')->result_array(),
    );

    $this->form_validation->set_rules ('role','Role','required');
    if ($this->form_validation->run() ==false) {
        $this->konten['main_view'] = $this->load->view('admin/role', $data, TRUE);
        $this->load->view('templates/dashboard', $this->konten);
} else {
    $this->db->insert('user_role',['role' =>$this->input->post('role')]); 
    $this->session->set_flashdata('flash21', 'Ditambahkan');
    redirect('admin/role');
 }
}
   
public function hapusrole($id)
{
 $this->db->delete('user_role', ['id' => $id]);
 $this->session->set_flashdata('flash21', 'Dihapus');
 redirect('admin/role');
}


public function roleAccess($role_id)
{
 $data['title'] = 'Role Access';
 $data['dd_user'] = $this->db->get_where('dd_user', ['username' => 
 $this->session->userdata('username')])->row_array();

 $data = array(
	'title' =>  'role',
	'role' =>  $this->db->get_where('user_role',['id' => $role_id])->row_array(),
	'menu' => $this->db->get('user_menu')->result_array(),
);
$this->db->where('id !=', 1);
$this->konten['main_view'] = $this->load->view('admin/role-access', $data, TRUE);
$this->load->view('templates/dashboard', $this->konten);
 
}

public function changeAccess()
{
 $menu_id =$this->input->post('menu_id');
 $role_id =$this->input->post('role_id');
//  $sourceb='';
//  $role_id = $this->input->post('roleId');
// 		if(!$role_id) {
// 			$plab='';
// 			}else{
// 				foreach ($role_id as $one_plib) {
// 					$sourceb.=$one_plib.",";
// 				}
// 			$plab=substr($sourceb,0,-1);
// 			}
 $data = [
	 'role_id' => $role_id,
     'menu_id' => $menu_id,   

 ];
 $result = $this->db->get_where('user_access_menu', $data);
 
 if ($result->num_rows()< 1) {
     $this->db->insert('user_access_menu', $data);
 } else {
     $this->db->delete('user_access_menu', $data);
 }

 $this->session->set_flashdata('flash20', 'Di Ubah');
}

// User -------------------------------------------------------------------------------------------------------	
	public function user()
	{
		$data = array(
			'title' =>  'User',
			'user' => $this->user->userAdmin(),
			'role' => $this->db->get('user_role')->result_array(),
		);
		$this->konten['main_view'] = $this->load->view('admin/user',$data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);
	}

	public function ajax_list_user()
	{
		$list = $this->user->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $us) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = strtoupper($us->name);
			$row[] = strtoupper($us->username);
			$row[] = strtoupper($us->role);
			$row[] = strtoupper($us->id_active);

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$us->id_dd_user."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$us->id_dd_user."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->user->count_all(),
			"recordsFiltered" => $this->user->count_filtered(),
			"data" => $data,
	);
		//output to json format
		echo json_encode($output);
		}
	
    public function ajax_edit_user($id)
	{
		$data = $this->user->get_by_id($id);
		echo json_encode($data);
	}

	// public function ajax_add_user()
	// {
	// 	$this->_validate_user();
	// 	$data = array(
	// 			'name' => $this->input->post('name'),
	// 			'username' => $this->input->post('username'),
	// 			'role_id' => $this->input->post('role_id'),
	// 			'id_active' => $this->input->post('id_active'),
	// 		);
	// 	$insert = $this->user->save($data);
	// 	echo json_encode(array("status" => TRUE));
	// }

	public function ajax_update_user()
	{
		$this->_validate_user();
		$data = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'role_id' => $this->input->post('role_id'),
			'id_active' => $this->input->post('id_active'),
			);
		$this->user->update(array('id_dd_user' => $this->input->post('id_dd_user')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete_user($id)
	{
		$this->user->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate_user()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

// ------------ access ----------------------------------------------------
// Roleeeeee --------------------------------------------------------------------------------------------

public function ajax_list_access()
{
	$list = $this->access->get_datatables();
	$data = array();
	$no = $_POST['start'];
	foreach ($list as $us) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = strtoupper($us->menu_id);
		$row[] = strtoupper($us->role_id);

	
		//add html for action
		$data[] = $row;
	}

	$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->access->count_all(),
		"recordsFiltered" => $this->access->count_filtered(),
		"data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_access($id)
{
	$data = $this->access->get_by_id($id);
	echo json_encode($data);
}

public function ajax_add_access()
{
		$menu_id =$this->input->post('menu_id');
		$role_id =$this->input->post('role_id');
		
	$data = array(
		'menu_id' => $menu_id,
        'role_id' => $role_id
			
		);
	$insert = $this->access->save_access($data);
	$data['kliru'] = 'Sudah Tersimpan';
	$data['status'] = true;
	echo json_encode($data);
}

// public function ajax_update_access()
// {

// 		$menu_id =$this->input->post('menu_id');
// 		$role_id =$this->input->post('role_id');
		
// 	$data = array(
// 		'menu_id' => $menu_id,
//         'role_id' => $role_id
			
// 		);

// 	$this->access->update(array('id' => $this->input->post('id')), $data);
// 	$data['kliru'] = 'Sudah Tersimpan';
// 	$data['status'] = true;
// 	echo json_encode($data);
// }


public function ajax_delete_access($id)
{
	$this->access->delete_by_id($id);
	echo json_encode(array("status" => TRUE));
}
///   Access -----------------------------------------------------------------------------------------

}