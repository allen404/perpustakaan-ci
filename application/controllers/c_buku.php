 <?php
    class c_buku extends CI_Controller
    {


        public function __construct()
                {
                    parent::__construct();
                    $this->load->model('Admin_model');
                    $this->load->library('form_validation');
                    $this->load->model('Buku_model');
                    $this->load->model('model_perpus');
                }


        function index()
        {
            $this->load->model('model_buku', 'buku');
            $data['buku'] = $this->buku->getAllBuku();
            $this->load->view('templates/header');
            $this->load->view('buku/buku',$data);
            $this->load->view('templates/footer');
            
        }
        
        public function input()   
        {

            $this->form_validation->set_rules('id_buku','id_buku','required');
            $this->form_validation->set_rules('genre_buku','genre_buku','required');
            $this->form_validation->set_rules('judul_buku','judul_buku','required');
            $this->form_validation->set_rules('id_penerbit','id_penerbit','required');
            $this->form_validation->set_rules('id_penulis','id_penulis','required');
            $this->form_validation->set_rules('tahun_buku','tahun_buku','required');
            $this->form_validation->set_rules('jumlah_buku','jumlah_buku','required');

            if($this->form_validation->run() == false)
            {
                $this->load->view('templates/header');
                $this->load->view('buku/input_buku');
                $this->load->view('templates/footer');
            }
            else
            {
                $data = [
                    'id_buku'  =>  $this->input->post('id_buku', true),
                    'genre_buku'    =>  $this->input->post('genre_buku', true),
                    'judul_buku' => $this->input->post('judul_buku', true),
                    'id_penerbit' => $this->input->post('id_penerbit', true),
                    'id_penulis' => $this->input->post('id_penulis', true),
                    'tahun_buku' => $this->input->post('tahun_buku', true),
                    'jumlah_buku' => $this->input->post('jumlah_buku', true),
                    'foto'          => $this->input->post('foto', true)
                    ];

                    $this->db->insert('buku',$data);
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    redirect('c_buku');
            }

           
        }

        function edit($id)
        {
            $this->load->model('model_buku' ,'buku');
            $data['buku'] = $this->buku->getBukuById($id);

            $this->form_validation->set_rules('lokasi','lokasi','required');
            $this->form_validation->set_rules('genre_buku','genre_buku','required');
            $this->form_validation->set_rules('judul_buku','judul_buku','required');
            $this->form_validation->set_rules('id_penerbit','id_penerbit','required');
            $this->form_validation->set_rules('id_penulis','id_penulis','required');
            $this->form_validation->set_rules('tahun_buku','tahun_buku','required');
            $this->form_validation->set_rules('jumlah_buku','jumlah_buku','required');

            if($this->form_validation->run() == false)
            {
                $this->load->view('templates/header');
                $this->load->view('buku/edit_buku',$data);
                $this->load->view('templates/footer');
            }

            else
            {
                $data = [
                    'id_buku'  =>  $this->input->post('id_buku', true),
                    'genre_buku'    =>  $this->input->post('genre_buku', true),
                    'judul_buku' => $this->input->post('judul_buku', true),
                    'id_penerbit' => $this->input->post('id_penerbit', true),
                    'id_penulis' => $this->input->post('id_penulis', true),
                    'tahun_buku' => $this->input->post('tahun_buku', true),
                    'jumlah_buku' => $this->input->post('jumlah_buku', true),
                    'foto'          => $this->input->post('foto', true)
                    ];
                    $this->db->where('buku',$this->input->post('id_buku'));
                    $this->db->update('buku', $data);
                    $this->session->set_flashdata('flash', 'Ditambahkan');
                    redirect('c_buku');
            }

            
        }
        
        function delete($id)
        {
            $this->db->delete('buku', ['id_buku' => $id]);
            $this->session->set_flashdata('flash', 'Dihapus');
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