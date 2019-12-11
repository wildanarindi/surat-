<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model', 'login', TRUE); // memanggil model login_model alias login
	}
	// Index login
	public function index() {
		
		if (($this->session->userdata('stlog'))==1){ // jika session data role nya 1 maka ...
		redirect(site_url('admin')); // di tepatkan pada halaman admin 
		}else{ // jika tidak ...
			$data['title'] = 'Surat Masuk';
		$this->konten['main_view'] = $this->load->view('auth/login', $data, TRUE);
		$this->load->view('templates/auth_header', $this->konten);	
		}
	}
	
    
	public function ajax_login()
	{
		$validasi = array( // validasi eror
				array(
				'field' => 'username', // validasi username tidak boleh kosong
				'label' => 'Username',
				'rules' => 'required'
				),
				array(
				'field' => 'password', // validasi password tidak boleh kosong
				'label' => 'Password',
				'rules' => 'required'
				)
			);
		$this->form_validation->set_rules($validasi);
		$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == false){
	$data['kliru'] = validation_errors();
	$data['status'] = false;
	echo json_encode($data);
}else{
		$username = $this->input->post('username'); // variabel $username adalah nama panggilan u/ input postnya field username
		$password = $this->input->post('password'); // variabel $password adalah nama panggilan u/ input postnya field password
		$loginmasuk = $this->login->get_by_id($username); // variabel $loginmasuk adalah nama panggilan untuk memanggil model login yang functionnya get by id berdasarkan username
	if(($loginmasuk)==1) { // jika login masuk id usernamenya bernilai 1 maka ...
		$cek_act = $this->login->get_aktif($username); // variabel $cek_act ..memanggil model login yang function get aktif berdasarkan username
		$ac=$cek_act->id_active; // variabel $ac ... memanggil variabel $cek_act untuk di aktifkan
		if($ac!=0){ // jika nilai 1
		//$cekpass = $this->login->get_pass($username);
		$epass=$cek_act->password;
		//$dpass=$this->encryption->decrypt($epass);
		
			if(($password)==($epass)){
			$id 	= $cek_act->id_dd_user;
			$stlog=1;
            $role = $cek_act->role;
            $n_menu = $cek_act->n_menu;
			//cekpaket
            $d_menu = explode("," , $n_menu);
            $jmenu = count($d_menu);
           // $u_menu = array();
            for ($a = 0; $a < $jmenu ; $a++) {
                $get = $this->login->get_menu($d_menu[$a]);
				if(($d_menu[$a])==1){
					$this->session->set_userdata('menu1', $get->menu);
				}elseif(($d_menu[$a])==2){
					$this->session->set_userdata('menu2', $get->menu);
				}elseif(($d_menu[$a])==3){
					$this->session->set_userdata('menu3', $get->menu);
				}elseif(($d_menu[$a])==4){
					$this->session->set_userdata('menu4', $get->menu);
				}elseif(($d_menu[$a])==5){
					$this->session->set_userdata('menu5', $get->menu);
				}elseif(($d_menu[$a])==6){
					$this->session->set_userdata('menu6', $get->menu);
				}					
               
            }
			
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('name', $cek_act->name);
			$this->session->set_userdata('id_login', uniqid(rand()));
			$this->session->set_userdata('stlog', $stlog);
			$this->session->set_userdata('id', $id);
			$this->session->set_userdata('dmenu', $n_menu);
		

			$data['kliru'] = 'Login Sukses!';
			$data['url']="admin";
			$data['status'] = true;
			}else{
			$data['kliru'] = 'Password Salah!';
			$data['status'] = false;
			}//password konfirmasi
		}else{ //aktif
		$data['kliru'] = 'Akun Belum Aktif, Silakan Cek Email Anda!';
		$data['status'] = false;
		}
	}else{
	$data['kliru'] = 'Username Tidak Ada!';
	$data['status'] = false;
	}
echo json_encode($data);
}
    }
	
	public function logout() {
		$this->simple_login->logout();	
	}	


}