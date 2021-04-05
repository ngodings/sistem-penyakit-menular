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
}
