<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'session');
        //$this->load->model('User');
        $this->load->database();

		
    }
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $data = array(
				'title' => 'Login',
				'isi' => 'auth/login'
				);
			$this->load->view('template/wrapper', $data, FALSE);
        } else {

            $this->login();
        }
		
	}
	private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
		$passwordx = md5($password);

        $user = $this->db->get_where('user', [
            'username' => $username
        ])->row_array();


        // JIKA USER ADA
        if ($user['username'] == $username) {
            
			if ($passwordx) { //password_verify($password, $user['password'])
				// echo "sama";

				$data = [
					'username' => $user['username'],
					'level' => $user['level']
					
				];
				$this->session->set_userdata($data);
                    if ($user['level'] == 'admin') {
                        redirect('Home');
                    } else {
                        
                    }
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
										Password salah!
										</div>');
				redirect('auth');
			}
		
	} else {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
										username belum terdaftar!
										</div>');
		redirect('auth');
	}
        
}
		public function logout()
			{
				$this->session->unset_userdata('username');
				$this->session->unset_userdata('level');

				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
													Logout berhasil!.
													</div>');
				redirect('auth');
			}

}
