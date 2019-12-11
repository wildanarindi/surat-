<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$data['title'] = 'profile';
		$data = array (
			'user' => $this->db->get_where('dd_user', ['username' => $this->session->userdata('username')])->row_array(),
			'userQuery' =>  $this->user->userAdmin(),
		);
		$this->konten['main_view'] = $this->load->view('profile_view/index',$data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);
	}
	}