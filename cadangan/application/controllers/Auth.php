<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wellcome extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->library('form_validation');
    // }
public function index()
    {
        $this->load->view('welcome_message');
    }

    // public function index()
    // {
    //     $this->load->view('auth/login');

        // if ($this->session->userdata('username')){ // jika ada session di controler admin maka di lanjutkan ke halaman user
        //     redirect('user');
        // }
        
        // $this->form_validation->set_rules('username', 'username', 'trim|required' );
        // $this->form_validation->set_rules('password', 'password', 'trim|required');

        // if ($this->form_validation->run() == false) {
        //     $data['title'] = 'Halaman Login';
        //     $this->load->view('templates/auth_header', $data);
        //     $this->load->view('auth/login');
        //     $this->load->view('templates/auth_footer');
        // } else {
        //     // jika sukses
        //     $this->_login();
        // }
    // }
}
 