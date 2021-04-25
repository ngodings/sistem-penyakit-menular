<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('PasienM', '', TRUE);
        $this->load->library('form_validation');
    }
	public function index()
	{
		
		$data['judul'] = "Selamat Datang ";


        $this->load->view('template/header', $data);
        $this->load->view('front/index', $data);
        $this->load->view('template/footer');
	}

}
