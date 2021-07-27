<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>The Blissful Blogger</title>
<link rel="icon" href="assets/img/hero/icon.png" type="image/png">
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/themify-icons.css">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/loadingcss.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">

</head>
<body>
<div class="loader-wrapper">
  <div class="loader"></div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>

<header class="header_area">
<div class="main_menu">
<nav class="navbar navbar-expand-lg navbar-light">
<div class="container box_1620">


<a class="navbar-brand logo_h" href="index.php">The Blissful<span>Blogger</span></a>
<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" 
data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
aria-expanded="false" aria-label="Toggle navigation">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<div class="navbar-collapse offset collapse" id="navbarSupportedContent">
<ul class="nav navbar-nav menu_nav justify-content-center">
<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
<li class="nav-item active"><a class="nav-link" href="index.php?page=posts">Posts</a></li>
<li class="nav-item active"><a class="nav-link" href="index.php?page=contact">Contact</a></li>
<li class="nav-item active"><a class="nav-link" href="index.php?page=author">Author</a></li>
</ul>
<ul class="nav navbar-nav navbar-right navbar-social">
<?php
        if(!isset($_SESSION['korisnik'])){
          echo '<li><a href="index.php?page=login"><span class="ti-user" aria-hidden="true"></span></a></li>
          <li><a href="index.php?page=register"><span class="ti-flag" aria-hidden="true"></span></a></li>';
        }else{
          echo '<li><a href="index.php?page=logout">Log-out<span class="ti-shift-right" aria-hidden="true"></span></a></li>';
        }
        if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->rolename=='user'){
          echo '<li><a href="index.php?page=blogger">User-page<span class="ti-user" aria-hidden="true"></span></a></li>';

        }
        if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->rolename=='admin'){
          echo '<li><a href="admin-panel.php">Admin-page<span class="ti-user" aria-hidden="true"></span></a></li>';

        }

?>
</ul>
</div>
</div>
</nav>
</div>
</header>