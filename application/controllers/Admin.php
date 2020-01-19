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
            redirect('admin/list_anggota');
        }
    }

    public function hapus($id)
    {
        $this->Admin_model->hapusDataUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/list_anggota');
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
        $this->load->model('Admin_model');

        $data['user'] = $this->Admin_model->getUserById($id); 
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('no_identitas', 'Nomor_identitas', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header');
            $this->load->view('admin/ubah_anggota', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->Admin_model->ubahDataUser();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/list_anggota');
        }
  
       
        
 
    }


    //Fungsi Penerbit

    function penerbit()
    {
        $this->load->model('model_penerbit','penerbit');
        $judul = "Data Penerbit";
        $data['judul'] = $judul;
        $data['penerbit'] = $this->penerbit->getAllPenerbit();
        $this->load->view('templates/header');
        $this->load->view('admin/penerbit',$data);
        $this->load->view('templates/footer');
    }

    function inputPenerbit()
    {
        $this->form_validation->set_rules('id_penerbit','id_penerbit','required');
        $this->form_validation->set_rules('nama_penerbit','nama_penerbit','required');
        $this->form_validation->set_rules('alamat_penerbit','alamat_penerbit','required');
        $this->form_validation->set_rules('no_telp','no_telp','required|numeric');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header');
            $this->load->view('admin/input_penerbit');
            $this->load->view('templates/footer');
        }
        else
        {
            $data = [
            'id_penerbit'  =>  $this->input->post('id_penerbit',true),
            'nama_penerbit'  =>  $this->input->post('nama_penerbit',true),
            'alamat_penerbit'    =>  $this->input->post('alamat_penerbit',true),
            'no_telp'    =>  $this->input->post('no_telp',true)
            ];
            $this->db->insert('penerbit',$data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/penerbit');
        }
    }

    function deletePenerbit($id)
    {
        $this->db->delete('penerbit', ['id_penerbit' => $id]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/penerbit');
    }

    function editPenerbit($id)
    {
        $this->load->model('model_penerbit');
        $data['penerbit'] = $this->model_penerbit->getPenerbitById($id);

        $this->form_validation->set_rules('id_penerbit','id_penerbit','required');
        $this->form_validation->set_rules('nama_penerbit','nama_penerbit','required');
        $this->form_validation->set_rules('alamat_penerbit','alamat_penerbit','required');
        $this->form_validation->set_rules('no_telp','no_telp','required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('admin/edit_penerbit',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->model_penerbit->updateDataPenerbit();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/penerbit');
        }
    }

    //Fungsi Rak Buku

    public function rakBuku()
    {
        $this->load->model('model_rakbuku', 'rak_buku');
        $data['rak_buku'] = $this->rak_buku->getAllRak();
        $this->load->view('templates/header');
        $this->load->view('admin/rak_buku',$data);
        $this->load->view('templates/footer');
    }

    public function inputrakBuku()
    {
        $this->form_validation->set_rules('kode_rak','kode_rak','required');
        $this->form_validation->set_rules('lokasi','lokasi','required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header');
            $this->load->view('admin/input_rakBuku');
            $this->load->view('templates/footer');
        }
        else
        {
            $data = [
            'kode_rak'  =>  $this->input->post('kode_rak',true),
            'lokasi'  =>  $this->input->post('lokasi',true),
            ];
            $this->db->insert('kode_rak',$data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/rakBuku');
        }

    }

    function editRakBuku($id)
    {
        $this->load->model('model_rakbuku','rak_buku');
        $data['rak_buku'] = $this->rak_buku->getRakById($id);

        $this->form_validation->set_rules('kode_rak','kode_rak','required');
        $this->form_validation->set_rules('lokasi','lokasi','required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('admin/edit_rakbuku',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $data = [
                'kode_rak'  =>  $this->input->post('kode_rak',true),
                'lokasi'  =>  $this->input->post('lokasi',true),
                ];
                $this->db->where('rak_buku',$this->input->post('kode_rak'));
                $this->db->update('rak_buku', $data);
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('admin/rakBuku');
        }
    
    }

    public function hapusRakBuku($id)
    {
        $this->db->delete('rak_buku', ['kode_rak' => $id]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/rakBuku');
    }

    //Fungsi Reg Buku

    public function regBuku()
    {
            $this->load->model('model_regbuku', 'reg_buku');
            $judul = "DATA REGISTRASI BUKU";
            $data['judul'] = $judul;
            $data['reg_buku'] = $this->reg_buku->getAllRegBuku();
            $this->load->view('templates/header');
            $this->load->view('buku/reg_buku',$data);
            $this->load->view('templates/footer');
    }

    public function tambahRegBuku()
    {
        $this->form_validation->set_rules('no_reg','no_reg','required');
        $this->form_validation->set_rules('id_buku','id_buku','required');
        $this->form_validation->set_rules('kode_rak','kode_rak','required');
        $this->form_validation->set_rules('tgl_registrasi','tgl_registrasi','required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header');
            $this->load->view('buku/input_regbuku');
            $this->load->view('templates/footer');
        }

        else
        {
            $data = [
                'no_reg'  =>  $this->input->post('no_reg'),
                'id_buku'    =>  $this->input->post('id_buku'),
                'kode_rak' => $this->input->post('kode_rak'),
                'tgl_registrasi' => $this->input->post('tgl_registrasi')
            ];

            $this->db->insert('reg_buku',$data);
            redirect('admin/regBuku');   
        }
    }

    public function editRegBuku($id)
    {  
        $data['reg_buku'] = $this->reg_buku->getRekBukuById($id);

        $this->form_validation->set_rules('no_reg','no_reg','required');
        $this->form_validation->set_rules('id_buku','id_buku','required');
        $this->form_validation->set_rules('kode_rak','kode_rak','required');
        $this->form_validation->set_rules('tgl_registrasi','tgl_registrasi','required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header');
            $this->load->view('buku/input_regbuku');
            $this->load->view('templates/footer');
        }

        else
        {
            $data = [
                'no_reg'  =>  $this->input->post('no_reg'),
                'id_buku'    =>  $this->input->post('id_buku'),
                'kode_rak' => $this->input->post('kode_rak'),
                'tgl_registrasi' => $this->input->post('tgl_registrasi')
            ];
            $this->db->where('reg_buku',$this->input->post('no_reg'));
            $this->db->update('reg_buku', $data);
            redirect('admin/regBuku');   
        }

    }
    public function deleteRegBuku($id)
    {
        $this->db->delete('reg_buku', ['no_reg' => $id]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/regBuku');
    }

    //Fungsi Penulis

    public function penulis()
    {
            $this->load->model('model_penulis','penulis');
            $judul = "DATA PENULIS";
            $data['judul'] = $judul;
            $data['penulis'] = $this->penulis->getAllPenulis();
            $this->load->view('templates/header');
            $this->load->view('admin/penulis',$data);
            $this->load->view('templates/footer');
    }

    public function tambahPenulis()
    {
        $this->load->model('model_penulis', 'penulis');
        $this->form_validation->set_rules('id_penulis','id_penulis','required');
        $this->form_validation->set_rules('nama_penulis','nama_penulis','required');
        $this->form_validation->set_rules('alamat_penulis','alamat_penulis','required');
        $this->form_validation->set_rules('no_telp','no_telp','required|numeric');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header');
            $this->load->view('admin/input_penulis');
            $this->load->view('templates/footer');
        }

        else
        {
            $data = [
                'id_penulis'  =>  $this->input->post('id_penulis'),
                'nama_penulis'    =>  $this->input->post('nama_penulis'),
                'alamat_penulis' => $this->input->post('alamat_penulis'),
                'no_telp' => $this->input->post('no_telp')
            ];
            $this->db->insert('penulis',$data);
            redirect('admin/penulis');

            
        }
    }

    public function editPenulis($id)
    {
        $this->load->model('model_penulis', 'penulis');
        $data['penulis'] = $this->penulis->getPenulisById($id);

        $this->form_validation->set_rules('id_penulis','id_penulis','required');
        $this->form_validation->set_rules('nama_penulis','nama_penulis','required');
        $this->form_validation->set_rules('alamat_penulis','alamat_penulis','required');
        $this->form_validation->set_rules('no_telp','no_telp','required|numeric');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header');
            $this->load->view('admin/edit_penulis',$data);
            $this->load->view('templates/footer');
        }

        else
        {
            $data = [
                'id_penulis'  =>  $this->input->post('id_penulis'),
                'nama_penulis'    =>  $this->input->post('nama_penulis'),
                'alamat_penulis' => $this->input->post('alamat_penulis'),
                'no_telp' => $this->input->post('no_telp')
            ];
            $this->db->where('id_penulis',$this->input->post('id_penulis'));
            $this->db->update('penulis', $data);
            redirect('admin/penulis');   
        }
            
    }

    public function hapusPenulis($id)
    {
        $this->db->delete('penulis', ['id_penulis' => $id]);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/penulis');
    }
    
    
}
