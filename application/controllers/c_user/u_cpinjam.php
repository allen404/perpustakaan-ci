<?php
    class u_cpinjam extends CI_Controller
    {
        function index()
        {
            $this->load->model('model_perpus');
            $judul = "DATA PEMINJAMAN BUKU";
            $data['judul'] = $judul;
            $data['peminjaman'] = $this->model_perpus->view_pinjam()->result();
            $this->load->view('user/u_datapinjam',$data);
        }

        function tampil()
        {
            $this->load->model('model_perpus');
            $judul = "DATA PEMINJAMAN BUKU";
            $data['judul'] = $judul;
            $data['peminjaman'] = $this->model_perpus->view_pinjam()->result();
            $this->load->view('user/u_datapinjam',$data);
        }

        function perpanjang()
        {
            $this->load->model('model_perpus');
            $data = array(
                'denda'         => '0',
                'tgl_pinjam'    =>  date("Y-m-d"),
                'tgl_kembali'   => '(Diperpanjang)',
                'status'        => 'perpanjang' );
            $id = $this->uri->segment(3);
            $this->db->where('id_pinjam',$id);
            $this->db->update('peminjaman',$data);
            $this->session->set_flashdata('success', 'Peminjaman Buku berhasil diperpanjang!');
            redirect('u_cpinjam');
        }

        function kembali()
        {
            $tgl_kembali = time();
            $tgl_awal=strtotime($this->uri->segment(4));
            $cari_hari = abs($tgl_kembali-$tgl_awal);
            $hitung_hari = floor($cari_hari/(60*60*24));
             
            if($hitung_hari >= 7){
                $telat = $hitung_hari - 7;
                $denda = 500 * $telat;
               
                
            }else{
                $telat = 0;
                $denda = 0;
            }
            $nilai = "";
            $nilai_kembali="Belum Kembali";

            $data = array(
                'denda' 		    =>  $denda,
                'tgl_kembali'	    =>  date('Y-m-d'),
                'status'		    =>  'kembali' );
            $id_pinjam = $this->uri->segment(3);
            $this->db->where('id_pinjam', $id_pinjam);
            $this->db->update('peminjaman',$data);
            
            $this->session->set_flashdata('success', 'Buku berhasil dikembalikan!');
            redirect('u_cpinjam');

        }
    }
?>