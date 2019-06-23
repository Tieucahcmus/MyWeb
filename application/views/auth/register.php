<?php
$this->load->helper('url');
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Express App</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	</head>
	
	<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
		<a class="navbar-brand" href="#">
			<i class="fa fa-home fa-lg" aria-hidden="true"></i>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
					   aria-haspopup="true" aria-expanded="false">
						Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li>
			</ul>
			 <form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>&nbsp;
            <a class="btn btn-sm btn-outline-secondary my-2 my-sm-0" href="<?= base_url()?>index.php/auth/loginForm">Sign up</a>
		</div>
	</nav>

	 <div class="card">
		<div class="container">
			<h4 class="">Fluid jumbotron</h4>
			<p class="">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
		</div>
	</div>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-sm-3">
				<div class="card shadow mt-3">
					<div class="card-header">
						Featured
					</div>
					<div class="card-body">
						<h5 class="card-title">Special title treatment</h5>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
               <form method="post"  id="registerForm" action="<?= base_url()?>index.php/auth/register">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="inputEmail4">User Name</label>
                        <input type="text" id="txtUsername" required name="username" class="form-control" id="inputEmail4" placeholder="User Name">
                        </div>
                        <div class="form-group col-md-12">
                        <label for="inputEmail4">Name</label>
                        <input type="text" name="name" required class="form-control" id="inputEmail4" placeholder="Name">
                        </div>
                        <div class="form-group col-md-12">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="password" required class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                        <div class="form-group col-md-12">
                        <label for="inputPassword4">Confrim Password</label>
                        <input type="password" name="confirm" required class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
			</div>
		</div>

		<footer class="pt-10 my-md-5 pt-md-5 border-top">
			<div class="row">
				<div class="col-12 col-md">
					<img class="mb-2" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="24"
						 height="24">
					<small class="d-block mb-3 text-muted">© 2017-2019</small>
				</div>
				<div class="col-6 col-md">
					<h5>Features</h5>
					<ul class="list-unstyled text-small">
						<li><a class="text-muted" href="#">Cool stuff</a></li>
						<li><a class="text-muted" href="#">Random feature</a></li>
						<li><a class="text-muted" href="#">Team feature</a></li>
						<li><a class="text-muted" href="#">Stuff for developers</a></li>
						<li><a class="text-muted" href="#">Another one</a></li>
						<li><a class="text-muted" href="#">Last time</a></li>
					</ul>
				</div>
				<div class="col-6 col-md">
					<h5>Resources</h5>
					<ul class="list-unstyled text-small">
						<li><a class="text-muted" href="#">Resource</a></li>
						<li><a class="text-muted" href="#">Resource name</a></li>
						<li><a class="text-muted" href="#">Another resource</a></li>
						<li><a class="text-muted" href="#">Final resource</a></li>
					</ul>
				</div>
				<div class="col-6 col-md">
					<h5>About</h5>
					<ul class="list-unstyled text-small">
						<li><a class="text-muted" href="#">Team</a></li>
						<li><a class="text-muted" href="#">Locations</a></li>
						<li><a class="text-muted" href="#">Privacy</a></li>
						<li><a class="text-muted" href="#">Terms</a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</body>
</html>
