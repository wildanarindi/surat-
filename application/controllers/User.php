<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public $konten = array('main_view' => '', );

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user', TRUE);
		$this->load->model('Admin_model', 'admin', TRUE);
	}
//adm
	public function index()
	{
		$data['title'] = 'user';
		$this->konten['main_view'] = $this->load->view('user/index',$data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);
	}

// 	public function ajax_list()
// 	{
// 		$list = $this->user->get_datatables();
// 		$data = array();
// 		$no = $_POST['start'];
// 		foreach ($list as $us) {
// 			$no++;
// 			$row = array();
// 			$row[] = $no;
// 			$row[] = strtoupper($us->name);
// 			$row[] = strtoupper($us->username);
// 			$row[] = strtoupper($us->role_id);
// 			$row[] = strtoupper($us->id_active);

// 			//add html for action
// 			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$us->id_dd_user."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
// 				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$us->id_dd_user."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
// 			$data[] = $row;
// 		}

// 		$output = array(
// 			"draw" => $_POST['draw'],
// 			"recordsTotal" => $this->user->count_all(),
// 			"recordsFiltered" => $this->user->count_filtered(),
// 			"data" => $data,
// 	);
// //output to json format
// echo json_encode($output);
// }
	
//     public function ajax_edit($id)
// 	{
// 		$data = $this->user->get_by_id($id);
// 		echo json_encode($data);
// 	}

// 	public function ajax_add()
// 	{
// 		$this->_validate();
// 		$data = array(
// 				'name' => $this->input->post('name'),
// 				'username' => $this->input->post('username'),
// 			);
// 		$insert = $this->user->save($data);
// 		echo json_encode(array("status" => TRUE));
// 	}

// 	public function ajax_update()
// 	{
// 		$this->_validate();
// 		$data = array(
// 			'name' => $this->input->post('name'),
// 			'username' => $this->input->post('username'),
// 			);
// 		$this->user->update(array('id_dd_user' => $this->input->post('id_dd_user')), $data);
// 		echo json_encode(array("status" => TRUE));
// 	}

// 	public function ajax_delete($id)
// 	{
// 		$this->user->delete_by_id($id);
// 		echo json_encode(array("status" => TRUE));
// 	}

// 	private function _validate()
// 	{
// 		$data = array();
// 		$data['error_string'] = array();
// 		$data['inputerror'] = array();
// 		$data['status'] = TRUE;

// 		if($this->input->post('name') == '')
// 		{
// 			$data['inputerror'][] = 'name';
// 			$data['error_string'][] = 'Name is required';
// 			$data['status'] = FALSE;
// 		}

// 		if($data['status'] === FALSE)
// 		{
// 			echo json_encode($data);
// 			exit();
// 		}
// 	}

	}




/* End of file eselon.php */
/* Location: ./application/controllers/eselon.php */
