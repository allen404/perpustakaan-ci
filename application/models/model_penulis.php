<?php
 class Model_penulis extends CI_Model
 {
     function view_penulis()
     {
         //ambil data penerbit dari tabel penerbit
         $penulis = $this->db->get('penulis');
         return $penulis;
     }

     public function getAllPenulis()
    {
        return $this->db->get('penulis')->result_array();
    }

    public function getPenulisById($id)
    {
       return $this->db->get_where('penulis', ['id_penulis  ' => $id])->row_array();
    }
     
}