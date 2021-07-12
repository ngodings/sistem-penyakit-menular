<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportModel extends CI_Model {

	public function insert($data){
		$insert = $this->db->insert('rekam_medik', $data);
		if($insert){
			return true;
		}
	}

	public function get_pasien($nama){
		$this->db->select("id_pasien");
		return $this->db->get_where("pasien", array('nama' => $nama))->row();
	}
	
	public function get_penyakit($nama){
		$this->db->select("id_penyakit");
		return $this->db->get_where("penyakit", array('nama_penyakit' => $nama))->row();
	}

	public function getData(){
		$this->db->select('*');
		return $this->db->get('rekam_medik')->result_array();
	}

}
