<?php

class KecamatanM extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get('kecamatan');
        return $query;
    }
}
