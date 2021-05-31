<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
	function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('status') != 'login_admin')
		{
			redirect(base_url('logdata/login/logout'));
		}
		
		$this->load->model('M_admin');
	}
	public function index()
	{
		$peserta = $this->M_admin->select_all('peserta')->result_array();
		$jumlah_peserta = count($peserta);
		$data['jumlah_peserta'] = $jumlah_peserta;
		for ($i=0; $i<$jumlah_peserta; $i++) {
			$id_array = $peserta[$i];
			$where_array = array(
				'id_peserta' => $id_array['id']
			);
			$data['peserta_array'][] = $this->M_admin->select_select_where_join_2table_type('peserta.nama, data_nilai.id_peserta, data_nilai.id_kriteria, data_nilai.nilai', 'data_nilai', 'peserta', 'data_nilai.id_peserta = peserta.id', $where_array, 'left')->result_array();
		};
		
		$data['kriteria'] = $this->M_admin->select_all('kriteria')->result();

		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/input', $data);
		$this->load->view('logdata/layout/footer');
	}
	public function input()
	{
		$get = $this->input->get();

		$where_peserta = array(
			'id' => $get['id']
		);
		$where_nilai = array(
			'id_peserta' => $get['id']
		);
		$data['data_peserta'] = $this->M_admin->select_where('peserta', $where_peserta)->row();
		$data['nilai'] = $this->M_admin->select_select_where_join_2table_type('
		data_nilai.id,
		kriteria.nama,
		data_nilai.id_kriteria,
		data_nilai.nilai', 'kriteria', 'data_nilai', 'kriteria.id = data_nilai.id_kriteria', $where_nilai, 'left')->result();

		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/input_input', $data);
		$this->load->view('logdata/layout/footer');
	}
	function input_aksi()
	{
		$post = $this->input->post();
		$id_nilai = $post['id_nilai'];
		$data_nilai = array();
		foreach($id_nilai AS $key => $val){
			$data_nilai[] = array(
				'id' => $post['id_nilai'][$key],
				'nilai' => $post['nilai_nilai'][$key]
			);
		}
		$this->M_admin->updateBatch('data_nilai' , $data_nilai , 'id' );

		redirect(base_url('logdata/input'));
	}
}
