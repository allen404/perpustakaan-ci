<?php
 class model_buku extends CI_Model
 {
     function view_buku()
     {
         //ambil data buku dari tabel buku
         $buku = $this->db->get('buku');
         return $buku;
     }

     function view_user()
     {
        //ambil data user dari tabel user
        $user = $this->db->get('user');
        return $user;
     }

     function product($id_buku)
     {
         return $this->db->get_where('buku',array('id_buku'=>$id_buku));
     }

     
     function delete($id_buku)
     {
         $this->db->where('id_buku',$id_buku);
         $this->db->delete('buku');
     }

    
}

