
<?php 
$this->load->helper('url');
$this->load->library('session');
if($this->session->has_userdata('userSession')){
	$session =(array) $_SESSION['userSession'];
}
?>
<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">
<!-- Bootstrap core CSS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
<link href="album.css" rel="stylesheet">
</head>
<body>
<header>
<div class="collapse bg-dark" id="navbarHeader">
<div class="container">
  <div class="row">
    <div class="col-sm-8 col-md-7 py-4">
      <h4 class="text-white">About</h4>
      <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
    </div>
    <div class="col-sm-4 offset-md-1 py-4">
      <h4 class="text-white">Contact</h4>
      <ul class="list-unstyled">
        <li><a href="#" class="text-white">Follow on Twitter</a></li>
        <li><a href="#" class="text-white">Like on Facebook</a></li>
        <li><a href="#" class="text-white">Email me</a></li>
      </ul>
    </div>
  </div>
</div>
</div>
<div class="navbar navbar-dark bg-dark shadow-sm">
<div class="container d-flex justify-content-between">
  <a href="#" class="navbar-brand d-flex align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
    <strong class="text-uppercase"><?= $singleCat['name'] ?></strong>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
</div>
</header>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading text-uppercase"><?= $singleCat['name'] ?></h1>
            <p class="lead">
                I’m selfish, impatient and a little insecure. I make mistakes, I am out of control and at times hard to handle. 
                But if you can’t handle me at my worst, then you sure as hell don’t deserve me at my best.
            </p>
        </div>
    </section>

<!-- main data -->
    <div class="row">
    <?php foreach($postByCat as $postByCat){?>
        <div class="col-lg-4 mt-3 col-xs-6" >
          <div class="card">
          <img style="height:6cm" src="<?= $postByCat->image ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-uppercase"><?= $postByCat->name ?></h5>
                <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a <?php $link = $postByCat->content;
                if($link != 'none' || empty($link))
					echo 'href="'.$link.'"  target="_blank"';
                else
                	echo 'href = "#"';
                ?>"

				   class="btn btn-primary float-right">Access</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"></script>
<br>
</html>
