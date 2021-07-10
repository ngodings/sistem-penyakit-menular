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
	public function view_penyakit()
	{
		$query = $this->db->get('penyakit');
        return $query->result_array();
    }

	public function get_penyakit_by_id($id)
	{
		return $this->db->select('*')
		->from('penyakit')
		->where('id_penyakit', $id)->get()->row();
	}
	public function get_kecamatan_by_id($id)
	{
		return $this->db->select('*')
		->from('kecamatan')
		->where('id_kec', $id)->get()->row();
	}

	public function getJoinCount($id, $status)
    {
        $this->db->select('*');
        $this->db->from('rekam_medik');
        $this->db->join('pasien', 'pasien.id_pasien=rekam_medik.id_pasien');
        $this->db->join('penyakit', 'penyakit.id_penyakit=rekam_medik.id_penyakit');
        $this->db->where('rekam_medik.id_penyakit', $id);
		$this->db->where('rekam_medik.status', $status);
        $query = $this->db->get();
        return $query;
    }
	public function getJoinCountAll($id)
    {
        $this->db->select('*');
        $this->db->from('rekam_medik');
        $this->db->join('pasien', 'pasien.id_pasien=rekam_medik.id_pasien');
        $this->db->join('penyakit', 'penyakit.id_penyakit=rekam_medik.id_penyakit');
        $this->db->where('rekam_medik.id_penyakit', $id);
        $query = $this->db->get();
        return $query;
    }
	public function getJoinCountKec($id, $status, $id_kec)
    {
        $this->db->select('*');
        $this->db->from('rekam_medik');
        $this->db->join('pasien', 'pasien.id_pasien=rekam_medik.id_pasien');
        $this->db->join('penyakit', 'penyakit.id_penyakit=rekam_medik.id_penyakit');
        $this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
        $this->db->where('rekam_medik.id_penyakit', $id);
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('kecamatan.id_kec', $id_kec);
        $query = $this->db->get();
        return $query;
    }
	public function getJoinCountAllKec($id, $id_kec)
    {
        $this->db->select('*');
        $this->db->from('rekam_medik');
        $this->db->join('pasien', 'pasien.id_pasien=rekam_medik.id_pasien');
        $this->db->join('penyakit', 'penyakit.id_penyakit=rekam_medik.id_penyakit');
        $this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
        $this->db->where('rekam_medik.id_penyakit', $id);
		$this->db->where('kecamatan.id_kec', $id_kec);
        $query = $this->db->get();
        return $query;
    }
	//model
    function check_nik($nik)
    {
        $this->db->select('nik');
        $this->db->where('nik', $nik);
        $query =$this->db->get('pasien');
        $row = $query->row();
        if ($query->num_rows > 0) {
            return $row->nik;
        } else {
            return "";
        }
    }

	public function getData($id_penyakit){
		$sql = "
		SELECT nama_kecamatan, 
		coalesce(ps.total_ps,0 ) as total, 
		coalesce(ps1.total_sembuh, 0) as sembuh,
		coalesce(ps2.total_meninggal, 0) as meninggal,
		coalesce(ps3.total_aktif, 0) as aktif
		FROM (SELECT k1.id_kec, k1.nama_kecamatan
			FROM kecamatan AS k1) AS kec
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_ps
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
					WHERE rm1.id_penyakit = '$id_penyakit'
					GROUP BY p1.id_kec) AS ps
				ON (kec.id_kec = ps.id_kec)
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_sembuh
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Sembuh' AND rm1.id_penyakit = '$id_penyakit'
					GROUP BY p1.id_kec) AS ps1
				ON (kec.id_kec = ps1.id_kec)
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_meninggal
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Meninggal' AND rm1.id_penyakit = '$id_penyakit'
					GROUP BY p1.id_kec) AS ps2
				ON (kec.id_kec = ps2.id_kec)
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_aktif
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Dalam Perawatan' AND rm1.id_penyakit = '$id_penyakit'
					GROUP BY p1.id_kec) AS ps3
				ON (kec.id_kec = ps3.id_kec)
		
		";
		return $result = $this->db->query($sql);
	

	}
	public function getDataKel($id_penyakit, $id_kec){
		$sql = "
		SELECT nama_kelurahan, 
		coalesce(ps.total_ps,0 ) as total, 
		coalesce(ps1.total_sembuh, 0) as sembuh,
		coalesce(ps2.total_meninggal, 0) as meninggal,
		coalesce(ps3.total_aktif, 0) as aktif
		FROM (SELECT k1.id_kec, k1.id_kel, k1.nama_kelurahan
			FROM kelurahan AS k1 WHERE k1.id_kec = '$id_kec') AS kec
				LEFT JOIN (SELECT p1.id_kel, count(*) AS total_ps
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
					WHERE rm1.id_penyakit = '$id_penyakit' 
					GROUP BY p1.id_kel) AS ps
				ON (kec.id_kel = ps.id_kel)
				LEFT JOIN (SELECT p1.id_kel, count(*) AS total_sembuh
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Sembuh' AND rm1.id_penyakit = '$id_penyakit' 
					GROUP BY p1.id_kel) AS ps1
				ON (kec.id_kel = ps1.id_kel)
				LEFT JOIN (SELECT p1.id_kel, count(*) AS total_meninggal
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Meninggal' AND rm1.id_penyakit = '$id_penyakit' 
					GROUP BY p1.id_kel) AS ps2
				ON (kec.id_kel = ps2.id_kel)
				LEFT JOIN (SELECT p1.id_kel, count(*) AS total_aktif
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Dalam Perawatan' AND rm1.id_penyakit = '$id_penyakit' 
					GROUP BY p1.id_kel) AS ps3
				ON (kec.id_kel = ps3.id_kel)
		
		";
		return $result = $this->db->query($sql);
	

	}
	public function getDataKec($id_penyakit){
		$sql = "
		SELECT nama_kelurahan, 
		coalesce(ps.total_ps,0 ) as total, 
		coalesce(ps1.total_sembuh, 0) as sembuh,
		coalesce(ps2.total_meninggal, 0) as meninggal,
		coalesce(ps3.total_aktif, 0) as aktif
		FROM (SELECT k1.id_kec, k1.nama_kelurahan
			FROM kelurahan AS k1) AS kec
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_ps
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
					WHERE rm1.id_penyakit = '$id_penyakit' 
					GROUP BY p1.id_kec) AS ps
				ON (kec.id_kec = ps.id_kec)
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_sembuh
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Sembuh' AND rm1.id_penyakit = '$id_penyakit' 
					GROUP BY p1.id_kec) AS ps1
				ON (kec.id_kec = ps1.id_kec)
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_meninggal
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Meninggal' AND rm1.id_penyakit = '$id_penyakit' 
					GROUP BY p1.id_kec) AS ps2
				ON (kec.id_kec = ps2.id_kec)
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_aktif
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Dalam Perawatan' AND rm1.id_penyakit = '$id_penyakit' 
					GROUP BY p1.id_kec) AS ps3
				ON (kec.id_kec = ps3.id_kec)
		
		";
		return $result = $this->db->query($sql);
	

	}
	public function getDataFilter($id_penyakit, $tahun1, $tahun2, $jk){
		$sql = "
		SELECT nama_kecamatan, 
		coalesce(ps.total_ps,0 ) as total, 
		coalesce(ps1.total_sembuh, 0) as sembuh,
		coalesce(ps2.total_meninggal, 0) as meninggal,
		coalesce(ps3.total_aktif, 0) as aktif
		FROM (SELECT k1.id_kec, k1.nama_kecamatan
			FROM kecamatan AS k1) AS kec
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_ps
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
					WHERE rm1.id_penyakit = '$id_penyakit' AND rm1.tanggal_terinfeksi >= $tahun1 AND rm1.tanggal_terinfeksi <= $tahun2 AND p1.jk = '$jk'
					GROUP BY p1.id_kec) AS ps
				ON (kec.id_kec = ps.id_kec)
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_sembuh
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Sembuh' AND rm1.id_penyakit = '$id_penyakit'AND rm1.tanggal_terinfeksi >= $tahun1 AND rm1.tanggal_terinfeksi <= $tahun2 AND p1.jk = '$jk'
					GROUP BY p1.id_kec) AS ps1
				ON (kec.id_kec = ps1.id_kec)
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_meninggal
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Meninggal' AND rm1.id_penyakit = '$id_penyakit' AND rm1.tanggal_terinfeksi >= $tahun1 AND rm1.tanggal_terinfeksi <= $tahun2 AND p1.jk = '$jk'
					GROUP BY p1.id_kec) AS ps2
				ON (kec.id_kec = ps2.id_kec)
				LEFT JOIN (SELECT p1.id_kec, count(*) AS total_aktif
					FROM pasien AS p1
					JOIN rekam_medik AS rm1 ON rm1.id_pasien = p1.id_pasien
						WHERE rm1.status = 'Dalam Perawatan' AND rm1.id_penyakit = '$id_penyakit' AND rm1.tanggal_terinfeksi >= $tahun1 AND rm1.tanggal_terinfeksi <= $tahun2 AND p1.jk = '$jk'
					GROUP BY p1.id_kec) AS ps3
				ON (kec.id_kec = ps3.id_kec)
		
		";
		return $result = $this->db->query($sql);
	

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
	
	
	//FILTERING TAHUN KECAMATAN
	public function penyakit_kec_tahun ($id_kec, $status, $tahun1, $tahun2, $penyakit){
		//$tgl=date('Y-m-d');
		
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', $penyakit);
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tahun1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tahun2);
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}
	public function penyakit_kec($id_kec, $tahun1, $tahun2, $penyakit){
		//$tgl=date('Y-m-d');
		
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', $penyakit);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tahun1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tahun2);
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}
	//FILTER TAHUNAN 
	
	//tahun1 nol
	public function penyakit_kec1($id_kec, $tahun2, $penyakit){
		//$tgl=date('Y-m-d');
		
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', $penyakit);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tahun2);
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}
	//tahun2 nol
	public function penyakit_kec3($id_kec, $tahun1, $penyakit){
		//$tgl=date('Y-m-d');
		
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('penyakit.nama_penyakit', $penyakit);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tahun1);
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}
	//tahun1 nol
	public function penyakit_kec2($id_kec,  $tahun2){
		//$tgl=date('Y-m-d');
		
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tahun2);
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}
	//tahun2 nol
	public function penyakit_kec4($id_kec, $tahun1){
		//$tgl=date('Y-m-d');
		
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tahun1);
		$this->db->where('kecamatan.id_kec', $id_kec);

		return $this->db->count_all_results('rekam_medik');
	}
	

}
