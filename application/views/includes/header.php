<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap 4 CSS -->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <!-- Iconic icons -->
    <link href="<?php echo base_url();?>assets/css/open-iconic-bootstrap.css" rel="stylesheet">

    <!-- Custom css -->
    <link href="<?php echo base_url();?>assets/css/header.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/global.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/admin.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" media="print" href="<?php echo base_url();?>assets/css/print.css">

    <link rel="icon" href="<?php echo base_url();?>assets/img/favicon.ico">

    <title>Lourdes College Multipurpose Cooperative</title>

  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
             <a class="navbar-brand" href="#"> <img src="<?php echo base_url();?>assets/img/logo.svg" width="30" height="30" class="d-inline-block align-top" alt=""> Lourdes College Cooperative</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <?php if($this->session->userdata('logged_in')): ?>

            <?php if($this->session->userdata('user_type') == 1): ?>
                <ul class="navbar-nav justify-content-right">
                    <li class="nav-item">
                      <div class="dropdown">
                          <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="oi oi-person"> </span> <?php echo $this->session->userdata('name');?> <span class="oi oi-caret-bottom"> </span>
                          </a>
            
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <!-- <button class="dropdown-item"> <span class="oi oi-person"></span> Account</button> 
                                <div class="dropdown-divider"></div>  -->
                               <a class="dropdown-item" href="<?php echo base_url();?>logout"> <span class="oi oi-account-logout"></span> Logout</a>   
                          </div>
                    </div>
                    </li>
                </ul>
            <?php else: ?>

                <ul class="navbar-nav">

                  <li class="nav-item">
                     <div class="dropdown">
                          <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="oi oi-person"> </span> <?php echo $this->session->userdata('name');?> <span class="oi oi-caret-bottom"> </span>
                          </a>
            
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                               <!-- <button class="dropdown-item"> <span class="oi oi-person"></span> Account</button> 
                                <div class="dropdown-divider"></div>  -->
                               <a class="dropdown-item" href="<?php echo base_url();?>logout"> <span class="oi oi-account-logout"></span> Logout</a>   
                          </div>
                    </div>
                  </li>
                </ul>

            <?php endif; ?>
         
        <?php else: ?>

        <ul class="navbar-nav justify-content-right">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>login"><span class="oi oi-account-login"></span> Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>register"><span class="oi oi-pencil"></span> Register</a>
            </li>
          </ul>
        <?php endif; ?>
       
      </div>
        </div>
     
    </nav>

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.slim.min.js" ></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/spin.min.js"></script>

    <!-- For datatable -->
    
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

  </body>
</html>