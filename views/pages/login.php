<?php
if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->rolename =='admin'){
    // var_dump($_SESSION['korisnik']);
   header('Location:admin-panel.php');
}
if(isset($_SESSION['korisnik'])&&$_SESSION['korisnik']->rolename =='user'){
    // var_dump($_SESSION['korisnik']);
     header('Location:index.php?page=blogger');
  }
?>
<section class="mb-30px">
<div class="container">
<div class="hero-banner hero-banner--sm">
<div class="hero-banner__content">
<h1>Login</h1>
<nav aria-label="breadcrumb" class="banner-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Login</li>
</ol>
</nav>
</div>
</div>
</div>
</section>
<section class="section-margin--small section-margin">
<div class="container form-back">

<div class="row d-flex justify-content-center">
<div class="col-md-5 mt-5 mb-5">
<form class="form-contact contact_form"  id="contactForm">
<div class="row">
    <div class="col-12">
    <label for="name">Email</label>

        <div class="form-group">
        <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
        <p class="text-error"></p>

        </div>
        <label for="name">Password</label>

    <div class="form-group">
    <input class="form-control" name="password" id="password" type="password" placeholder="Enter your password">
    <p class="text-error"></p>

    </div>
    </div>
</div>
<div class="form-group text-center mt-3">
<button type="button" id="login_btn" class="button button--active button-contactForm">Login</button>
<p id="message_log"></p>
</div>
</form>
</div>
</div>
</div>
<a id="backtotop"></a>
</section>