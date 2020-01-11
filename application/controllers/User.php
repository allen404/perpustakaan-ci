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
        $no_identitas = $data['no_identitas'];
        $sesdata = array(
          'nama' => $nama,
          'email' => $email,
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
          redirect('home/user');
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
          redirect('home');
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
            print_r($user);

   
     
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
     
    public function login_view(){
     
    $this->load->view("home/login");
     
    }
     
    function login_user(){ 
      $user_login=array(
     
      'email'=>$this->input->post('email'),
      'password'=>md5($this->input->post('password'))
     
        ); 
    //$user_login['user_email'],$user_login['user_password']
        $data['users']=$this->user_model->login_user();
        //  if($data)
          //{
              
            $this->session->set_userdata('id_user',$data['users'][0]['id_user']);
            $this->session->set_userdata('no_identitas',$data['users'][0]['no_identitas']);
            $this->session->set_userdata('nama',$data['users'][0]['nama']);
            $this->session->set_userdata('alamat',$data['users'][0]['alamat']);
            $this->session->set_userdata('email',$data['users'][0]['email']);

            echo $this->session->set_userdata('id_user'); 
            $this->load->view('home/user_profile.php',$data);
     
     
     
    }
}
     
?>