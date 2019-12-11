<?php

class Surat_model extends CI_Model
{
 
//  SURAT KELUAR  ----------------------------------------------------------------------------------------------  

    Public function getAllSuratkeluar()
    {
        return $this->db->get('tc_surat_keluar')->result_array();
    }

     Public function getAllSuratdisposisi()
    {
        return $this->db->get('disposisi')->result_array();
    }


    public function hapusDatasurkeluar($id)
    { 
        $this->db->delete('tc_surat_keluar', ['id_tc_surat_keluar' => $id]);
    }


    public function getSurkeluarById($id)
    {
        return $this->db->get_where('tc_surat_keluar', ['id_tc_surat_keluar' => $id])->row_array();
    }

    public function tambah_keluar($file_url_scan)
    {
        $data=[
            "tgl_surat" => $this->input->post('tgl_surat', true),
            "tgl_kirim" => $this->input->post('tgl_kirim', true),
            "nomor" => $this->input->post('nomor', true),
            "hal" => $this->input->post('hal', true),
            "status_surat" => $this->input->post('status_surat', true),
            "tujuan" => $this->input->post('tujuan', true),           
            "alamat" => $this->input->post('alamat', true),            
            "pengirim" => $this->input->post('pengirim', true),
            "keterangan" => $this->input->post('keterangan', true),
            "url_scan" => $file_url_scan
        ];

        $this->db->insert('tc_surat_keluar', $data);   
    }

    public function ubahDatasurkeluar($file_url_scan)
    {
        $data= 
        [
            "tgl_surat" => $this->input->post('tgl_surat', true),
            "tgl_kirim" => $this->input->post('tgl_kirim', true),
            "nomor" => $this->input->post('nomor', true),
            "hal" => $this->input->post('hal', true),
            // "status_surat" => $this->input->post('status_surat', true),
            "tujuan" => $this->input->post('tujuan', true),           
            "alamat" => $this->input->post('alamat', true),            
            "pengirim" => $this->input->post('pengirim', true),
            "keterangan" => $this->input->post('keterangan', true),
            "url_scan" => $file_url_scan,
        ];
        $this->db->where ('id_tc_surat_keluar', $this->input->post('id_tc_surat_keluar'));   
        $this->db->update('tc_surat_keluar', $data);   
    }
//  SURAT KELUAR  ----------------------------------------------------------------------------------------------  

//  USER & MASTER CLIENT ----------------------------------------------------------------------------------------------  

    Public function getAllUser()
    {
        return $this->db->get('dd_user')->result_array();
    }

    Public function getAllMtClient()
    {
        return $this->db->get('mt_client')->result_array();
    }

//  USER & MASTER CLIENT  ----------------------------------------------------------------------------------------------  

//  SURAT MASUK  ----------------------------------------------------------------------------------------------   

    Public function getAllSuratmasuk()
    {
        return $this->db->get('tc_surat_masuk')->result_array();
    }

    public function tambah_masuk ($file_url_scan)
    {
        $data=[
            "tgl_surat" => $this->input->post('tgl_surat', true),
            "tgl_terima" => $this->input->post('tgl_terima', true),
            "nomor" => $this->input->post('nomor', true),
            "hal" => $this->input->post('hal', true),
            "status" => $this->input->post('status', true),
            "kepada" => $this->input->post('kepada', true),           
            "alamat_pengirim" => $this->input->post('alamat_pengirim', true),            
            "pengirim" => $this->input->post('pengirim', true),
            "keterangan" => $this->input->post('keterangan', true),
            "url_scan" => $file_url_scan
        ];
        $this->db->insert('tc_surat_masuk', $data);   
    }

    public function getSurmasukById($id)
    {
        return $this->db->get_where('tc_surat_masuk', ['id_tc_surat_masuk' => $id])->row_array();
    }

    public function ubahDatasurmasuk()
    {
        $data= [
            "tgl_surat" => $this->input->post('tgl_surat', true),
            "tgl_terima" => $this->input->post('tgl_terima', true),
            "nomor" => $this->input->post('nomor', true),
            "hal" => $this->input->post('hal', true),
            // "status" => $this->input->post('status', true),
            "kepada" => $this->input->post('kepada', true),           
            "alamat_pengirim" => $this->input->post('alamat_pengirim', true),            
            "pengirim" => $this->input->post('pengirim', true),
            "keterangan" => $this->input->post('keterangan', true),
            // "url_scan" => $file_url_scan
        ];
        $this->db->where ('id_tc_surat_masuk', $this->input->post('id_tc_surat_masuk'));   
        $this->db->update('tc_surat_masuk', $data);   
    }

    public function ubahDataketerangan()
    {
        $data= [
            "keterangan" => $this->input->post('keterangan', true),
        ];
        $this->db->where ('id_tc_surat_masuk', $this->input->post('id_tc_surat_masuk'));   
        $this->db->update('tc_surat_masuk', $data);   
    }

//  SURAT MASUK  ---------------------------------------------------------------------------------------------- 

//  RESPOM  ----------------------------------------------------------------------------------------------   

    public function getDisposisijoin()
    {
        $query ="SELECT `tc_surat_masuk`.*, `disposisi`.`id_disposisi`
                    FROM `tc_surat_masuk` JOIN `disposisi` 
                    ON `tc_surat_masuk`.`id_tc_surat_masuk` = `disposisi`.`id_disposisi`    
            ";
        return  $this->db->query($query)->result_array();
        }   

    Public function getDisposisi()
    {
    return $this->db->get('disposisi')->result_array();
    }

    public function getDisposisiById($id)
    {
        return $this->db->get_where('tc_surat_masuk', ['id_tc_surat_masuk' => $id])->row_array();
    }

    public function ubahDatadisposisi()
    {
        $data= [
            "perhatian" => $this->input->post('perhatian', true),
            "dimaklumi" => $this->input->post('dimaklumi', true),
            "diedarkan" => $this->input->post('diedarkan', true),
            "diselesaikan" => $this->input->post('diselesaikan', true),
            "dilaksanakan" => $this->input->post('dilaksanakan', true),
            "dipergunakan" => $this->input->post('dipergunakan', true),           
            "diteliti" => $this->input->post('diteliti', true),            
            "bds" => $this->input->post('bds', true),
            "copy" => $this->input->post('copy', true),
            "cat" => $this->input->post('cat', true),
            "cat2" => $this->input->post('cat2', true)
 
        ];
        $this->db->where ('id_disposisi', $this->input->post('id_disposisi'));   
        $this->db->update('disposisi', $data);   
    }

//  RESPON  ----------------------------------------------------------------------------------------------   
    
    public function insertdisposisi($data)
    {
        $this->db->insert('tc_surat_masuk',$data);
    }
    //tampil data
    public function tampil_disposisi()
    {
    return $this->db->get('tc_surat_masuk')->result_array();
    }



}