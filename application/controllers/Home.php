<?php 

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->model('Buku_model');
    }
    public function index()
    {
        if ($this->session->userdata('level') === '1' || $this->session->userdata('level') === '2' || $this->session->userdata('level') === '3' )
        {
        $this->load->view('templates/header');
        $this->load->view('home/index');
        $this->load->view('templates/footer');
        }
        else{
            echo "Silahkan masuk terlebih dahulu";
        }
    }
}