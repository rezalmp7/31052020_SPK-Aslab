<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

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
        $data['berita'] = $this->M_admin->select_all('berita')->result();
		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/berita', $data);
		$this->load->view('logdata/layout/footer');
	}
	public function info()
	{
		$get = $this->input->get();

		$where = array(
			'id' => $get['id']
		);
		
		$data['berita'] = $this->M_admin->select_where('berita', $where)->row();

		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/berita_info', $data);
		$this->load->view('logdata/layout/footer');
	}
	public function tambah()
	{
		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/berita_tambah');
		$this->load->view('logdata/layout/footer');
	}
	public function tambah_aksi()
	{
        $post = $this->input->post();

        $data = array(
            'judul' => $post['judul'],
            'deskripsi' => $post['deskripsi'],
            'tanggal' => $post['tanggal']
        );

        $this->M_admin->insert_data('berita', $data);

        redirect(base_url('logdata/berita'));
    }
    public function edit()
	{
        $where = array(
            'id' => $_GET['id']
        );

        $data['berita'] = $this->M_admin->select_where('berita', $where)->row();

		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/berita_edit', $data);
		$this->load->view('logdata/layout/footer');
	}
	public function edit_aksi()
	{
        $post = $this->input->post();

        $where = array(
            'id' => $post['id']
        );

        $set = array(
            'judul' => $post['judul'],
            'deskripsi' => $post['deskripsi'],
            'tanggal' => $post['tanggal']
        );

        $this->M_admin->update_data('berita', $set, $where);

        redirect(base_url('logdata/berita'));
	}
	public function info_pendaftaran()
	{
		$data['pendaftaran'] = $this->M_admin->select_where('berita', 'id=1 OR id=2')->result();

		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/berita_info_pendaftaran', $data);
		$this->load->view('logdata/layout/footer');
	}
	public function edit_pendaftaran()
	{
		$data['pendaftaran'] = $this->M_admin->select_where('berita', 'id=1 OR id=2')->result();

		$this->load->view('logdata/layout/header');
		$this->load->view('logdata/berita_edit_pendaftaran', $data);
		$this->load->view('logdata/layout/footer');
	}
	function edit_pendaftaran_aksi()
	{
		$post = $this->input->post();
		$id = $post['id'];
		$tanggal = array();
		foreach($id AS $key => $val){
			$tanggal[] = array(
				'id' => $post['id'][$key],
				'tanggal' => $post['tanggal'][$key]
			);
		}
		$this->M_admin->updateBatch('berita' , $tanggal , 'id' );
		
		redirect(base_url('logdata/berita'));
	}
    public function hapus()
	{
        $get = $this->input->get();

        $where = array(
            'id' => $get['id']
        );


        $this->M_admin->delete_data('berita', $where);

        redirect(base_url('logdata/berita'));
	}
}
