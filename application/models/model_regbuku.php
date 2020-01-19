<?php
 class model_regbuku extends CI_Model
 {
 
     public function getAllRegBuku()
    {
        return $this->db->get('reg_buku')->result_array();
    }

    public function getRakById($id)
    {
       return $this->db->get_where('rak_buku', ['kode_rak' => $id])->row_array();
    }

}

