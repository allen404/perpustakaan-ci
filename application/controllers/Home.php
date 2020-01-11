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
        $this->load->model('Admin_model');
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
        $this->load->view('home/index');
        
    }

    public function user()
    {
        $this->load->model('Admin_model');
        $this->load->view('templates/header');
        $this->load->view('home/user');
        $this->load->view('templates/footer');
    }
}