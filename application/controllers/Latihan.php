<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Latihan extends CI_Controller
{

    public function __construct()
    {
        Parent::__construct();
       is_logged_in();
    }

    public function checkbok()
    {
        $data['title'] = 'Checkbok';
        $data['dd_user'] = $this->db->get_where('dd_user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->model('Latihan_model');
        $data['disposisi'] = $this->Latihan_model->tampil_disposisi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('latihan/checkbok', $data);
        $this->load->view('templates/footer');
    }

     function insert()
        {   
                    $this->load->model('Latihan_model');
                    if($_POST){
                        $checkboxes = $this->input->post('check_list');
                        $disposisi = implode(",",$checkboxes);
            
                        $this->Latihan_model->insertdisposisi(array(
                            'perhatian'  => $disposisi
                        ));
                        redirect('latihan/checkbok');
                    }
                    $this->load->view('latihan/checkbok');
                }
                
            
            // $this->load->model('Latihan_model');
            // $check = $this->input->post('check_list');
            // foreach($check as $object){
            //         $this->Latihan_model->insertdisposisi(array(
            //                 'perhatian'    => $object,
            //             ));
            //         }
            //         redirect('latihan/checkbok');

            //     }

            public function disposisi()
            {
                $data['title'] = 'Disposisi';
                $data['dd_user'] = $this->db->get_where('dd_user', ['username' => 
                $this->session->userdata('username')])->row_array();
                $this->load->model('Latihan_model');
                $data['disposisi'] = $this->Latihan_model->tampil_disposisi();
        
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('latihan/disposisi', $data);
                $this->load->view('templates/footer');
            }

                }
