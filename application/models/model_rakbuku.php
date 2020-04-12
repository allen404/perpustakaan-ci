<?php

class Model_rakbuku extends CI_Model
{

    public function getAllRak()
    {
        return $this->db->get('rak_buku')->result_array();
    }

    public function getRakById($id)
    {
       return $this->db->get_where('rak_buku', ['kode_rak' => $id])->row_array();
    }




}
