<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->model('Buku_model');
        $this->load->model('model_perpus');
    }

    public function index()
    {
        if ($this->session->userdata('level') === '1')
        {
        $this->load->model('Admin_model');
        $this->load->view('templates/header');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
        }
        else
        {
            echo "Anda tidak boleh mengakses halaman ini";
        }
    }



    public function list_anggota()
    {
        $this->load->model('Admin_model', 'user');


        $this->load->library('pagination');

        $config['base_url']='http://localhost/perpustakaan-ci/admin/list_anggota';
        $config['total_rows']= $this->user->countAllUser();
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
        $data['user'] = $this->user->getUser($config['per_page'],$data['start']);
        $data['judul'] = 'Daftar User';
        if( $this->input->post('keyword') ) {
            $data['user'] = $this->Admin_model->cariDataUser();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/list_anggota', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_anggota()
    {
        $data['judul'] = 'Form Tambah Data User';

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_identitas', 'Nomor_identitas', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/tambah_anggota');
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->tambahDataUser();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin');
        }
    }

    public function hapus($id)
    {
        $this->Admin_model->hapusDataUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data User';
        $data['user'] = $this->Admin_model->getUserById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data User';
        $data['user'] = $this->Admin_model->getUserById($id);
       
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_identitas', 'nomor_identitas', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->ubahDataUser();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin');
        }
    }

}
