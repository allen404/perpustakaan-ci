<?php

class User extends CI_Controller {

    public function __construct(){

      parent::__construct();
      $this->load->model('user_model');
    }

    public function index()
    {
      $this->load->view('login');
    }

    function auth()
    {
      $email = $this->input->post('email',TRUE);
      $password = md5($this->input->post('password',TRUE));
      $validate = $this->user_model->validate($email,$password);
      if($validate->num_rows() > 0){
        $data = $validate->row_array();
        $nama = $data['nama'];
        $email = $data['email'];
        $level = $data['level'];
        $id_user = $data['id_user'];
        $alamat = $data['alamat'];
        $no_identitas = $data['no_identitas'];
        $sesdata = array(
          'nama' => $nama,
          'email' => $email,
          'id_user' => $id_user,
          'alamat' => $alamat,
          'level' => $level,
          'no_identitas' => $no_identitas,
          'logged_in' => TRUE
        );

        $this->session->set_userdata($sesdata);

        if($level === '1')
        {
          redirect('admin');
        }

        elseif($level === '2')
        {
          redirect('home');
        }

      }
      else{
        echo $this->session->set_flashdata('msg','Password atau email anda salah');
        redirect('login/index');

      }
    }

    function auth_guest()
    {
      $sesdata = array(
        'nama' => "tamu",
        'email' => "tamu",
        'level' => '3',
        'no_identitas' => "tamu",
        'logged_in' => TRUE
      );

      $this->session->set_userdata($sesdata);
      redirect('home/index');

    }
    function logout()
        {
          $this->session->sess_destroy();
          redirect('landing_page');
        }

    public function register_user(){

        $user=array(
          'nama'=>$this->input->post('nama'),
          'no_identitas' => $this->input->post('no_identitas'),
          'email'=>$this->input->post('email'),
          'alamat'=>$this->input->post('alamat'),
          'password'=>md5($this->input->post('password')),
          'level'=>$this->input->post('level')
            );
    $email_check=$this->user_model->email_check($user['email']);
    if($email_check){
      $this->user_model->register_user($user);
      $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
      redirect('login');
    }
    else{

      $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
      redirect('login');
    }
    }
    //Fungsi Profil User
}
?>