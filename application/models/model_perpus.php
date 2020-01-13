<?php
 class model_perpus extends CI_Model
 {
     function view_pinjam()
     {
         //ambil data peminjaman dari tabel peminjaman
         $sql = "SELECT * FROM peminjaman";
         $peminjaman = $this->db->query($sql);
         return $peminjaman;
     }

     function view_user()
     {
         //ambil data user dari tabel user
         $sql = "SELECT * FROM user";
         $user = $this->db->query($sql);
         return $user;
     }


     function view_pinjam_user()
     {
        $no_identitas = $this->session->userdata('no_identitas');
        $sql = "SELECT * FROM peminjaman WHERE no_identitas = $no_identitas";
        $peminjaman = $this->db->query($sql);
        return $peminjaman;
     }

     function view_buku()
     {
        //ambil data buku dari tabel buku
        $sql = "SELECT * FROM buku";
        $buku = $this->db->query($sql);
        return $buku;
     }

     public function getIdPeminjaman($id)
     {
         return $this->db->get_where('peminjaman',['id_pinjam' => $id])->row_array();
     }

     public function getPeminjaman($where,$table)
     {
        return $this->db->get_where($table,$where);
        
     }

     function view_rakbuku()
     {
        //ambil data rak buku dari tabel rak buku
        $rak_buku = $this->db->get('rak_buku');
        return $rak_buku;
     }
     
     function product($id_pinjam)
     {
         return $this->db->get_where('peminjaman',array('id_pinjam'=>$id_pinjam));
     }

     function product2($kode_rak)
     {
        return $this->db->get_where('rak_buku',array('kode_rak'=>$kode_rak));
     }

     function delete($id_pinjam)
     {
         $this->db->where('id_pinjam',$id_pinjam);
         $this->db->delete('peminjaman');
     }

     function delete2($kode_rak)
     {
        $this->db->where('kode_rak',$kode_rak);
        $this->db->delete('rak_buku');
     }
     
     function get_all_paginate($table,$order_by,$num, $offset) {
        $this->db->order_by($order_by, "ASC");
        $query = $this->db->get($table, $num, $offset);
        return $query->result();
     }
     function get_all_paginate_book($table,$order_by,$num, $offset) {
        $this->db->order_by($order_by, "ASC")->where('jumlah >',0);
        $query = $this->db->get($table, $num, $offset);
        return $query->result();
     }
     
     function get_where_buku($id_pinjam,$id_buku)
    {
        return $this->db->where('id_pinjam',$id_pinjam)->where('id_buku',$id_buku)->where('status','belum')->get('peminjaman');
    }
    function get_where_peminjaman($id_pinjam){
        return $this->db->where('id_pinjam',$id_pinjam)->where('status','belum')->get('peminjaman');
    }

    function get_where($table,array $where)
    {
        return $this->db->where($where)->get($table);
    }

    function update($table,$where,$wherenya,array $data){
        return $this->db->where($where,$wherenya)->update($table,$data);
    }

}

