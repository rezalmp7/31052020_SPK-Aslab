<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		
		$data['pendaftaran'] = $this->M_admin->select_where('berita', 'id=1 OR id=2')->result();
		
		$data['photo_peserta'] = $this->M_admin->select_select('photo', 'peserta')->result();
		$data['jumlah_peserta'] = $this->M_admin->select_select('photo', 'peserta')->num_rows();
		$where_max_daftar = array(
			'id' => 2 
		);
		$data['tanggal_akhir'] = $this->M_admin->select_where('berita', $where_max_daftar)->row();
		$data['berita'] = $this->M_admin->select_all('berita')->result();

		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/dashboard', $data);
	}
}
