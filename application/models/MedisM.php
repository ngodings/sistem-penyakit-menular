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
}
