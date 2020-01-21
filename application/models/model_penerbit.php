<?php
 class Model_penerbit extends CI_Model
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

     public function updateDataPenerbit()
     {
         $data = [
             "nama_penerbit" => $this->input->post('nama_penerbit',true),
             "alamat_penerbit" => $this->input->post('alamat_penerbit',true),
             "no_telp" => $this->input->post('no_telp',true)
         ];

         $this->db->where('id_penerbit', $this->input->post('id_penerbit'));
         $this->db->update('penerbit',$data);
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