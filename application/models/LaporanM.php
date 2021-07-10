<?php

class LaporanM extends CI_Model
{
	public function view_penyakit()
	{
		$this->db->order_by('id_penyakit', 'ASC');
        return $this->db->from('penyakit')
          ->get()
          ->result();
    }
	public function get_penyakit_by_id($id)
	{
		return $this->db->select('*')
		->from('penyakit')
		->where('id_penyakit', $id)->get()->row();
	}
	public function getAllPasien()
    {
        $query = $this->db->get('pasien');
        return $query;
    }
	public function getAllPenyakit()
    {
        $query = $this->db->get('penyakit');
        return $query;
    }
	public function getAllRM()
    {
        $query = $this->db->get('rekam_medik');
        return $query;
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
	//, 
	public function getJoin($id_penyakit, $status, $jk,  $tgl1, $tgl2)
    {
        $this->db->select('nik');
		$this->db->select('nama');
		$this->db->select('nama_kecamatan');
		$this->db->select('nama_kelurahan');
		$this->db->select('nama_penyakit');
		$this->db->select('status');
        $this->db->from('rekam_medik');
        $this->db->join('pasien', 'pasien.id_pasien=rekam_medik.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
        $this->db->join('penyakit', 'penyakit.id_penyakit=rekam_medik.id_penyakit');
        $this->db->join('user', 'user.id_user=rekam_medik.id_user');
		$this->db->where('penyakit.id_penyakit', $id_penyakit);
		$this->db->where('rekam_medik.status', $status);
		$this->db->where('pasien.jk', $jk);
		// $this->db->where('kecamatan.id_kec', $id_kec);
		// $this->db->where('kelurahan.id_kel', $id_kel);
		$this->db->where('rekam_medik.tanggal_terinfeksi >=', $tgl1);
		$this->db->where('rekam_medik.tanggal_terinfeksi <=', $tgl2);

        
        $query = $this->db->get();
        return $query;
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
	public function get_count($id_kel){
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('kelurahan.id_kel', $id_kel);
		return $this->db->count_all_results('rekam_medik');
	}
	public function get_count_status($id_kel, $status){
		$this->db->join('penyakit', 'rekam_medik.id_penyakit = penyakit.id_penyakit');
		$this->db->join('pasien','rekam_medik.id_pasien = pasien.id_pasien');
		$this->db->join('kecamatan', 'pasien.id_kec = kecamatan.id_kec');
		$this->db->join('kelurahan', 'pasien.id_kel = kelurahan.id_kel');
		$this->db->where('kelurahan.id_kel', $id_kel);
		$this->db->where('rekam_medik.status', $status);
		return $this->db->count_all_results('rekam_medik');
	}
}
