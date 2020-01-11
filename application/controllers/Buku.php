<?php

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('level') === '1' || $this->session->userdata('level') === '2' || $this->session->userdata('level') === '3' )
        {
        $this->load->model('Buku_model', 'buku');


        $this->load->library('pagination');

        $config['base_url']='http://localhost/perpustakaan-ci/buku/index';
        $config['total_rows']= $this->buku->countAllBuku();
        $config['per_page'] = 12;

        $config['full_tag_open']= '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']= '</ul></nav>';

        $config['first_link']= 'First';
        $config['first_tag_open']= '<li class="page-item">';
        $config['first_tag_close']= '</li>';

        $config['last_link']= 'Last';
        $config['last_tag_open']= '<li class="page-item">';
        $config['last_tag_close']= '</li>';

        $config['next_link']= '&raquo';
        $config['next_tag_open']= '<li class="page-item">';
        $config['next_tag_close']= '</li>';

        $config['prev_link']= '&laquo';
        $config['prev_tag_open']= '<li class="page-item">';
        $config['prev_tag_close']= '</li>';

        $config['cur_tag_open']= '<li class="page-item active"><a class="page-link" href="#">' ;
        $config['cur_tag_close']= '</a></li>';

        
        $config['num_tag_open']= '<li class="page-item">';
        $config['num_tag_close']= '</li>';

        $config['attributes'] = array('class' => 'page-link');
        //inisialisasi
        $this->pagination->initialize($config);


        $data['start']= $this->uri->segment(3);
        $data['buku'] = $this->buku->getBuku($config['per_page'],$data['start']);
        $data['judul'] = 'Daftar Buku';
        if( $this->input->post('keyword') ) {
            $data['buku'] = $this->Buku_model->cariDataBuku();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
        }
        else
        {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Buku';

        $this->form_validation->set_rules('idbuku', 'ID', 'required|numeric');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('buku/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Buku_model->tambahDataBuku();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('buku');
        }
    }

    public function hapus($idbuku)
    {
        $this->Buku_model->hapusDataBuku($idbuku);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('buku');
    }

    public function detail($idbuku)
    {
        $data['judul'] = 'Detail Data Buku';
        $data['buku'] = $this->Buku_model->getBukuById($idbuku);
        $this->load->view('templates/header', $data);
        $this->load->view('buku/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Buku';
        $data['buku'] = $this->Buku_model->getBukuById($id);
      

        $this->form_validation->set_rules('idbuku', 'ID', 'required|numeric');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('buku/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Buku_model->ubahDataBuku();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('buku');
        }
    }

}
