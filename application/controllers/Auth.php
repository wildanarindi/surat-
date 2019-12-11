<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')){ // jika ada session di controler admin maka di lanjutkan ke halaman user
            redirect('user');
        }
        
        $this->form_validation->set_rules('username', 'username', 'trim|required' );
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // jika sukses
            $this->_login();
        }
    }
 
    private function _login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $dd_user = $this->db->get_where('dd_user', ['username' => $username])->row_array();

        //usernya ada
        if ($dd_user) {
            //jika usernya aktif
            if ($dd_user['id_active'] == 1) {
                // cek password
                if (password_verify($password, $dd_user['password'])) {
                    // Menentukan pengguna sebgai admin atau user
                    $data = [
                        'username' => $dd_user['username'],
                        'name' => $dd_user['name'],
						'role_id' => $dd_user['role_id']
						// 'username'=>$dd_user->username,  // Buat session username          
						// 'name'=>$dd_user->name, // Buat session authenticated 
						// 'role_id'=>$dd_user->role_id // Buat session role 
                    ];
                     $this->session->set_userdata($data);
                     if ($dd_user['role_id'] == 1) {
                        $this->session->set_flashdata('flash62', 'Selamat Datang Admin');
                         redirect('admin');
                     } else {
                         redirect('user');
                     }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang di masukkan salah !</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email masih belum aktiv</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email belum terdaftar !</div>');
            redirect('auth');
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

//     Private function _sendEmail($token, $type)
//     {
//         $this->load->library('email'); 
//         $config = array(); 
//         $config['protocol'] = 'smtp'; 
//         $config['smtp_host'] = 'ssl://smtp.googlemail.com'; 
//         $config['smtp_user'] = 'wildanesmu@gmail.com'; 
//         $config['smtp_pass'] = 'monsterenergi'; 
//         $config['smtp_port'] = 465; 
//         $config['mailtype'] = 'html'; 
//         $config['charset'] = 'utf-8'; 
//         $this->email->initialize($config); 
//         $this->email->set_newline("\r\n");
         
//         $this->load->library('email',$config); 
       

//         $this->email->from('wildanesmu@gmail.com', 'Wildan Arindi');
//         $this->email->to($this->input->post('email'));

//         if ($type == 'verify') {
//             $this->email->subject('Account Verification');
//             $this->email->message('Click this link to verify you account : <a 
//             href="' . base_url() . 'auth/verify?email=' . $this->input->post
//             ('email') . '&token=' . urlencode($token) . '">Activate</a>');

//         } else if ($type == 'forgot') {
//             $this->email->subject('Reset Password');
//             $this->email->message('Click this link to reset your password : <a 
//             href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post
//             ('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
//         }
//         if ($this->email->send()) {
//             return true;
//         } else {
//             echo $this->email->print_debugger();
//             die;
//         }
//     }


// public function verify()
// {
//     $email = $this->input->get('email');
//     $token = $this->input->get('token');
//     $user = $this->db->get_where('user', ['email' => $email])->row_array();
//     if ($user) {
//         $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
//         if ($user_token) {
//             if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
//                 $this->db->set('id_active', 1);
//                 $this->db->where('email', $email);
//                 $this->db->update('user');
//                 $this->db->delete('user_token', ['email' => $email]);
//                 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
//                 redirect('auth');
//             } else {
//                 $this->db->delete('user', ['email' => $email]);
//                 $this->db->delete('user_token', ['email' => $email]);
//                 $this->session->set_flashdata('message', '<div class="alert alert-danger" 
//                 role="alert">Account activation failed! Token expired.</div>');
//                 redirect('auth');
//             }
//         } else {
//             $this->session->set_flashdata('message', '<div class="alert alert-danger" 
//             role="alert">Account activation failed! Wrong token.</div>');
//             redirect('auth');
//         }
//     } else {
//         $this->session->set_flashdata('message', '<div class="alert alert-danger" 
//         role="alert">Account activation failed! Wrong email.</div>');
//         redirect('auth');
//     }
// }

    public function logout()
    { 
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert"> Anda sudah Logout! </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
    // public function forgotPassword()
    // {
    //     $this->form_validation->set_rules('username', 'Username', 'trim|required');
    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Forgot Password';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/forgot-password');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $username = $this->input->post('username');
    //         $dd_user = $this->db->get_where('dd_user', ['username' => $username, 'id_active' => 1])->row_array();
    //         if ($user) {
    //             $token = bin2hex(openssl_random_pseudo_bytes(32));
    //             $user_token = [
    //                 'email' => $email,
    //                 'token' => $token,
    //                 'date_created' => time()
    //             ];
    //             $this->db->insert('user_token', $user_token);
    //             $this->_sendEmail($token, 'forgot');
    //             $this->session->set_flashdata('message', '<div class="alert
    //             alert-success" role="alert">Please check your email to reset your password!</div>');
    //             redirect('auth/forgotpassword');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
    //             redirect('auth/forgotpassword');
    //         }
    //     }
    // }
    // public function resetPassword()
    // {
    //     $email = $this->input->get('email');
    //     $token = $this->input->get('token');
    //     $user = $this->db->get_where('user', ['email' => $email])->row_array();
    //     if ($user) {
    //         $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
    //         if ($user_token) {
    //             $this->session->set_userdata('reset_email', $email);
    //             $this->changePassword();
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
    //             redirect('auth');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
    //         redirect('auth');
    //     }
    // }
    // public function changePassword()
    // {
    //     if (!$this->session->userdata('reset_email')) {
    //         redirect('auth');
    //     }
    //     $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
    //     $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');
    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Change Password';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/change-password');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $password = password_hash($this->input->post('password1'), 
    //         PASSWORD_DEFAULT);
    //         $email = $this->session->userdata('reset_email');
    //         $this->db->set('password', $password);
    //         $this->db->where('email', $email);
    //         $this->db->update('user');
    //         $this->session->unset_userdata('reset_email');
    //         $this->db->delete('user_token', ['email' => $email]);
    //         $this->session->set_flashdata('message', '<div class="alert 
    //         alert-success" role="alert">Password has been changed! Please login.</div>');
    //         redirect('auth');
    //     }
    // }
}

