<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $konten = array('main_view' => '', );

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('m_agama', 'agm', TRUE);
	}
//adm
	public function index()
	{
// if (($this->session->userdata('stlog'))!=1){
// redirect(site_url('login/logout'));
// }

// if (($this->session->userdata('status'))!=1){
// redirect(site_url('dashboard1'));
// }



		$this->konten['main_view'] = $this->load->view('templates/konten', '', TRUE);
		$this->load->view('templates/dashboard', $this->konten);
	}


}

/* End of file eselon.php */
/* Location: ./application/controllers/eselon.php */
