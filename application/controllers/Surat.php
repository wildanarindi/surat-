<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
// Contruct -----------------------------------------------------------------------------------------
    public function __construct()
    {
        Parent::__construct();
       is_logged_in();
       $this->load->model('Keluar_model', 'keluar', TRUE);
       $this->load->model('Masuk_model', 'masuk', TRUE);
    }
// End construct -----------------------------------------------------------------------------------------

// Data Tabel Surat Masuk --------------------------------------------------------------------------------
    public function masuk()
	{
	$data['title'] = 'Surat Masuk';
	$data = array(
		'unik' =>  $this->masuk->get_id_masuk(),		
		'client' =>  $this->masuk->client(),		
		'disposisi' =>  $this->masuk->disposisi(),		
		'user' =>  $this->masuk->user(),	
		'karyawan' =>  $this->masuk->karyawan(),	
		'nama' =>  $this->masuk->nama()		
	);
		$this->konten['main_view'] = $this->load->view('surat/masuk', $data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);	
	}
	public function ajax_list_masuk()
	{
		$list = $this->masuk->get_datatables();	
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $us) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] ='
			<a class="" href="javascript:void(0)" title="view" onclick="detail_masuk('."'".$us->id_tc_surat_masuk."'".')"> <i class="fas fa-binoculars"></i> </a>';
			$row[] = strtoupper($us->tgl_terima);
			$row[] = strtoupper($us->nomor);
			$row[] = strtoupper($us->hal);
			$row[] = strtoupper($us->kepada);
			// $row[] = strtoupper($us->alamat_pengirim);
			$row[] = strtoupper($us->nm_persero);
			if (($us->keterangan)!=null){
			$data1 = explode("," , $us->keterangan);
			$jab = count($data1);
			$coba = array();
			for ($a = 0; $a < $jab ; $a++) {
				$get = $this->masuk->get_disposisi($data1[$a]);
				//  $plab=substr($get,0,-1);
				$coba[] = strtoupper ($get->type);
				// blok kode yang akan diulang di sini!
			}
			$final = implode(",", $coba);
			// $row[] = strtoupper($us->nm_persero);
			$row[] = $final;
			}else{
				$row[] = 'belom disposisi';
			}
			$row[] = strtoupper($us->keperluan);
			$row[] = strtoupper($us->flag_status);
			//add html for action
			if($this->session->userdata('role_id') == '1'){
			$row[] ='
			<class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Action
			</button>
			<div class="dropdown-menu">
			<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_masuk('."'".$us->id_tc_surat_masuk."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
			<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_masuk('."'".$us->id_tc_surat_masuk."'".')"><i class="fa fa-edit ml-4"></i> Delete</a>
			<a class="dropdown-item btn btn-sm btn-success" href="javascript:void(0)" title="Diteruskan" onclick="edit_diteruskan('."'".$us->id_tc_surat_masuk."'".')"><i class="fa fa-edit ml-4"></i> Diteruskan</a>';
			}
			if($this->session->userdata('role_id') == '2'){
			$row[] ='
			<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Disposisi" onclick="edit_disposisi('."'".$us->id_tc_surat_masuk."'".')"> Disposisi  </a>  ' ;
			}
			if($this->session->userdata('role_id') == '4'){
			$row[] ='
			<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Diterima" onclick="edit_diterima('."'".$us->id_tc_surat_masuk."'".')"> Diterima  </a>  ' ;
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->masuk->count_all(),
			"recordsFiltered" => $this->masuk->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		}
		
// End Data Tabel Surat Masuk --------------------------------------------------------------------------------

// Tambah Data Surat Masuk --------------------------------------------------------------------------------
	public function ajax_add_masuk()
	{
		$validasi = array(
			array(
			'field' => 'tgl_terima',
			'label' => 'Tanggal Terima',
			'rules' => 'required'
			),

			array(
			'field' => 'nomor',
			'label' => 'Nomor Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'hal',
			'label' => 'Perihal Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'kepada',
			'label' => 'Kepada ',
			'rules' => 'required'
			),

			array(
			'field' => 'alamat_pengirim',
			'label' => 'Alamat Pengirim ',
			'rules' => 'required'
			),

			array(
			'field' => 'pengirim',
			'label' => 'Pengirim ',
			'rules' => 'required'
			)

		);

	$this->form_validation->set_rules($validasi);
	$this->form_validation->set_error_delimiters('', '');
	if ($this->form_validation->run() == FALSE){
		$data['kliru'] = validation_errors();
		$data['status'] = false;
		echo json_encode($data);
	}else{

		$unik = $this->masuk->get_id_masuk();
		$filePath = './surkeluar/';
		$config['upload_path'] = $filePath;
		$filektp = 'surat_'.$unik; 
		$config['file_name'] =  $filektp;
		$config['allowed_types'] = 'pdf|jpg|png';
		$config['remove_space'] = TRUE;
		$config['overwrite'] = TRUE;
		$config['max_size'] = 30000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
        $this->upload->do_upload('url_scan');
		$dok = $this->upload->data();
		
		
		if ($this->upload->do_upload('url_scan')){
			$data = array(
				'tgl_terima' => $this->input->post('tgl_terima'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_input' => date("Y-m-d H:i:s"),
				'penerima' => $this->input->post('penerima'),
				'nomor' => $this->input->post('nomor'),
				'hal' => $this->input->post('hal'),
				'agendaris' => $this->input->post('agendaris'),
				'status' => $this->input->post('status'),
				'kepada' => $this->input->post('kepada'),
				// 'keterangan' => $this->input->post('keterangan'),
				'alamat_pengirim' => $this->input->post('alamat_pengirim'),
				'pengirim' => $this->input->post('pengirim'),
				'url_scan' => $dok['file_name']
			);
			$insert = $this->masuk->save_masuk($data);
		}else{
			$data = array(
				'tgl_terima' => $this->input->post('tgl_terima'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_input' => date("Y-m-d H:i:s"),
				'penerima' => $this->input->post('penerima'),
				'nomor' => $this->input->post('nomor'),
				'hal' => $this->input->post('hal'),
				'agendaris' => $this->input->post('agendaris'),
				'status' => $this->input->post('status'),
				'kepada' => $this->input->post('kepada'),
				//'keterangan' => $this->input->post('keterangan'),
				'alamat_pengirim' => $this->input->post('alamat_pengirim'),
				'pengirim' => $this->input->post('pengirim'),

		);
		$insert = $this->masuk->save_masuk($data);
		}
		
		$data['kliru'] = 'Sudah Tersimpan';
		$data['status'] = true;
		echo json_encode($data);
		}
		}

// end Tambah Data Surat Masuk ------------------------------------------------------------------------------

// Edit Data Surat Masuk --------------------------------------------------------------------------------
	public function ajax_edit_masuk($id)
	{
		$data = $this->masuk->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update_masuk()
	{
		$validasi = array(
			array(
			'field' => 'tgl_terima',
			'label' => 'Tanggal Terima',
			'rules' => 'required'
			),

			array(
			'field' => 'nomor',
			'label' => 'Nomor Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'hal',
			'label' => 'Perihal Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'kepada',
			'label' => 'Kepada ',
			'rules' => 'required'
			),

			array(
			'field' => 'alamat_pengirim',
			'label' => 'Alamat Pengirim ',
			'rules' => 'required'
			),

			array(
			'field' => 'pengirim',
			'label' => 'Pengirim ',
			'rules' => 'required'
			)

		);

	$this->form_validation->set_rules($validasi);
	$this->form_validation->set_error_delimiters('', '');
	if ($this->form_validation->run() == FALSE){
		$data['kliru'] = validation_errors();
		$data['status'] = false;
		echo json_encode($data);
	}else{

		$unik = $this->masuk->get_id_masuk();
		$filePath = './surmasuk/';
		$config['upload_path'] = $filePath;
		$filektp = 'surat_'.$unik; 
		$config['file_name'] =  $filektp;
		$config['allowed_types'] = 'pdf|jpg|png';
		$config['remove_space'] = TRUE;
		$config['overwrite'] = TRUE;
		$config['max_size'] = 30000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
        $this->upload->do_upload('url_scan');
		$dok = $this->upload->data();
		
		
		if ($this->upload->do_upload('url_scan')){
			$data = array(
				'tgl_terima' => $this->input->post('tgl_terima'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_input' => date("Y-m-d H:i:s"),
				'penerima' => $this->input->post('penerima'),
				'nomor' => $this->input->post('nomor'),
				'hal' => $this->input->post('hal'),
				'agendaris' => $this->input->post('agendaris'),
				'status' => $this->input->post('status'),
				'kepada' => $this->input->post('kepada'),
				// 'keterangan' => $this->input->post('keterangan'),
				'alamat_pengirim' => $this->input->post('alamat_pengirim'),
				'pengirim' => $this->input->post('pengirim'),
				// 'url_scan' => $dok['file_name']
			);
			$insert = $this->masuk->save_masuk($data);
		}else{
			$data = array(
				'tgl_terima' => $this->input->post('tgl_terima'),
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_input' => date("Y-m-d H:i:s"),
				'penerima' => $this->input->post('penerima'),
				'nomor' => $this->input->post('nomor'),
				'hal' => $this->input->post('hal'),
				'agendaris' => $this->input->post('agendaris'),
				'status' => $this->input->post('status'),
				'kepada' => $this->input->post('kepada'),
				// 'keterangan' => $this->input->post('keterangan'),
				'alamat_pengirim' => $this->input->post('alamat_pengirim'),
				'pengirim' => $this->input->post('pengirim'),
				
		);
		$this->masuk->update(array('id_tc_surat_masuk' => $this->input->post('id_tc_surat_masuk')), $data);
		}
		$data['kliru'] = 'Sudah Tersimpan';
		$data['status'] = true;
		echo json_encode($data);
		}
		}

// End Edit Data Surat Masuk --------------------------------------------------------------------------------
		
// Delete Data Surat Masuk --------------------------------------------------------------------------------
	public function ajax_delete_masuk($id)
	{
		$this->masuk->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
// End Delete Data Surat Masuk --------------------------------------------------------------------------------

// Validate Data Surat Masuk --------------------------------------------------------------------------------
	private function _validate_masuk()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
        $data['status'] = TRUE;

		if($this->input->post('tgl_terima') == '')
		{
			$data['inputerror'][] = 'tgl_terima';
			$data['error_string'][] = 'Tanggal terima is required';
			$data['status'] = FALSE;
        }
        
		if($this->input->post('nomor') == '')
		{
			$data['inputerror'][] = 'nomor';
			$data['error_string'][] = 'nomor is required';
			$data['status'] = FALSE;
        }
        
		if($this->input->post('hal') == '')
		{
			$data['inputerror'][] = 'hal';
			$data['error_string'][] = 'Perihal is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('kepada') == '')
		{
			$data['inputerror'][] = 'kepada';
			$data['error_string'][] = 'Kepada is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('alamat_pengirim') == '')
		{
			$data['inputerror'][] = 'alamat_pengirim';
			$data['error_string'][] = 'Alamat Pengirim is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('pengirim') == '')
		{
			$data['inputerror'][] = 'pengirim';
			$data['error_string'][] = 'Please select pengirim';
			$data['status'] = FALSE;
		}

		if($data_keluar['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
// End Validate Data Surat Masuk --------------------------------------------------------------------------------

// Detail Data Surat Masuk --------------------------------------------------------------------------------
	public function ajax_detail_masuk($id)
	{
		$data = $this->masuk->get_by_id_detail($id);
		echo json_encode($data);
	}
// End Detail Data Surat Masuk --------------------------------------------------------------------------------

// Tambah Keperluan Data Surat Masuk --------------------------------------------------------------------------------

	public function ajax_edit_diteruskan($id)
		{
			$data = $this->masuk->get_by_id($id);
			echo json_encode($data);
		}
	public function ajax_update_diteruskan()
	{
	
		$data = array(
			'keperluan' => $this->input->post('keperluan')
		);

		$this->masuk->update(array('id_tc_surat_masuk' => $this->input->post('id_tc_surat_masuk')), $data);
		$data['kliru'] = 'Sudah Tersimpan';
		$data['status'] = true;
		echo json_encode($data);
	}
// End Tambah Keperluan Data Surat Masuk --------------------------------------------------------------------------------

// Tambah Diterima Data Surat Masuk --------------------------------------------------------------------------------

	public function ajax_edit_diterima($id)
	{
		$data = $this->masuk->get_by_id($id);
		echo json_encode($data);
	}
	public function ajax_update_diterima()
	{
	$data = array(
		'flag_status' => $this->input->post('flag_status')
	);

	$this->masuk->update(array('id_tc_surat_masuk' => $this->input->post('id_tc_surat_masuk')), $data);
	$data['kliru'] = 'Sudah Tersimpan';
	$data['status'] = true;
	echo json_encode($data);
	}
// End Tambah Diterima Data Surat Masuk --------------------------------------------------------------------------------

// Tambah Disposisi / keterangan Data Surat Masuk --------------------------------------------------------------------------------
	public function ajax_update_disposisi()
	{
		$sourceb='';
		$keterangan = $this->input->post('keterangan');
		if(!$keterangan) {
			$plab='';
			}else{
				foreach ($keterangan as $one_plib) {
					$sourceb.=$one_plib.",";
				}
			$plab=substr($sourceb,0,-1);
			}

		$data = array(
			'keterangan' => $plab,
			'komentar' => $this->input->post('komentar')
		);

		$this->masuk->update(array('id_tc_surat_masuk' => $this->input->post('id_tc_surat_masuk')), $data);
		$data['kliru'] = 'Sudah Tersimpan';
		$data['status'] = true;
		echo json_encode($data);
	}

	public function ajax_edit_disposisi($id)
	{
		$data = $this->masuk->get_by_id($id);
		echo json_encode($data);
	}
// End Tambah Disposisi / keterangan Data Surat Masuk --------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------------------------------------

// Data Tabel Surat Keluar --------------------------------------------------------------------------------
    public function keluar()
	{
		$data['title'] = 'Surat Keluar';
		$data = array(
			'client' =>  $this->keluar->client()	
		);
		$this->konten['main_view'] = $this->load->view('surat/keluar', $data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);
	}

	public function ajax_list_keluar()
	{
		$list = $this->keluar->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $us) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = strtoupper($us->tgl_surat);
			$row[] = strtoupper($us->tgl_kirim);
			$row[] = strtoupper($us->nomor);
			$row[] = strtoupper($us->hal);
			$row[] = strtoupper($us->nm_persero);
			$row[] = strtoupper($us->alamat);
			$row[] = strtoupper($us->pengirim);
			$row[] = strtoupper($us->keterangan);

			//add html for action
            $row[] = '
            <class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Action
			</button>
            <div class="dropdown-menu">
            <a  class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_keluar('."'".$us->id_tc_surat_keluar."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
			<a  class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_keluar('."'".$us->id_tc_surat_keluar."'".')"><i class="fa fa-edit ml-4"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->keluar->count_all(),
			"recordsFiltered" => $this->keluar->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
		}
// End Data Tabel Surat Keluar --------------------------------------------------------------------------------
		
// Tambah Data Tabel Surat Keluar --------------------------------------------------------------------------------

	public function ajax_add_keluar()
	{
		$validasi = array(
			array(
			'field' => 'tgl_surat',
			'label' => 'Tanggal Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'tgl_kirim',
			'label' => 'Tanggal Kirim Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'nomor',
			'label' => 'Nomor Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'hal',
			'label' => 'Perihal Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'id_mt_client',
			'label' => 'Kepada ',
			'rules' => 'required'
			),

			array(
			'field' => 'alamat',
			'label' => 'Alamat ',
			'rules' => 'required'
			),

			array(
			'field' => 'pengirim',
			'label' => 'Pengirim ',
			'rules' => 'required'
			)

		);

		$this->form_validation->set_rules($validasi);
	$this->form_validation->set_error_delimiters('', '');
	if ($this->form_validation->run() == FALSE){
		$data['kliru'] = validation_errors();
		$data['status'] = false;
		echo json_encode($data);
	}else{

		$this->load->library('upload');
		$hal = $this->input->post('hal');
        $config['upload_path'] ='./surkeluar/'; //path folder
		$config['allowed_types'] = 'pdf|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
		$config['file_name'] = $hal;
		$config['max_size'] = '30000';
		$config['remove_space']= true;
            // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		$this->upload->initialize($config);
		$this->upload->do_upload('url_scan');
		$url_scan = $this->upload->data();
		if(!empty($_FILES['url_scan']['name'])){
			if(!$this->upload->do_upload('url_scan'))
				print_r($this->upload->display_errors());
		$data = array(
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_kirim' => $this->input->post('tgl_kirim'),
				'nomor' => $this->input->post('nomor'),
				'hal' => $this->input->post('hal'),
				'agendaris' => $this->input->post('agendaris'),
				'keterangan' => $this->input->post('keterangan'),
				'id_mt_client' => $this->input->post('id_mt_client'),
				'alamat' => $this->input->post('alamat'),
				'pengirim' => $this->input->post('pengirim'),
				'status_surat' => $this->input->post('status_surat'),
				'tgl_input' => date("Y-m-d H:i:s"),
			);
		}else{
			$data = array(
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_kirim' => $this->input->post('tgl_kirim'),
				'nomor' => $this->input->post('nomor'),
				'hal' => $this->input->post('hal'),
				'agendaris' => $this->input->post('agendaris'),
				'keterangan' => $this->input->post('keterangan'),
				'id_mt_client' => $this->input->post('id_mt_client'),
				'alamat' => $this->input->post('alamat'),
				'pengirim' => $this->input->post('pengirim'),
				'status_surat' => $this->input->post('status_surat'),
				'tgl_input' => date("Y-m-d H:i:s"),
				'url_scan' => $url_scan['file_name']
				// 'url_draft' => $url_draft['file_name']
				// 'url_lampiran' => $url_lampiran['file_name']
			);
			}
			$insert = $this->keluar->save_keluar($data);
			$data['kliru'] = 'Sudah Tersimpan';
			$data['status'] = true;
			echo json_encode($data);
			}
			}
// End Tambah Data Tabel Surat Keluar --------------------------------------------------------------------------------

// Edit Data Tabel Surat Keluar --------------------------------------------------------------------------------
	public function ajax_edit_keluar($id)
	{
		$data = $this->keluar->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update_keluar()
	{
		$validasi = array(
			array(
			'field' => 'tgl_surat',
			'label' => 'Tanggal Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'tgl_kirim',
			'label' => 'Tanggal Kirim Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'nomor',
			'label' => 'Nomor Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'hal',
			'label' => 'Perihal Surat',
			'rules' => 'required'
			),

			array(
			'field' => 'id_mt_client',
			'label' => 'Kepada ',
			'rules' => 'required'
			),

			array(
			'field' => 'alamat',
			'label' => 'Alamat ',
			'rules' => 'required'
			),

			array(
			'field' => 'pengirim',
			'label' => 'Pengirim ',
			'rules' => 'required'
			)

		);

		$this->form_validation->set_rules($validasi);
	$this->form_validation->set_error_delimiters('', '');
	if ($this->form_validation->run() == FALSE){
		$data['kliru'] = validation_errors();
		$data['status'] = false;
		echo json_encode($data);
	}else{

		
		$this->load->library('upload');
		$hal = $this->input->post('hal');
        $config['upload_path'] ='./surkeluar/'; //path folder
		$config['allowed_types'] = 'pdf|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
		$config['file_name'] = $hal;
		$config['max_size'] = '30000';
		$config['remove_space']= true;
            // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		$this->upload->initialize($config);
		
		$this->upload->do_upload('url_scan');
		$url_scan = $this->upload->data();
		if(!empty($_FILES['url_scan']['name'])){
			if(!$this->upload->do_upload('url_scan'))
				print_r($this->upload->display_errors());

		$data = array(
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_kirim' => $this->input->post('tgl_kirim'),
				'nomor' => $this->input->post('nomor'),
				'hal' => $this->input->post('hal'),
				'agendaris' => $this->input->post('agendaris'),
				'keterangan' => $this->input->post('keterangan'),
				'id_mt_client' => $this->input->post('id_mt_client'),
				'alamat' => $this->input->post('alamat'),
				'pengirim' => $this->input->post('pengirim'),
				'status_surat' => $this->input->post('status_surat'),
				'tgl_input' => date("Y-m-d H:i:s"),
		);
		}else{
			$data = array(
				'tgl_surat' => $this->input->post('tgl_surat'),
				'tgl_kirim' => $this->input->post('tgl_kirim'),
				'nomor' => $this->input->post('nomor'),
				'hal' => $this->input->post('hal'),
				'agendaris' => $this->input->post('agendaris'),
				'keterangan' => $this->input->post('keterangan'),
				'id_mt_client' => $this->input->post('id_mt_client'),
				'alamat' => $this->input->post('alamat'),
				'pengirim' => $this->input->post('pengirim'),
				'status_surat' => $this->input->post('status_surat'),
				'tgl_input' => date("Y-m-d H:i:s"),
				'url_scan' => $url_scan['file_name']
				// 'url_draft' => $url_draft['file_name']
				// 'url_lampiran' => $url_lampiran['file_name']
			);
			}
				$this->keluar->update(array('id_tc_surat_keluar' => $this->input->post('id_tc_surat_keluar')), $data);
				$data['kliru'] = 'Sudah Tersimpan';
				$data['status'] = true;
				echo json_encode($data);
	}
	}
// End Edit Data Tabel Surat Keluar --------------------------------------------------------------------------------

// Delete Data Tabel Surat Keluar --------------------------------------------------------------------------------
	public function ajax_delete_keluar($id)
	{
		$this->keluar->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
// End Delete Data Tabel Surat Keluar --------------------------------------------------------------------------------

// Validate Data Tabel Surat Keluar --------------------------------------------------------------------------------
	private function _validate_keluar()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
        $data['status'] = TRUE;

		if($this->input->post('tgl_surat') == '')
		{
			$data['inputerror'][] = 'tgl_surat';
			$data['error_string'][] = 'Tanggal surat is required';
			$data['status'] = FALSE;
        }
        
		if($this->input->post('tgl_kirim') == '')
		{
			$data['inputerror'][] = 'tgl_kirim';
			$data['error_string'][] = 'Tanggal kirim is required';
			$data['status'] = FALSE;
        }
        
		if($this->input->post('nomor') == '')
		{
			$data['inputerror'][] = 'nomor';
			$data['error_string'][] = 'nomor is required';
			$data['status'] = FALSE;
        }
        
		if($this->input->post('hal') == '')
		{
			$data['inputerror'][] = 'hal';
			$data['error_string'][] = 'Perihal is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('tujuan') == '')
		{
			$data['inputerror'][] = 'tujuan';
			$data['error_string'][] = 'Kepada is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('alamat') == '')
		{
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'Alamat is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('pengirim') == '')
		{
			$data['inputerror'][] = 'pengirim';
			$data['error_string'][] = 'Pengirim is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
// End Validate Data Tabel Surat Keluar --------------------------------------------------------------------------------

}