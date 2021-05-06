<?php

class MedisM extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get('rekam_medik');
        return $query;
    }

    public function getIdRM($id)
    {
        $query = $this->db->get_where('rekam_medik', [
            'id_rm' => $id
        ]);
        return $query;
    }
	function Pasien()
    {
        $this->db->order_by('id_pasien', 'ASC');
        return $this->db->from('pasien')
          ->get()
          ->result();
    }
	function Penyakit()
    {
        $this->db->order_by('id_penyakit', 'ASC');
        return $this->db->from('penyakit')
          ->get()
          ->result();
    }
	function User()
    {
        $this->db->order_by('id_user', 'ASC');
        return $this->db->from('user')
          ->get()
          ->result();
    }

    public function buat_kode()
    {
        $this->db->select('RIGHT(rekam_medik.id_rm,3) as kode', false);
        $this->db->order_by('id_rm', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('rekam_medik');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "RMD" . $kodemax;

        return $kodejadi;
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
	public function getJoinId($id)
    {
        $this->db->select('*');
        $this->db->from('rekam_medik');
        $this->db->join('pasien', 'pasien.id_pasien=rekam_medik.id_pasien');
        $this->db->join('penyakit', 'penyakit.id_penyakit=rekam_medik.id_penyakit');
		
        $this->db->join('user', 'user.id_user=rekam_medik.id_user');
        $this->db->where('rekam_medik.id_rm', $id);
        $query = $this->db->get();
        return $query;
    }
	public function add(){
        
        $data = [
            'id_rm' => $this->input->post('id_rm'),
            'id_pasien' => $this->input->post('pasien'),
			'tanggal_terinfeksi' => $this->input->post('tanggal_terinfeksi'),
			'id_penyakit' => $this->input->post('penyakit'),
			'status' => $this->input->post('status'),
			'tanggal_sembuh' => $this->input->post('tanggal_sembuh'),
			'keterangan' => $this->input->post('keterangan'),
			'id_user' => $this->input->post('user'),
            
        ];

        $this->db->insert('rekam_medik', $data);
		
    }

	public function edit()
    {
        $id = $this->input->post('id_rm');
        

        $data = [
        
            'id_rm' => $id,
			'tanggal_terinfeksi' => $this->input->post('tanggal_terinfeksi'),
			
			'status' => $this->input->post('status'),
			'tanggal_sembuh' => $this->input->post('tanggal_sembuh'),
			'keterangan' => $this->input->post('keterangan'),
	
            

        
        ];

        
        $this->db->where('id_rm', $id);
        $this->db->update( 'rekam_medik', $data);

    }

	public function hapusData($id)
    {
       
        $this->db->from("rekam_medik");
        $this->db->where("id_rm", $id);
        $this->db->delete("rekam_medik");
    }

	public function CountKecamatan ($id_kec, $nama){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', ' pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', $nama);
		$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('rekam_medik.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}

	
}
