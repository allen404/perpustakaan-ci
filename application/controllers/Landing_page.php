<?php

class Landing_page extends CI_Controller {

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('landing_page/index');
        $this->load->view('templates/footer');
    }

}
