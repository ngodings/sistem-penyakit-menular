<?php

class KelurahanM extends CI_Model
{
    public function getAll()
    {
        $query = $this->db->get('kelurahan');
        return $query;
    }
}
