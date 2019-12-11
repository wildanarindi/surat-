<?php

class Latihan_model extends CI_Model
{

    // Public function getDisposisi()
    // {
    // return $this->db->get('disposisi')->result_array();
    // }

    public function insertdisposisi($data)
    {
        $this->db->insert('disposisi',$data);
    }
    //tampil data
    public function tampil_disposisi()
    {
    return $this->db->get('disposisi')->result_array();
    }
}


 