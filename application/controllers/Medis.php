<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medis extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('url','form'));
        $this->load->model('MedisM', '', TRUE);
        $this->load->library('form_validation');
    }
	public function index()
	{
		$data = array(
					'title' => 'Rekam Medik Pasien Penyakit Menular',
					'isi' => 'medis/index'
		);
		

		//SELECT DATA PASIEN
		$data['rm'] = $this->MedisM->getJoin()->result_array();
		// var_dump($data);
		// die;

		$this->load->view('template/v_wrapper', $data, FALSE);
	}

}
