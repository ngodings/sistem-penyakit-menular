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

	function ubah($data, $id){
		$this->db->where('id_rm',$id);
		$this->db->update('rekam_medik', $data);
		return TRUE;
	}

	public function hapusData($id)
    {
       
        $this->db->from("rekam_medik");
        $this->db->where("id_rm", $id);
        $this->db->delete("rekam_medik");
    }
}