<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medik extends CI_Controller
{
	public function index()
	{
		$data = array(
					'title' => 'Rekam Medik Pasien Penyakit Menular',
					'isi' => 'v_home'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

}
