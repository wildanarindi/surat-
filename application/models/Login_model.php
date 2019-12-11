<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
//admin
public function get($username){     
	   $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'      
		 $result = $this->db->get('dd_user')->row(); // Untuk mengeksekusi dan mengambil data hasil query     
			
	return $result;    }
}
/* End of file M_skpd.php */
/* Location: ./application/models/M_kompetensi_bidang.php */