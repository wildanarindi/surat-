<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {  
	
	public function __construct(){    
		parent::__construct();    
		$this->load->library('form_validation');
		$this->load->model('Login_model', 'login', TRUE); // memanggil model login_model alias login
	 }  
	 
	 public function index(){    
		 if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)      
		 redirect('admin/index'); // Redirect ke page welcome    
		 
		 $this->load->view('templates/auth_header');
		 $this->load->view('auth/login');
		 $this->load->view('templates/auth_footer');  
	 }
		
	public function login()
	{    
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login    
		$password = $this->input->post('password'); // Ambil isi dari inputan password pada form login dan encrypt dengan md5    
		$user = $this->login->get($username); // Panggil fungsi get yang ada di UserModel.php    
		
		if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan    
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan ..</div>'); // Buat session flashdata      
		 redirect('auth'); // Redirect ke halaman login    
		}else{      
			 
		if (password_verify($password == $user->password)){ // Jika password yang diinput sama dengan password yang didatabase       
			$session = array
			(         
				'authenticated'=>true, // Buat session authenticated dengan value true          
				'username'=>$user->username,  // Buat session username          
				'name'=>$user->name, // Buat session authenticated 
				'role_id'=>$user->role_id // Buat session role       
			);        
					
			// $this->session->set_userdata($session); // Buat session sesuai $session        
			// redirect('admin/index'); // Redirect ke halaman welcome      

			$this->session->set_userdata($session);
			if ($session['role_id'] == 1) {
			   $this->session->set_flashdata('flash62', 'Selamat Datang Admin');
				redirect('admin');
			} else {
				redirect('user');
			}
		}else{        
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang di masukkan salah !</div>'); // Buat session flashdata 
			redirect('auth'); // Redirect ke halaman login      
			}    
		}  
		}  

		public function registration()
    {
        if ($this->session->userdata('username')){
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[dd_user.username]', [
            'is_unique' => 'Username sudah terdaftar'
        ]);
        // $this->form_validation->set_rules('judul', 'judul', 'required|trim');
        
        // $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
        //     'is_unique' => 'Email sudah terdaftar'
        // ]);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama !',
            'min_length' => 'Minimal Password 3 huruf'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

   

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Daftar User';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
			// $email = $this->input->post('email', true);
			// $pass = md5($this->input->post('password1');
            $data = [
                'name' => htmlspecialchars($this->input->post('name', 'true')),
                'username' => htmlspecialchars($this->input->post('username', 'true')),
                'foto' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'id_active' => 1,
                'input_tgl' => date("Y-m-d H:i:s")
            ];

             // siapkan token
            //  $token = bin2hex(openssl_random_pseudo_bytes(32)); 
            //  $user_token = [
            //      'email' => $email,
            //      'token' => $token,
            //      'date_created' => time()
            //  ];
           
            $this->db->insert('dd_user', $data);
            // $this->db->insert('user_token', $user_token);
            
            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"> Selamat ! Akun anda sudah terdaftar. </div>');
            redirect('auth');
            }
			}
			
			
		public function logout()
		{    
			$this->session->sess_destroy();    
			$this->session->set_flashdata('message', '<div class="alert alert-success" 
			role="alert"> Anda sudah Logout! </div>');
			redirect('auth');  
			// $this->session->unset_userdata('username'); // Hapus semua session 
			// $this->session->unset_userdata('role_id'); // Hapus semua session 
	
			
			// redirect('auth'); // Redirect ke halaman login 
		}
	}