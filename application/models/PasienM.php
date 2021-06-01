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

	public function get_all_corona ($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'COVID-19');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		//$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		

		return $this->db->count_all_results('rekam_medik');
	}
	public function get_all_corona_aktif ($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$tgl=date('Y-m-d');
		$tgl1= '2020-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'COVID-19');
		$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		//$this->db->where("rekam_medik.tanggal_terinfeksi BETWEEN $tgl1 AND $tgl", NULL, FALSE);

		return $this->db->count_all_results('rekam_medik');
	}
	public function get_all_corona_sembuh($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$tgl=date('Y-m-d');
		$tgl1= '2020-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'COVID-19');
		$this->db->where('rekam_medik.status', 'Sembuh');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		//$this->db->where("rekam_medik.tanggal_terinfeksi BETWEEN $tgl1 AND $tgl", NULL, FALSE);

		return $this->db->count_all_results('rekam_medik');
	}
	public function get_all_corona_die($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$tgl=date('Y-m-d');
		$tgl1= '2020-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'COVID-19');
		$this->db->where('rekam_medik.status', 'Meninggal');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		//$this->db->where("rekam_medik.tanggal_terinfeksi BETWEEN $tgl1 AND $tgl", NULL, FALSE);

		return $this->db->count_all_results('rekam_medik');
	}
	//COVID DETAIl
	public function get_covid_kel ($id_kel){
		$tgl=date('Y-m-d');
		$tgl1= '2020-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'COVID-19');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		//$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	
	public function covid_kel_usia ($id_kel, $status, $jk, $tahun1, $tahun2){
		$tgl=date('Y-m-d');
		$tgl1= '2020-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'COVID-19');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('pasien.jk', $jk);
		$this->db->where('pasien.tanggal_lahir >=', $tahun1);
		$this->db->where('pasien.tanggal_lahir <=', $tahun2);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function covid_kel ($id_kel, $status){
		$tgl=date('Y-m-d');
		$tgl1= '2020-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'TBC');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}

	//TAMPILAN WEB ADMIN
	public function get_count_all ($id_kec, $status, $penyakit){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', $penyakit);
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}
	
	//COVID-19 berdasarkan kelurahan
	public function get_count_kel ($id_kel){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'COVID-19');
		//$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}

	//TBC DAN DETAIL TBC

	public function count_tbc_inf ($id_kec){ //infected
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
	public function get_all_tbc ($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'TBC');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		
		//$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		

		return $this->db->count_all_results('rekam_medik');
	}
	public function get_all_tbc_aktif ($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'TBC');
		$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kecamatan.id_kec', $id_kec);
		


		return $this->db->count_all_results('rekam_medik');
	}
	public function get_all_tbc_sembuh($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'TBC');
		$this->db->where('rekam_medik.status', 'Sembuh');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		

		return $this->db->count_all_results('rekam_medik');
	}
	public function get_all_tbc_die($id_kec){
		// $this->db->select('count(*)');
		// $this->db->from('rekam_medik');
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'TBC');
		$this->db->where('rekam_medik.status', 'Meninggal');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kecamatan.id_kec', $id_kec);
		
	

		return $this->db->count_all_results('rekam_medik');
	}

	//TBC berdasarkan kelurahan
	public function get_tbc_kel ($id_kel){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'TBC');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		//$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function tbc_kel ($id_kel, $status){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'TBC');
		$this->db->where('rekam_medik.status', $status);
	
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function tbc_kel_usia ($id_kel, $status, $jk, $tahun1, $tahun2){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'TBC');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('pasien.jk', $jk);
		$this->db->where('pasien.tanggal_lahir >=', $tahun1);
		$this->db->where('pasien.tanggal_lahir <=', $tahun2);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}




	//IMS DAN DETAIL
	public function get_ims($id_kec){
		
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'IMS');
		//$this->db->where('rekam_medik.status', $status);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		

		return $this->db->count_all_results('rekam_medik');
	}

	public function get_all_ims($id_kec, $status){
		
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'IMS');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		

		return $this->db->count_all_results('rekam_medik');
	}
	public function get_ims_kel ($id_kel){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'IMS');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		//$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function get_ims_status ($id_kel, $status){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'IMS');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function ims_kel ($id_kel, $status, $jk){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'IMS');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('pasien.jk', $jk);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function ims_kel_usia ($id_kel, $status, $jk, $tahun1, $tahun2){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'IMS');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('pasien.jk', $jk);
		$this->db->where('pasien.tanggal_lahir >=', $tahun1);
		$this->db->where('pasien.tanggal_lahir <=', $tahun2);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}


	//Diare DAN DETAIL
	public function get_diare($id_kec){
		
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'Diare');
		//$this->db->where('rekam_medik.status', $status);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		

		return $this->db->count_all_results('rekam_medik');
	}

	public function get_all_diare($id_kec, $status){
		
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'Diare');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		

		return $this->db->count_all_results('rekam_medik');
	}
	public function get_diare_kel ($id_kel){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'Diare');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		//$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function diare_kel_status ($id_kel, $status){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'Diare');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function diare_kel ($id_kel, $status, $jk){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'Diare');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('pasien.jk', $jk);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}

	public function diare_kel_usia ($id_kel, $status, $jk, $tahun1, $tahun2){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'Diare');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('pasien.jk', $jk);
		$this->db->where('pasien.tanggal_lahir >=', $tahun1);
		$this->db->where('pasien.tanggal_lahir <=', $tahun2);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}


	//DBD DAN DETAIL
	public function get_dbd($id_kec){
		
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'DBD');
		//$this->db->where('rekam_medik.status', $status);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		

		return $this->db->count_all_results('rekam_medik');
	}

	public function get_all_dbd($id_kec, $status){
		
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->where('penyakit.nama_penyakit', 'DBD');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		
		$this->db->where('kecamatan.id_kec', $id_kec);
		
		

		return $this->db->count_all_results('rekam_medik');
	}
	public function get_dbd_kel ($id_kel){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'DBD');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		//$this->db->where('rekam_medik.status', 'Dalam Perawatan');
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function dbd_kel_status ($id_kel, $status){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'DBD');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function dbd_kel ($id_kel, $status, $jk){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'DBD');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('pasien.jk', $jk);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}
	public function dbd_kel_usia ($id_kel, $status, $jk, $tahun1, $tahun2){
		$tgl=date('Y-m-d');
		$tgl1= '2015-01-01';
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', 'DBD');
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('pasien.jk', $jk);
		$this->db->where('pasien.tanggal_lahir >=', $tahun1);
		$this->db->where('pasien.tanggal_lahir <=', $tahun2);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl);
		$this->db->where('kelurahan.id_kel', $id_kel);

		return $this->db->count_all_results('rekam_medik');
	}

}
