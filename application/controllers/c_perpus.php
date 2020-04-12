<?php
    class C_perpus extends CI_Controller
    {
        function index()
        {
            $this->load->model('model_perpus');
            $judul = "DATA PEMINJAMAN BUKU";
            $data['judul'] = $judul;
            $data['peminjaman'] = $this->model_perpus->view_pinjam()->result();
            $this->load->view('data_pinjam',$data);
        }
        
        function input()
        {
            $this->load->view('v_pinjam');
        }
        
        function input_simpan()
        {
            //$tgl_kembali = $this->input->post('tgl_kembali');
           // if(tgl_kembali!=="0000-00-00")
   //             {echo tgl_kembali;}
    //        else
    //            {echo "Belum Kembali";}

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
            
            $peminjaman = array(
                'id_pinjam'            =>  $nilai,
                'no_identitas'		   =>  $this->input->post('no_identitas'),
                'id_buku'				=>  $this->input->post('id_buku'),
				'tgl_pinjam'            =>  $this->input->post('tgl_pinjam'),
                'tgl_kembali'   =>  $nilai_kembali,
                'lama_pinjam'   =>  $hitung_hari,
				'denda'            =>  $denda,
                'status'   =>  $this->input->post('status'));
            $this->db->insert('peminjaman',$peminjaman);
            redirect('c_perpus');
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
                'tgl_pinjam'    =>  date("Y-m-d") );
            $id = $this->uri->segment(3);
            $this->db->where('id_pinjam',$id);
            $this->db->update("peminjaman",$data);
            $this->session->set_flashdata('success', 'Peminjaman Buku berhasil diperpanjang!');
            redirect('c_perpus');
        }

        function kembali($id)
        {
            
            $this->load->model('model_perpus');
            $this->model_perpus->getIdPeminjaman($id);
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
            $nilai_kembali=$tgl_kembali;
            
            $data = array(
                'denda'         => $denda,
                'tgl_kembali'   => $tgl_kembali,
                'status'        => 'kembali' 
                    );
            
            $this->db->where('id_pinjam',$id);
            $this->db->update('peminjaman', $data);
            $this->session->set_flashdata('success', 'Buku berhasil dikembalikan!');
            redirect('c_perpus');
        }

        function delete()
        {
            $this->load->model('model_perpus');
            $id_pinjam = $this->uri->segment(3);
            $this->db->where('id_pinjam', $id_pinjam);
            $this->db->delete('peminjaman');
            $this->model_perpus->delete($id_pinjam);
            redirect('c_perpus');
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
