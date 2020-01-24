<?php
    class C_pinjam extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

        }

        function index()
        {
            if ($this->session->userdata('level') === '1')
            {

            $this->load->model('model_perpus');
            $judul = "DATA PEMINJAMAN BUKU";
            $data['judul'] = $judul;
            $data['peminjaman'] = $this->model_perpus->view_pinjam()->result();
            $this->load->view('templates/header');
            $this->load->view('admin/data_pinjam',$data);
            $this->load->view('templates/footer');
            }
            else
            {
                echo "anda tidak boleh mengakses halaman ini";
            }

        }
        function index_user()
        {
            $this->load->model('model_perpus');
            $judul = "DATA PEMINJAMAN BUKU";
            $data['judul'] = $judul;
            $data['peminjaman'] = $this->model_perpus->view_pinjam_user()->result();
            $this->load->view('templates/header');
            $this->load->view('user/u_datapinjam',$data);
            $this->load->view('templates/footer');
        }
        function index_nama_user()
        {
            if ($this->session->userdata('level') === '1')
            {
            $this->load->model('model_perpus');
            $data['user'] = $this->model_perpus->view_user()->result();
            $this->load->view('admin/data_pinjam',$data);
            }
            else
            {
                echo "Anda tidak boleh mengakses halamn ini";
            }
        }
        function index_judul_buku()
        {
            if ($this->session->userdata('level') === '1')
            {
            $this->load->model('model_perpus');
            $data['buku'] = $this->model_perpus->view_buku()->result();
            $this->load->view('admin/data_pinjam',$data);
            }
            else
            {
                echo "Anda tidak boleh mengakses halamn ini";
            }
        }

        function input()
        {
            if ($this->session->userdata('level') === '1')
            {
                $this->load->view('admin/data_pinjam');
            }
            else
            {
                echo "Anda tidak boleh mengakses halamn ini";
            }
        }

        function input_simpan()
        {

           if ($this->session->userdata('level') === '1'){

                    $this->load->model('model_perpus');
                    $tgl_kembali = date('d-m-Y');
                    $cari_hari = abs(strtotime($this->input->post('tgl_pinjam')) - strtotime($tgl_kembali));
                    $hitung_hari = floor($cari_hari/(60*60*24));

                    if($hitung_hari > 7){
                        $telat = $hitung_hari - 7;
                        $denda = 500 * $telat;
                    }else{
                        $telat = 0;
                        $denda = 0;
                    }

                    $nilai = null;
                    $nilai_kembali="Belum Kembali";
                    $status = "belum";

                    $cek 	  = $this->model_perpus->get_where_peminjaman($this->input->post('no_identitas'))->num_rows();
                    $cek_buku = $this->model_perpus->get_where_buku($this->input->post('no_identitas'),$this->input->post('id_buku'))->num_rows();
                    if ($cek_buku > '0' ) {
                        $this->session->set_flashdata('msg', 'Proses ditolak, anggota telah meminjam buku tersebut.');
                        $this->session->keep_flashdata('msg');
                        redirect('c_pinjam','refresh');
                    }
                        else
                        {
                        $peminjaman = array(
                            'id_pinjam'         =>  $nilai,
                            'no_identitas'      =>  $this->input->post('no_identitas'),
                            'id_buku'           =>  $this->input->post('id_buku'),
                            'tgl_pinjam'        =>  $this->input->post('tgl_pinjam'),
                            'tgl_kembali'       =>  $nilai_kembali,
                            'lama_pinjam'       =>  $hitung_hari,
                            'denda'             =>  '0',
                            'status'            => '');
                        $this->db->insert('peminjaman',$peminjaman);
                        redirect('c_pinjam');
                        }
           }
          else
          {
            echo "Anda tidak boleh mengakses halaman ini";
          }
        }


        function perpanjang()
        {
            if ($this->session->userdata('level') === '1')
            {
                    $this->load->model('model_perpus');
                    $this->load->model('model_perpus');
                    $tgl_kembali = date('d-m-Y');
                    $cari_hari = abs(strtotime($this->input->post('tgl_pinjam')) - strtotime($tgl_kembali));
                    $hitung_hari = floor($cari_hari/(60*60*24));

                    if($hitung_hari > 7){
                        $telat = $hitung_hari - 7;
                        $denda = 500 * $telat;
                    }else{
                        $telat = 0;
                        $denda = 0;
                    }
                    $data = array(
                        'denda'         => '0',
                        'tgl_pinjam'    =>  date("Y-m-d"),
                        'tgl_kembali'   => '(Diperpanjang)' );
                    $id = $this->uri->segment(3);
                    $this->db->where('id_pinjam',$id);
                    $this->db->update('peminjaman',$data);
                    $this->session->set_flashdata('success', 'Peminjaman Buku berhasil diperpanjang!');
                    redirect('c_pinjam');
            }
            else
            {
                echo "Anda tidak boleh mengakses halamn ini";
            }
        }

        function kembali()
        {
            if ($this->session->userdata('level') === '1')
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
                        'lama_pinjam'       =>  $hitung_hari,
                        'status'		    =>  'kembali' );
                    $id_pinjam = $this->uri->segment(3);
                    $this->db->where('id_pinjam', $id_pinjam);
                    $this->db->update('peminjaman',$data);

                    $this->session->set_flashdata('success', 'Buku berhasil dikembalikan!');
                    redirect('c_pinjam');
            }
            else
            {
                echo "Anda tidak boleh mengakses halaman ini";
            }
        }

        function delete()
        {

            if ($this->session->userdata('level') === '1')
            {
                    $this->load->model('model_perpus');
                    $id_pinjam = $this->uri->segment(3);
                    $this->db->where('id_pinjam', $id_pinjam);
                    $this->db->delete('peminjaman');
                    $this->model_perpus->delete($id_pinjam);
                    redirect('c_pinjam');
            }
            else
            {
                echo "Anda tidak boleh mengakses halaman ini";
            }
        }

        function peminjaman()
        {
            $data['offset'] = $this->uri->segment(3);
        }
        function get_where_peminjaman($id_pinjam)
        {
        return $this->db->where('id_pinjam',$id_pinjam)->where('status','belum')->get('peminjaman');
        }
    }

?>