<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {
	var $table = 'dd_user';
	var $table1 = 'user_role';
	var $table2 = 'user_menu';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
//admin
	public function get_by_id($username)
	{
    $this->db->select('dd_user.*,user_role.n_menu');
    $this->db->from($this->table);
    $this->db->join('user_role','user_role.id=dd_user.role_id');
//$this->db->join('user_menu','user_menu.id=user_role.id');
	$this->db->where('username',$username);
	$query = $this->db->get();
		return $query->num_rows();
    }
	
	public function get_aktif($username)
	{
    $this->db->select('dd_user.*,user_role.n_menu, user_role.role');
    $this->db->from($this->table);
    $this->db->join('user_role','user_role.id=dd_user.role_id');
//$this->db->join('user_menu','user_menu.id=user_role.id');
	$this->db->where('username',$username);
	$query = $this->db->get();
		return $query->row();
	}

	public function get_menu($id)
	{
    $this->db->select('*');
    $this->db->from($this->table2);
 	$this->db->where('id',$id);
	$query = $this->db->get();
		return $query->result_array();
    }
    
}
/* End of file M_skpd.php */
/* Location: ./application/models/M_kompetensi_bidang.php */