<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surmasuk_model extends CI_Model {

	var $table = 'tc_surat_masuk';
	var $table_disposisi = 'disposisi';
	var $column_order = array('tc_surat_masuk.tgl_terima','tc_surat_masuk.nomor','tc_surat_masuk.hal',null); //set column field database for datatable orderable
	var $column_search = array('tc_surat_masuk.nomor','tc_surat_masuk.hal'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('tc_surat_masuk.id_tc_surat_masuk' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

//admin
	private function _get_datatables_query()
	{
		$this->db->select('tc_surat_masuk.*,mt_client.nm_persero');
		$this->db->from($this->table);
		$this->db->join('mt_client','tc_surat_masuk.pengirim=mt_client.id_mt_client');
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->select('tc_surat_masuk.*,mt_client.nm_persero');
		$this->db->from($this->table);
		$this->db->join('mt_client','tc_surat_masuk.pengirim=mt_client.id_mt_client');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
        $this->db->from($this->table);
		$this->db->where('id_tc_surat_masuk',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save_masuk($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function save_disposisi($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_tc_surat_masuk', $id);
		$this->db->delete($this->table);
	}

	Public function client()
    {
        return $this->db->get('mt_client')->result_array();
	}
	
	Public function disposisi()
    {
        return $this->db->get('disposisi')->result_array();
	}

	Public function nama()
    {
        return $this->db->get('dd_user')->result_array();
	}
	Public function karyawan()
    {
        return $this->db->get('karyawan_v')->result_array();
	}

	Public function user()
    {
        $data['dd_user'] = $this->db->get_where('dd_user', ['username' => 
        $this->session->userdata('username')])->row_array();
    }

	Public function get_disposisi($id)
    {
		$this->db->select('*');
		$this->db->from($this->table_disposisi);
		$this->db->where('id',$id);
		
		$query = $this->db->get();
		return $query->row();
	}

	function get_id_masuk()
	{
        $q = $this->db->query("SELECT MAX(id_tc_surat_masuk) AS kd_unik FROM tc_surat_masuk");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ($k->kd_unik)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        // date_default_timezone_set('Asia/Jakarta');
        return $kd;
    }
 
    // function simpan_invoice($no_invoice){
    //     $hasil=$this->db->query("INSERT INTO tbl_invoice (no_invoice) VALUES ('$no_invoice')");
    //     return $hasil;
    // }

}

/* End of file M_skpd.php */
/* Location: ./application/models/M_kompetensi_bidang.php */
