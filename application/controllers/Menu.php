<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        Parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model','menu', TRUE);
        $this->load->model('Submenu_model','submenu', TRUE);
        
    }

// Menu  -----------------------------------------------------------------------------------------------------------
public function index()
{
$data['title'] = 'Menu Management';
// $data = array(
//     'userSubmenu' =>  $this->menu->userSubmenu()		
// );
    $this->konten['main_view'] = $this->load->view('menu/index', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_menu()
{
    $list = $this->menu->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = strtoupper($us->menu);
     

        //add html for action
        $row[] = '
        <class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Action
        </button>
        <div class="dropdown-menu">
        <a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_menu('."'".$us->id."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
        <a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_menu('."'".$us->id."'".')"><i class="fa fa-edit ml-4"></i> Delete</a>';
    
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->menu->count_all(),
        "recordsFiltered" => $this->menu->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_menu($id)
{
    $data = $this->menu->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_menu()
{
    $validasi = array(
        array(
        'field' => 'menu',
        'label' => 'Menu',
        'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{

    $data = array(
            'menu' => $this->input->post('menu'),
        );
    $insert = $this->menu->save_menu($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_menu()
{
    $validasi = array(
        array(
        'field' => 'menu',
        'label' => 'Menu',
        'rules' => 'required'
        )

    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{
    $data = array(
            'menu' => $this->input->post('menu'),
        );
    $this->menu->update(array('id' => $this->input->post('id')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_menu($id)
{
    $this->menu->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}

private function _validate_menu()
{
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('menu') == '')
    {
        $data['inputerror'][] = 'menu';
        $data['error_string'][] = 'Menu is required';
        $data['status'] = FALSE;
    }

    if($data_menu['status'] === FALSE)
    {
        echo json_encode($data);
        exit();
    }
}
    

// User Sub Menu  -----------------------------------------------------------------------------------------------------------

public function submenu()
{
$data['title'] = 'SubMenu Management';
$data = array(
    'menu' =>  $this->submenu->userMenu()		
);
    $this->konten['main_view'] = $this->load->view('menu/submenu', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_submenu()
{
    $list = $this->submenu->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = strtoupper($us->title);
        $row[] = strtoupper($us->menu);
        $row[] = strtoupper($us->url);
        $row[] = strtoupper($us->icon);
        $row[] = strtoupper($us->id_active);
     

        //add html for action
        $row[] = '
        <class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Action
        </button>
        <div class="dropdown-menu">
        <a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_submenu('."'".$us->id."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
        <a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_submenu('."'".$us->id."'".')"><i class="fa fa-edit ml-4"></i> Delete</a>';
    
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->submenu->count_all(),
        "recordsFiltered" => $this->submenu->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_submenu($id)
{
    $data = $this->submenu->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_submenu()
{
    $validasi = array(
        array(
        'field' => 'title',
        'label' => 'Title',
        'rules' => 'required'
        ),
        array(
        'field' => 'menu_id',
        'label' => 'Menu',
        'rules' => 'required'
        ),
        array(
        'field' => 'url',
        'label' => 'URL',
        'rules' => 'required'
        ),
        array(
        'field' => 'icon',
        'label' => 'Icon',
        'rules' => 'required'
        ),
        array(
        'field' => 'id_active',
        'label' => 'Active',
        'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{

    $data = array(
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'id_active' => $this->input->post('id_active'),
        );
    $insert = $this->submenu->save_submenu($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_submenu()
{
    $validasi = array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required'
            ),
            array(
            'field' => 'menu_id',
            'label' => 'Menu',
            'rules' => 'required'
            ),
            array(
            'field' => 'url',
            'label' => 'URL',
            'rules' => 'required'
            ),
            array(
            'field' => 'icon',
            'label' => 'Icon',
            'rules' => 'required'
            ),
            array(
            'field' => 'id_active',
            'label' => 'Active',
            'rules' => 'required'
            )

    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{
    $data = array(
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'id_active' => $this->input->post('id_active'),
        );
    $this->submenu->update(array('id' => $this->input->post('id')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_submenu($id)
{
    $this->submenu->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}

private function _validate_submenu()
{
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('title') == '')
    {
        $data['inputerror'][] = 'title';
        $data['error_string'][] = 'Title is required';
        $data['status'] = FALSE;
    }
    if($this->input->post('menu_id') == '')
    {
        $data['inputerror'][] = 'menu_id';
        $data['error_string'][] = 'Menu is required';
        $data['status'] = FALSE;
    }
    if($this->input->post('url') == '')
    {
        $data['inputerror'][] = 'url';
        $data['error_string'][] = 'Url is required';
        $data['status'] = FALSE;
    }
    if($this->input->post('icon') == '')
    {
        $data['inputerror'][] = 'icon';
        $data['error_string'][] = 'Icon is required';
        $data['status'] = FALSE;
    }
    if($this->input->post('id_active') == '')
    {
        $data['inputerror'][] = 'id_active';
        $data['error_string'][] = 'Active is required';
        $data['status'] = FALSE;
    }

    if($data_submenu['status'] === FALSE)
    {
        echo json_encode($data);
        exit();
    }
}



}