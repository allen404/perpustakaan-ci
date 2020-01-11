<?php 

class Login extends CI_Controller {
    public function index()
    {
        $this->load->view('login/index');
    }
    public function register()
    {
        $this->load->view('login/register');
    }

    public function testoo()
    {
        $this->load->view('login/test_login');
    }
}