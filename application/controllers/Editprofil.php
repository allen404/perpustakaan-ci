<?php
    class Editprofil extends CI_Controller
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

            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('user/editprofil');
                $this->load->view('templates/footer');
            }
            else
            {
                $id_user = $_SESSION['id_user'];

                $data = [
                    "no_identitas" => $this->input->post('no_identitas',true),
                    "nama" => $this->input->post('nama', true),
                    "email" => $this->input->post('email', true),
                    "alamat" => $this->input->post('alamat', true),
                    "password" => md5($this->input->post('password'))
                ];

                $this->db->where('id_user', $id_user);
                $this->db->update('user',$data);
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('home');
            }
        }
    }