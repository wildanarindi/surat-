<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	public $konten = array('main_view' => '', );

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Masuk_model', 'masuk', TRUE);
	}
//adm
	public function masuk()
	{
	
	$data['title'] = 'Surat Keluar';
	$data = array(
		'client' =>  $this->masuk->client()
				
	);

		$this->konten['main_view'] = $this->load->view('surat/masuk', $data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);

		
	}

	public function ajax_list()
	{
		$list = $this->masuk->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $us) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = strtoupper($us->tgl_terima);
			$row[] = strtoupper($us->nomor);
			$row[] = strtoupper($us->hal);
			$row[] = strtoupper($us->kepada);
			$row[] = strtoupper($us->alamat_pengirim);
			$row[] = strtoupper($us->nm_persero);
			$row[] = strtoupper($us->keterangan);

			//add html for action
			$row[] = '
			<class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Action
			</button>
			<div class="dropdown-menu">
			<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_masuk('."'".$us->id_tc_surat_masuk."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
			<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_masuk('."'".$us->id_tc_surat_masuk."'".')"><i class="fa fa-edit ml-4"></i> Delete</a>';
		
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
	
    public function ajax_edit($id)
	{
		$data = $this->masuk->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
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

		$data = array(
				'tgl_terima' => $this->input->post('tgl_terima'),
				'nomor' => $this->input->post('nomor'),
				'hal' => $this->input->post('hal'),
				'kepada' => $this->input->post('kepada'),
				'alamat_pengirim' => $this->input->post('alamat_pengirim'),
				'pengirim' => $this->input->post('pengirim'),
				// 'keterangan' => $this->input->post('keterangan'),
			);
		$insert = $this->masuk->save_masuk($data);
		$data['kliru'] = 'Sudah Tersimpan';
		$data['status'] = true;
		echo json_encode($data);
	}
}

	public function ajax_update()
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

		$data = array(
			    'tgl_terima' => $this->input->post('tgl_terima'),
				'nomor' => $this->input->post('nomor'),
				'hal' => $this->input->post('hal'),
				'kepada' => $this->input->post('kepada'),
				'alamat_pengirim' => $this->input->post('alamat_pengirim'),
				'pengirim' => $this->input->post('pengirim'),
				// 'keterangan' => $this->input->post('keterangan'),
			);
		$this->masuk->update(array('id_tc_surat_masuk' => $this->input->post('id_tc_surat_masuk')), $data);
		$data['kliru'] = 'Sudah Tersimpan';
		$data['status'] = true;
		echo json_encode($data);
	}
	}

	public function ajax_delete($id)
	{
		$this->masuk->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
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
		// if($this->input->post('keterangan') == '')
		// {
		// 	$data['inputerror'][] = 'keterangan';
		// 	$data['error_string'][] = 'Alamat Pengirim is required';
		// 	$data['status'] = FALSE;
		// }

		if($data_keluar['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	}




/* End of file eselon.php */
/* Location: ./application/controllers/eselon.php */
