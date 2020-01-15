 <?php
    class c_buku extends CI_Controller
    {
        function index()
        {
            $this->load->model('model_buku');
            $judul = "DATA BUKU";
            $data['judul'] = $judul;
            $data['buku'] = $this->model_buku->view_buku()->result();
            $this->load->view('templates/header');
            $this->load->view('buku/buku',$data);
            $this->load->view('templates/footer');
            
        }
        
        function input()   
        {
            $this->load->view('buku/input_buku');
        }
        
        function input_simpan()
        {
            $buku = array(
                'id_buku'  =>  $this->input->post('id_buku'),
                'genre_buku'    =>  $this->input->post('genre_buku'),
                'judul_buku' => $this->input->post('judul_buku'),
                'id_penerbit' => $this->input->post('id_penerbit'),
                'id_penulis' => $this->input->post('id_penulis'),
                'tahun_buku' => $this->input->post('tahun_buku'),
                'jumlah_buku' => $this->input->post('jumlah_buku'),
                'foto'          => $this->input->post('foto'));

            $this->db->insert('buku',$buku);
            redirect('c_buku');
        }
        
        function edit()
        {
            $this->load->model('model_buku');
            $id_buku = $this->uri->segment(3);
            $data['product'] = $this->model_buku->product($id_buku)->row_array();
            $this->load->view('buku/edit_buku',$data);
        }
        
        function edit_simpan()
        {
            $id = $this->input->post('id_buku');
            $buku = array(
                'id_buku'  =>  $this->input->post('id_buku'),
                'genre_buku'    =>  $this->input->post('genre_buku'),
                'judul_buku' => $this->input->post('judul_buku'),
                'id_penerbit' => $this->input->post('id_penerbit'),
                'id_penulis' => $this->input->post('id_penulis'),
                'tahun_buku' => $this->input->post('tahun_buku'),
                'jumlah_buku' => $this->input->post('jumlah_buku'),
                'foto'          => $this->input->post('foto'));

            $this->db->where('id_buku',$id);
            $this->db->update('buku',$buku);
            redirect('c_buku');
        }
        
        function delete()
        {
            $this->load->model('model_buku');
            $id_buku = $this->uri->segment(3);
            $this->db->where('id_buku', $id_buku);
            $this->db->delete('buku');
            $this->model_buku->delete($id_buku);
            redirect('c_buku');
        }

        function buku()
        {
            $data['offset'] = $this->uri->segment(3);
        }

        public function aksi_upload(){
        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
     
        $this->load->library('upload', $config);
     
        if ( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('input_buku', $error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('buku', $data);
        }
    }      
        
    }
?>