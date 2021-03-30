<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller
{
	public function index()
	{
		$data = array(
					'title' => 'Data Pribadi Pasien',
					'isi' => 'pasien/index'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

}
