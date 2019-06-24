<?php
 $this->load->helper('url');
 $this->load->library('session');
 if($this->session->has_userdata('userSession')){
  $session =(array)$_SESSION['userSession'];
 }
?>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Blog Template · Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
  
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
     
      </div>
      <div class="col-4 text-center">
		  <a href="<?php echo base_url(); ?>"><img class="d-block mx-auto mb-4" src="https://ui-ex.com/images/dragon-vector-dragan-5.png" alt="" width="72" height="72"></a>
		  <a class="blog-header-logo text-dark" href="<?= base_url()?>"><h4><i>Tiểu Ca Pages</i></h4></a>
	  </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
        </a>


        
        <form id="frmLogout" action="<?= base_url()?>index.php/auth/logout" method="POST"></form>
        <?php 
          if(!empty($session['username'])){ 
            ?>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Hi, <strong><?=$session['name']?></strong>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= base_url()?>index.php/auth/profile">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Profile
                  </a>
                  <?php if($session['type'] == 1){ ?>
                    <a class="dropdown-item" href="<?= base_url()?>index.php/manager">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Manage
                    </a>
                  <?php } ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript: $('#frmLogout').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Sign Out
                  </a>
                </div>
            <?php
          }else{
         ?>
            <a class="btn btn-sm btn-outline-secondary" href="<?= base_url()?>index.php/auth/loginForm">Sign up</a>
          <?php } ?>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
    <?php 
    foreach ($category as $category){?>
      <u><h6 class='font-italic text-uppercase'><a title="<?= $category['name'] ?>" class="p-2 text-muted" href="<?= base_url()?>index.php/category/viewbycategory?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></h6></u>
      <?php } ?>
    </nav>
  </div>

  <!-- <div class="jumbotron p-4 p-md-5 text-white rounded bg-primary">
    <div class="col-md-12 px-0">
      <h1 class="display-5 font-italic">The quick brown fox jumps over the lazy dog.</h1>
      <i class="lead mb-0"><a href="#" class="text-white float-right">Current Notes, February 10, 1885</a></i>
    </div>
  </div> -->
