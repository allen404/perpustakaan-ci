<?php
 class model_penulis extends CI_Model
 {
     function view_penulis()
     {
         //ambil data penerbit dari tabel penerbit
         $penulis = $this->db->get('penulis');
         return $penulis;
     }
     
     function product($id_penulis)
     {
         return $this->db->get_where('penulis',array('id_penulis'=>$id_penulis));
     }

     function delete($id_penulis)
     {
         $this->db->where('id_penulis',$id_penulis);
         $this->db->delete('penulis');
     }
     
     
}