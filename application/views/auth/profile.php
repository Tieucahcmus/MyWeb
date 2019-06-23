<?php
$this->load->helper('url');
$this->load->library('session');
if($this->session->has_userdata('userSession')){
	$session =(array) $_SESSION['userSession'];
}
?>

<html lang="en"><head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.5">
	<title>Checkout example · Bootstrap</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


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
	<link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
	<div class="py-5 text-center">
		<a href="<?php echo base_url(); ?>"><img class="d-block mx-auto mb-4" src="https://ui-ex.com/images/dragon-vector-dragan-5.png" alt="" width="72" height="72"></a>
		<h2>Profile</h2>
		<p class="lead"></p>
	</div>

	<div class="row">
		<div class="col-md-12 order-md-1">
			<h4 class="mb-3">Infomation
				<button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal">
					Changes Password
				</button>
			</h4>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Changes Password</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<label>Old Pass</label>
							<input type="password" class="form-control" min="1" required>
							<br>
							<label>New Pass</label>
							<input type="password" class="form-control" min="1" required>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Save changes</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->

			<form action="<?php echo base_url()?>index.php/auth/updateProfile" method="post" >
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="firstName">User Name</label>
						<input type="text" readonly name="username" class="form-control" id="firstName" placeholder="" value="<?=$session['username']?>" required="">
						<div class="invalid-feedback">
							Valid first name is required.
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<label for="lastName">Name</label>
						<input type="text" class="form-control" name="name" id="" placeholder="" value="<?=$session['name']?>" required="">
						<div class="invalid-feedback">
							Valid last name is required.
						</div>
					</div>
				</div>
				<div class="mb-3">
					<label for="address">Address</label>
					<input type="text" name="address" value="<?=$session['address']?>" class="form-control" id="address" placeholder="" required="">
					<div class="invalid-feedback">
						Please enter your shipping address.
					</div>
				</div>
				<hr class="mb-4">
				<button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
			</form>
		</div>
	</div>		
</form>
	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1">© 2017-2019 Company Name</p>
		<ul class="list-inline">
			<li class="list-inline-item"><a href="#">Privacy</a></li>
			<li class="list-inline-item"><a href="#">Terms</a></li>
			<li class="list-inline-item"><a href="#">Support</a></li>
		</ul>
	</footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.4.1.js"><\/script>')</script>
<script src="form-validation.js"></script>
</body></html>
