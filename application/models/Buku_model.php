<?php

class Buku_model extends CI_model {
    public function getAllBuku()
    {
        return $this->db->get('buku')->result_array();
    }
    public function getBuku($limit, $start)
    {
        return $this->db->get('buku', $limit, $start)->result_array();
    }
    public function countAllBuku()
    {
        return $this->db->get('buku')->num_rows();
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function tambahDataBuku()
    {
        $data = [
            "idbuku" => $this->input->post('idbuku',true),
            "judul" => $this->input->post('judul',true),
            "penulis" => $this->input->post('penulis',true),
            "penerbit" => $this->input->post('penerbit',true)
        ];

        $this->db->insert('buku',$data);
    }

    public function hapusDataBuku($idbuku)
    {
        $this->db->delete('buku',['idbuku' => $idbuku]);
    }

    public function ubahDataBuku()
    {
        $data = [
            "idbuku" => $this->input->post('idbuku',true),
            "judul" => $this->input->post('judul',true),
            "penulis" => $this->input->post('penulis',true),
            "penerbit" => $this->input->post('penerbit',true)
        ];
        $this->db->where('idbuku', $this->input->post('idbuku'));
        $this->db->update('buku', $data);
    }
    public function getBukuById($idbuku)
    {
        return $this->db->get_where('buku', ['idbuku' => $idbuku])->row_array();
    }

    public function cariDataBuku()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('idbuku', $keyword);
        $this->db->or_like('judul', $keyword);
        $this->db->or_like('penulis', $keyword);
        $this->db->or_like('penerbit', $keyword);
        return $this->db->get('buku')->result_array();
    }

}