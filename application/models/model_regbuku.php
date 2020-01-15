<?php
 class model_regbuku extends CI_Model
 {
     function view_reg_buku()
     {
         //ambil data buku dari tabel buku
         $reg_buku = $this->db->get('reg_buku');
         return $reg_buku;
     }

     function view_user()
     {
        //ambil data user dari tabel user
        $user = $this->db->get('user');
        return $user;
     }

     function product($no_reg)
     {
         return $this->db->get_where('reg_buku',array('no_reg'=>$no_reg));
     }

     
     function delete($no_reg)
     {
         $this->db->where('no_reg',$no_reg);
         $this->db->delete('reg_buku');
     }

 

}

