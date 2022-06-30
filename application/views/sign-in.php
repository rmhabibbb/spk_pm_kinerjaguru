
<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>SMP Islam Al-Azhar 33 Palembang</title>
  <!-- Favicon -->
  <link rel="icon" href="<?=base_url()?>assets/img/logo.jpg" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/argon/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?=base_url()?>assets/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/argon/css/argon.css?v=1.1.0" type="text/css">
</head>

<body class="" style="background-color : #007cc2">
 
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
 
    <!-- Page content -->
    <div class="container pt-9">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-white border-0 mb-0">
            <center>
              <img src="<?=base_url()?>assets/img/logo.jpg" style="width: 150px" class="mt-3">
            </center>
            <div class="card-body px-lg-5 ">
              <div class="text-center text-muted mb-4"> 

                <?= $this->session->flashdata('msg') ?>
              </div>
              <form role="form" action="<?=base_url('login/cek')?>" method="POST">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" placeholder="NIP" type="text" required name="nip"  value="<?php
                                if(isset($_COOKIE['nip_temp'])) {echo $_COOKIE['nip_temp'];} 
                            ?>"  
                            <?php if(empty($_COOKIE['nip_temp'])) {echo 'autofocus';}?>
                            >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" required name="password">
                  </div>
                </div> 
                <div class="text-center">
                  <button type="submit" class="btn  my-4" style="background-color: #007cc2; color : white">Login</button>
                </div>
              </form>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
 
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?=base_url()?>assets/argon/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/argon/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?=base_url()?>assets/argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?=base_url()?>assets/argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?=base_url()?>assets/argon/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?=base_url()?>assets/argon/js/demo.min.js"></script>
</body>

</html>