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
		$this->load->view('logdata/login');
    }
    function login_aksi()
    {
        $post = $this->input->post();

        $password = md5($post['password']);
        
        $where_login = array(
            'username' => $post['username'],
            'password' => $password
        );

        $cek_login = $this->M_admin->select_select_where('id', 'user', $where_login)->num_rows();
        if($cek_login >= 1)
        {
            $select_user = $this->M_admin->select_select_where('id, username, nama', 'user', $where_login)->result_array();
            foreach($select_user as $a)
            {
                $id_user = $a['id'];
                $username = $a['username'];
                $nama = $a['nama'];
            }
            $data_session = array(
                'status' => "login_admin",
                'username' => $username,
                'id' => $id_user,
                'nama' => $nama
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('logdata/dashboard'));
        }
        else {
            redirect(base_url('logdata/login?page=login&msg=1'));
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url('logdata/login'));
    }
}
