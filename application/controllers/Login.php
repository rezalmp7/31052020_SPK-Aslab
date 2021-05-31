<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->model('M_admin');
    }
	public function index()
	{
        $this->load->view('layout/header');
        $this->load->view('login');
        $this->load->view('layout/footer');
    }
    function login_aksi()
    {
        $post = $this->input->post();

        if($post['username'] == "" || $post['password'] == "")
        {
            redirect(base_url('login?page=login&msg=1'));
        }
        else {
            $password = md5($post['password']);
            
            $where_login = array(
                'username' => $post['username'],
                'password' => $password
            );

            $cek_login = $this->M_admin->select_select_where('id', 'peserta', $where_login)->num_rows();
            if($cek_login >= 1)
            {
                $select_user = $this->M_admin->select_select_where('id, email, username, photo', 'peserta', $where_login)->result_array();
                foreach($select_user as $a)
                {
                    $id_user = $a['id'];
                    $username = $a['username'];
                    $email = $a['email'];
                    $photo = $a['photo'];
                }
                $data_session = array(
                    'status' => "login",
                    'username' => $username,
                    'email' => $email,
                    'id' => $id_user,
                    'photo' => $a['photo']
                );
                $this->session->set_userdata($data_session);
                redirect(base_url('home'));
            }
            else {
                redirect(base_url('login?page=login&msg=2'));
            }
        }
    }
    function daftar_aksi()
    {
        $date = date('Y-m-d');
        $where_max_daftar = array(
            'id' => 2
        );
        $where_min_daftar = array(
            'id' => 1
        );
        $select_min_daftar = $this->M_admin->select_where('berita', $where_min_daftar)->row();
        $select_max_daftar = $this->M_admin->select_where('berita', $where_max_daftar)->row();
        $min_daftar = date('Y-m-d', strtotime($select_min_daftar->tanggal));
        $max_daftar = date('Y-m-d', strtotime($select_max_daftar->tanggal));
        if($date <= $max_daftar & $date >= $min_daftar)
        {
            $post = $this->input->post();

            if($post['password'] == $post['re_password'])
            {
                //cekusername
                $where_cek_username = array(
                    'username' => $post['username']
                );
                $cek_username = $this->M_admin->select_select_where('username', 'peserta', $where_cek_username)->num_rows();
                if($cek_username >= 1)
                {
                    redirect(base_url('login?page=signup&msg=2'));
                }
                else {
                    $password = md5($post['password']);
                    $data = array(
                        'username' => $post['username'],
                        'password' => $password,
                        'email' => $post['email']
                    );
                    $insert_data = $this->M_admin->insert_data('peserta', $data);
                    
                    if($password != null)
                    {
                        $where_select_user = array(
                            'username' => $post['username'],
                            'password' => $password
                        );
                        $cek = $this->M_admin->select_select_where('id', 'peserta', $where_select_user)->num_rows();
                        if($cek >= 1)
                        {
                            $select_user = $this->M_admin->select_select_where('id, email, username', 'peserta', $where_select_user)->result_array();
                            foreach($select_user as $a)
                            {
                                $id_user = $a['id'];
                                $username = $a['username'];
                                $email = $a['email'];
                            }
                            $data_session = array(
                                'status' => "login",
                                'username' => $username,
                                'email' => $email,
                                'id' => $id_user,
                            );
                            $this->session->set_userdata($data_session);
                            redirect(base_url('signupstep'));
                        }
                        else {
                            redirect(base_url('home'));
                        }
                    }
                }
            }
            else {
                redirect(base_url('login?page=signup&msg=1'));
            }
        }
        else {
            redirect(base_url('login?page=signup&msg=3'));
        }
    }
    function upload_file($namafile1, $nm_input1){
        $config_file['upload_path']          = './assets/img/peserta/data';
		$config_file['allowed_types']        = 'pdf|png|jpg|jpeg';
		$config_file['file_name']            = $namafile1;
	    $config_file['overwrite']			 = true;
		$config_file['max_size']             = 100000;
 
		$this->load->library('upload', $config_file);
 
		if ( ! $this->upload->do_upload($nm_input1)){ 
			$error1 = $this->upload->display_errors();
			print_r($error1);
		}else{
			$data1 = $this->upload->data('file_name');
			return $data1;
		}
    }
    function tambah_data_user()
    {
        $post = $this->input->post();

        $namacode = $post['id'];

        $where_peserta = array(
            'id' => $post['id']
        );

        $set_peserta = array(
            'nama' => $post['nama'],
            'npm' => $post['npm'],
            'no_hp' => $post['no_hp'],
            'semester' => $post['semester'],
            'alamat' => $post['alamat'],
            'cv' => $this->upload_file($namacode, 'cv'),
            'photo' => $this->upload_file($namacode, 'photo')
        );

        $this->M_admin->update_data('peserta', $set_peserta, $where_peserta);

        $data_nilai = array(
            array(
                'id_peserta' => $post['id'],
                'id_kriteria' => 1,
                'nilai' => $post['ipk'],
            ),
            array(
                'id_peserta' => $post['id'],
                'id_kriteria' => 2,
                'nilai' => null,
            ),
            array(
                'id_peserta' => $post['id'],
                'id_kriteria' => 3,
                'nilai' => $post['mk_arorkom']
            ),
            array(
                'id_peserta' => $post['id'],
                'id_kriteria' => 4,
                'nilai' => null,
            )
        );

        $this->M_admin->insert_batch('data_nilai', $data_nilai);

        redirect(base_url('home'));

    }
    function signout()
    {
        $this->session->sess_destroy();
		redirect(base_url());
    }
}
