<?php
    class c_pinjam extends CI_Controller
    {

        public function __construct()
    {
        parent::__construct();
    
    }
    
        function index()
        {
 
            $this->load->model('model_perpus');
            $judul = "DATA PEMINJAMAN BUKU";
            $data['judul'] = $judul;
            $data['peminjaman'] = $this->model_perpus->view_pinjam()->result();
            $this->load->view('templates/header');
            $this->load->view('admin/data_pinjam',$data);
            $this->load->view('templates/footer');
            
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
            $this->load->model('model_perpus');
            $data['user'] = $this->model_perpus->view_user()->result();
            $this->load->view('admin/data_pinjam',$data);
        }

        function index_judul_buku()
        {
            $this->load->model('model_perpus');
            $data['buku'] = $this->model_perpus->view_buku()->result();
            $this->load->view('admin/data_pinjam',$data);
        }
        
        function input()
        {
            $this->load->view('admin/data_pinjam');
        }
        
        function input_simpan()
        {
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
            $nilai = "";
            $nilai_kembali="Belum Kembali";
            $status = "belum";
            
            $cek 	  = $this->model_perpus->get_where_peminjaman($this->input->post('no_identitas'))->num_rows();
            $cek_buku = $this->model_perpus->get_where_buku($this->input->post('no_identitas'),$this->input->post('id_buku'))->num_rows();
            if ($cek_buku>0) {
                $this->session->set_flashdata('error', 'Proses ditolak, anggota telah meminjam buku tersebut.');
                redirect($this->agent->referrer());
            }else{

            if ($cek>3) {
                $this->session->set_flashdata('error', 'Proses ditolak, anggota telah meminjam 3 buku.');
                redirect($this->agent->referrer());
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
                'status'            =>  $status);
            $this->db->insert('peminjaman',$peminjaman);
            redirect('c_pinjam');
            }
        }

        function autocomplete()
        {
            $search_data = $this->input->post('search_data');
            $result = $this->model->get_autocomplete('user','no_identitas',$search_data);
            if(!empty($result))
            {
            foreach ($result as $row):
                echo "<h5>".$row->nama."</h5>";
            endforeach;
            }
            else
            {
                echo "<li> <em> Not found ... </em> </li>";
            }
        }

        function perpanjang()
        {
            $this->load->model('model_perpus');
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
            redirect('c_pinjam');

        }

        function delete()
        {
            $this->load->model('model_perpus');
            $id_pinjam = $this->uri->segment(3);
            $this->db->where('id_pinjam', $id_pinjam);
            $this->db->delete('peminjaman');
            $this->model_perpus->delete($id_pinjam);
            redirect('c_pinjam');
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
}
?>