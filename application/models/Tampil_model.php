<?php

class Tampil_model extends CI_Model
{
    Public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

// Tampil Aktivitas pada form Trans Aktivitas (*dosen*)  ------------------------- IN ----------------------




    public function getTampilNimProposal()
    {
        $data = $this->uri->segment(3);
       
         $query ="SELECT * FROM `trans_prop`
                  WHERE  `nim` = $data
                  ";
        return  $this->db->query($query)->result_array();
    }

    public function getTampilNimProposal2()
    {
        $data = $this->uri->segment(3);
       
         $query ="SELECT * FROM `trans_prop`
                  WHERE  `nim` = $data
                  ";
        return  $this->db->query($query)->result_array();
    }

// END  Tampil Aktivitas pada form Trans Aktivitas (*dosen*)  ---------------------- END ------------------------------

function get_data($table)
{
    return $this->db->get($table);
}


public function hapusrole($id)
{ 
    $this->db->delete('user_role', ['id' => $id]);
}

public function getTampil()
    {
        // $data = $this->uri->segment(3);
        
         $query ="SELECT * FROM `user`
                  WHERE  `role_id` = 1
                  ";
        return  $this->db->query($query)->result_array();
    }

// ini proses untuk update di databse nya .. 
public function updatestatus10($id, $status) // ini mas
{
    $this->db->set('status_aktivitas1', urldecode($status)); // AKTIVITAS  ------------------------------------------------------
    $this->db->where('id_aktiv', $id);
    return $this->db->update('trans_aktivitas');
}

// ini proses untuk update di databse nya .. 
public function updatestatus11($id, $status) // ini mas
{
    $this->db->set('status_aktivitas1', urldecode($status)); // AKTIVITAS 2  ------------------------------------------------------
    $this->db->where('id_aktiv', $id);
    return $this->db->update('trans_aktivitas2');
}

// ini proses untuk update di databse nya .. 
public function updatestatus12($id, $status) // ini mas
{
    $this->db->set('status_sem', urldecode($status)); // SEMINAR  ------------------------------------------------------
    $this->db->where('id_sem', $id);
    return $this->db->update('trans_seminar');
}

// ini proses untuk update di databse nya .. 
public function updatestatus13($id, $status) // ini mas
{
    $this->db->set('status_sid', urldecode($status)); // SIDANG  ------------------------------------------------------
    $this->db->where('id_sidang', $id);
    return $this->db->update('trans_sidang');
}


    }
