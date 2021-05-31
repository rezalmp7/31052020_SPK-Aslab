<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller {

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
        $data['peserta'] = $this->M_admin->select_all('peserta')->result();
		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/pendaftar', $data);
		$this->load->view('logdata/layout/footer');
	}
	function detail()
	{
		$get = $this->input->get();

		$where_peserta = array(
			'id' => $get['id'] ); 
		$data['peserta'] = $this->M_admin->select_select_where('npm, nama, username, email, no_hp, semester, alamat, photo, cv', 'peserta', $where_peserta)->row();
		
		$where_nilai = array(
			'data_nilai.id_peserta' => $get['id']
		);
		$data['nilai'] = $this->M_admin->select_select_where_join_2table_type('
		data_nilai.id,
		kriteria.nama,
		data_nilai.nilai', 'kriteria', 'data_nilai', 'kriteria.id = data_nilai.id_kriteria', $where_nilai, 'left')->result();
		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/pendaftar_detail', $data);
		$this->load->view('logdata/layout/footer');
	}
	function hapus()
	{
		$get = $this->input->get();

		$where_peserta = array(
			'id' => $get['id']
		);
		$where_nilai = array(
			'id_peserta' => $get['id']
		);

		$this->M_admin->delete_data('peserta', $where_peserta);
		$this->M_admin->delete_data('data_nilai', $where_nilai);

		redirect(base_url('logdata/pendaftar'));
	}
}
