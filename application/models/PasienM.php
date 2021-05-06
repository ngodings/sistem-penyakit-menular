<?php

class PasienM extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get('pasien');
        return $query;
    }

	public function getIdPasien($id)
    {
        $query = $this->db->get_where('pasien', [
            'id_pasien' => $id
        ]);
        return $query;
    }

    public function buat_kode()
    {

        $this->db->select('RIGHT(pasien.id_pasien,3) as kode', FALSE);
        $this->db->order_by('id_pasien', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pasien');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "PSN" . $kodemax;

        return $kodejadi;
    }
	function Kecamatan()
    {
        $this->db->order_by('id_kec', 'ASC');
        return $this->db->from('kecamatan')
          ->get()
          ->result();
    }

	function Kelurahan($id_kec)
    {
        $this->db->where('id_kec', $id_kec);
        $this->db->order_by('id_kel', 'ASC');
        return $this->db->from('kelurahan')
            ->get()
            ->result();
    }

	public function getJoinId($id)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('kecamatan', 'kecamatan.id_kec=pasien.id_kec');
        $this->db->join('kelurahan', 'kelurahan.id_kel=pasien.id_kel');
        $this->db->where('pasien.id_pasien', $id);
        $query = $this->db->get();
        return $query;
    }
	public function getJoin()
    {
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->join('kecamatan', 'kecamatan.id_kec=pasien.id_kec');
        $this->db->join('kelurahan', 'kelurahan.id_kel=pasien.id_kel');
        
        $query = $this->db->get();
        return $query;
    }

	public function tambah(){
        
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

        $this->db->insert('pasien', $data);
    }

    public function hapus($id)
    {
       
        $this->db->from("pasien");
        $this->db->where("id_pasien", $id);
        $this->db->delete("pasien");
    }
	public function edit()
    {
        $id = $this->input->post('id_pasien');
        

        $data = [
        
            'id_pasien' => $id,
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jk' => $this->input->post('jk'),
			'id_kec' => $this->input->post('kecamatan'),
			'id_kel' => $this->input->post('kelurahan'),
			'alamat' => $this->input->post('alamat'),
            

        
        ];

        
        $this->db->where('id_pasien', $id);
        $this->db->update( 'pasien', $data);

    }

	public function Percobaan ($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'coronos');
		$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}

	public function get_count_covid ($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'COVID-19');
		$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}

	public function get_count_tbc ($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'TBC');
		$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}

	public function get_count_ims ($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'IMS');
		$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}

	public function get_count_diare ($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'Diare');
		$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}

	public function get_count_dbd ($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'DBD');
		$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}

}
