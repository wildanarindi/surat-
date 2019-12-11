<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 
class Simple_login {
	// SET SUPER GLOBAL
	var $CI = NULL;
	var $normal = NULL;
	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->library('encryption');
	}
	// Proteksi halaman
	public function cek_login() {
		if($this->CI->session->userdata('username') == '') {
			$this->CI->session->set_flashdata('sukses','Anda belum login');
			redirect(site_url('login'));
		}
	}
	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('name');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
        $this->CI->session->unset_userdata('stlog');
        $this->CI->session->unset_userdata('dmenu');
        $this->CI->session->unset_userdata('menu1');
        $this->CI->session->unset_userdata('menu2');
        $this->CI->session->unset_userdata('menu3');
        $this->CI->session->unset_userdata('menu4');
        $this->CI->session->unset_userdata('menu5');
        $this->CI->session->unset_userdata('menu6');
			$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(site_url('auth'));
	}
}

