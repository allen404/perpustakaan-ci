<?php
 class model_penerbit extends CI_Model
 {
     function view_penerbit()
     {
         //ambil data penerbit dari tabel penerbit
         $penerbit = $this->db->get('penerbit');
         return $penerbit;
     }

     public function getAllPenerbit()
     {
        return $this->db->get('penerbit')->result_array();
     }

     public function getPenerbitById($id)
     {
        return $this->db->get_where('penerbit', ['id_penerbit' => $id])->row_array();   
     }
     
     function product($id_penerbit)
     {
         return $this->db->get_where('penerbit',array('id_penerbit'=>$id_penerbit));
     }

     function delete($id_penerbit)
     {
         $this->db->where('id_penerbit',$id_penerbit);
         $this->db->delete('penerbit');
     }
     
     
}