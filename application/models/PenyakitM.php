<?php

class PenyakitM extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get('penyakit');
        return $query;
    }

    public function getIdPenyakit($id)
    {
        $query = $this->db->get_where('penyakit', [
            'id_penyakit' => $id
        ]);
        return $query;
    }

    public function buat_kode()
    {

        $this->db->select('RIGHT(penyakit.id_penyakit,3) as kode', FALSE);
        $this->db->order_by('id_penyakit', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('penyakit');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "PNYKT" . $kodemax;

        return $kodejadi;
    }

	public function tambah(){
        //$data['kodeunik'] = $this->buat_kode();
        $data = [
            'id_penyakit' => $this->input->post('id_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            
        ];

        $this->db->insert('penyakit', $data);
    }

	function ubah($data, $id){
		$this->db->where('id_penyakit',$id);
		$this->db->update('penyakit', $data);
		return TRUE;
	}

    public function hapusDataPenyakit($id)
    {
       
        $this->db->from("penyakit");
        $this->db->where("id_penyakit", $id);
        $this->db->delete("penyakit");
    }
    
   
    
}
