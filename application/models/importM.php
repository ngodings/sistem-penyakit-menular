<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class importM extends CI_Model {

	public function insert($data){
		$insert = $this->db->insert_batch('pasien', $data);
		$insert = $this->db->insert_batch('rekam_medik', $data);
		if($insert){
			return true;
		}
	}
	public function getData(){
		$this->db->select('*');
		return $this->db->get('rekam_medik')->result_array();
	}
	public function import_data(){
		$data = [
            'id_pasien' => $this->input->post('id_pasien'),
            'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jk' => $this->input->post('jk'),
			'id_kec' => $this->input->post('kecamatan'),
			'id_kel' => $this->input->post('kelurahan'),
			'alamat' => $this->input->post('alamat'),
            
        ];

        $data_rm = [
            'id_rm' => $this->input->post('id_rm'),
            'id_pasien' => $this->input->post('pasien'),
			'tanggal_terinfeksi' => $this->input->post('tanggal_terinfeksi'),
			'id_penyakit' => $this->input->post('penyakit'),
			'status' => $this->input->post('status'),
			'tanggal_sembuh' => $this->input->post('tanggal_sembuh'),
			'keterangan' => $this->input->post('keterangan'),
			'id_user' => $this->input->post('user'),
            
        ];
		$this->db->insert('pasien', $data);
        $this->db->insert('rekam_medik', $data_rm);
		
    }
	private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('pasien', $data);
		$insert = $this->db->insert_batch('rekam_medik', $data);
    }
	public function getJoin()
    {
        $this->db->select('*');
        $this->db->from('rekam_medik');
        $this->db->join('pasien', 'pasien.id_pasien=rekam_medik.id_pasien');
        $this->db->join('penyakit', 'penyakit.id_penyakit=rekam_medik.id_penyakit');
        $this->db->join('user', 'user.id_user=rekam_medik.id_user');

        
        $query = $this->db->get();
        return $query;
    }
    // get employee list
    public function employeeList() {
        $this->db->select(array('e.id', 'e.first_name', 'e.last_name', 'e.email', 'e.dob', 'e.contact_no'));
        $this->db->from('import as e');
        $query = $this->db->get();
        return $query->result_array();
    }

}
