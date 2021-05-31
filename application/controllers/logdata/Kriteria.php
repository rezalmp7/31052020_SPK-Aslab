<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

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
        $data['kriteria'] = $this->M_admin->select_all('kriteria')->result();
		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/kriteria', $data);
		$this->load->view('logdata/layout/footer');
	}
	public function edit()
	{
        $get = $this->input->get();

        $where = array(
            'id' => $get['id']
        );
        
        $data['kriteria'] = $this->M_admin->select_where('kriteria', $where)->row();
		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/kriteria_edit', $data);
		$this->load->view('logdata/layout/footer');
	}
	public function edit_aksi()
	{
        $post = $this->input->post();

        $where = array(
            'id' => $post['id']
        );

        $set = array(
            'nama' => $post['nama'],
            'bobot' => $post['bobot'],
            'tipe' => $post['tipe']
        );
        
        $this->M_admin->update_data('kriteria', $set, $where);

        redirect(base_url('logdata/kriteria'));
	}
}
