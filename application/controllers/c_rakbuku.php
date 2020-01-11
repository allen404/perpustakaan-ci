<?php
    class c_rakbuku extends CI_Controller
    {
        function index()
        {
            $this->load->model('model_perpus');
            $judul = "DATA RAK BUKU";
            $data['judul'] = $judul;
            $data['rak_buku'] = $this->model_perpus->view_rakbuku()->result();
            $this->load->view('admin/rak_buku',$data);
        }
        
        function input()
        {
            $this->load->view('admin/input_rakbuku');
        }
        
        function input_simpan()
        {
            $rak_buku = array(
                'kode_rak'  =>  $this->input->post('kode_rak'),
                'lokasi'    =>  $this->input->post('lokasi'));
            $this->db->insert('rak_buku',$rak_buku);
            redirect('c_rakbuku');
        }
        
        function edit()
        {
            $this->load->model('model_perpus');
            $kode_rak = $this->uri->segment(3);
            $data['product2'] = $this->model_perpus->product2($kode_rak)->row_array();
            $this->load->view('admin/edit_rakbuku',$data);
        }
        
        function edit_simpan()
        {
            $id = $this->input->post('kode_rak');
            $rak_buku = array(
                'kode_rak'  =>  $this->input->post('kode_rak'),
                'lokasi'    =>  $this->input->post('lokasi'));
            $this->db->where('kode_rak',$id);
            $this->db->update('rak_buku',$rak_buku);
            redirect('c_rakbuku');
        }
        
        function delete()
        {
            $this->load->model('model_perpus');
            $kode_rak = $this->uri->segment(3);
            $this->db->where('kode_rak', $kode_rak);
            $this->db->delete('rak_buku');
            $this->model_perpus->delete2($kode_rak);
            redirect('c_rakbuku');
        }

        function rak_buku()
        {
            $data['offset'] = $this->uri->segment(3);
        }
        
    }
?>