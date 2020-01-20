<?php
 class model_regbuku extends CI_Model
 {
 
     public function getAllRegBuku()
    {
        return $this->db->get('reg_buku')->result_array();
    }

    public function getRegBukuById($id)
    {
       return $this->db->get_where('reg_buku', ['no_reg' => $id])->row_array();
    }

}

