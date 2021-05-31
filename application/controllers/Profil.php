<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
		if($this->session->userdata('status') != 'login')
		{
			redirect(base_url('login'));
		}
        $this->load->model('M_admin');   
    }
	public function index()
	{
        $id_user = $this->session->userdata('id');

        $where = array(
            'id' => $id_user
		);
		$where_nilai = "data_nilai.id_peserta='$id_user' AND kriteria.id='1' OR data_nilai.id_peserta='$id_user' AND kriteria.id='3'";
		// $where_or_nilai = array(
		// 	'kriteria.id' => 1
        // );
        $data['user'] = $this->M_admin->select_where(
			'peserta', $where)->row();
		$data['nilai'] = $this->M_admin->select_select_where_join_2table_type('
		data_nilai.id,
		kriteria.nama,
		data_nilai.nilai', 'kriteria', 'data_nilai', 'kriteria.id = data_nilai.id_kriteria', $where_nilai, 'left')->result();
		if($data['nilai'] == null)
		{
			redirect(base_url("signupstep"));
		}
		else {
			$this->load->view('layout/header');
			$this->load->view('profil', $data);
			$this->load->view('layout/footer');
		}
	}
	function upload_file($namafile, $nm_input){
		$config['upload_path']          = './assets/img/peserta/data';
		$config['allowed_types']        = 'pdf|png|jpg|jpeg';
		$config['file_name']            = $namafile;
	    $config['overwrite']			= true;
		$config['max_size']             = 100000;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload($nm_input)){ 
			$error = $this->upload->display_errors();
			return false;
		}else{
			$data = $this->upload->data('file_name');
			return $data;
		}
	}
	function edit()
	{
		$post = $this->input->post();

		$id_peserta = $post['id'];
		//update table peserta
		if($post['password_baru'] == null)
		{
			$password = $post['password_lama'];
			
		}
		else {
			if($post['password_baru'] == $post['password'])
			{
				$password = md5($post['password_baru']);
			}
			else {
				$password = false;
			}
		}

		if($password != false)
		{
			if ($_FILES['photo']['size'] == null)
			{
				$photo = $post['photo_lama'];
			}
			else {
				$photo = $this->upload_file($id_peserta, 'photo');
			}

			if ($_FILES['cv']['size'] == null)
			{
				$cv = $post['cv_lama'];
			}
			else {
				$cv = $this->upload_file($id_peserta, 'cv');
			}

			if($photo == false || $cv == false)
			{
				redirect(base_url('profil?msg=1'));
			}
			else {
				$where_peserta = array(
					'id' => $id_peserta
				);
				$set_peserta = array(
					'npm' => $post['npm'],
					'nama' => $post['nama'],
					'username' => $post['username'],
					'password' => $password,
					'email' => $post['email'],
					'no_hp' => $post['no_hp'],
					'semester' => $post['semester'],
					'alamat' => $post['alamat'],
					'photo' => $photo,
					'cv' => $cv
				);

				$this->M_admin->update_data('peserta', $set_peserta, $where_peserta);

				$id_nilai = $post['id_nilai'];
				$data_nilai = array();
				foreach($id_nilai AS $key => $val){
					$data_nilai[] = array(
						'id' => $post['id_nilai'][$key],
						'nilai' => $post['nilai_nilai'][$key]
					);
				}
				$this->M_admin->updateBatch('data_nilai' , $data_nilai , 'id' );

				redirect(base_url('profil'));
			}
		}
		else {
			redirect(base_url('profil?msg=2'));
		}
		
	}
}
