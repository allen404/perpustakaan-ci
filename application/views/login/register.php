<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Registration</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


  </head>
  <body>

<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Silahkan Registrasi</h3>
                  </div>
                  <div class="panel-body">

                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>

                      <form role="form" method="post" action="<?php echo base_url('user/register_user'); ?>">
                          <fieldset>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input class="form-control" placeholder="Masukkan nama" name="nama" type="text" autofocus>
                            </div>

                            <div class="form-group">
                            <label for="no_identitas">Nomor Identitas</label>
                                <input class="form-control" placeholder="Masukkan Nomor Identitas" name="no_identitas" type="number" value="">
                            </div>

                            <div class="form-group">
                            <label for="email">Email</label>
                                <input class="form-control" placeholder="Masukkan E-mail" name="email" type="email" autofocus>
                            </div>

                            <div class="form-group">
                            <label for="alamat">Alamat</label>
                                <input class="form-control" placeholder="Masukkan Alamat" name="alamat" type="text" value="">
                            </div>
                              <div class="form-group">
                              <label for="password">Password</label>
                                  <input class="form-control" placeholder="Masukkan Password" name="password" type="password" value="">
                              </div>

                              <input type="hidden" name="level" value="2">

                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                          </fieldset>
                      </form>
                      <center><b>You have Already registered ?</b> <br></b><a href="<?php echo base_url('login'); ?>"> Please Login</a></center><!--for centered text-->
                  </div>
              </div>
          </div>
      </div>
  </div>





</span>




  </body>
</html>