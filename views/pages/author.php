<?php 
$author = (object) [
  'title' => 'Hello there',
  'subtitle' => 'Here is a short dscription about what my current capabilities are.',
  'image' => 'author_07.jpg',
  'info' => 'Hi, my name is Djordje Taskovic. I am a beginner when it comes to web design but keep my expectations high and i am looking forward to progress even further. ',
'interest'=>'Young and passionate developer, always happy to learn new things and evolve. Intrested in 3D modeling, web design, photography, writing, drawing and learning new things. In free time I love reding a good book or comic, watch series and movies etc.'];
?>

<section class="mb-30px">
<div class="container">
<div class="hero-banner hero-banner--sm">
<div class="hero-banner__content">
<h1>Creator page</h1>
<nav aria-label="breadcrumb" class="banner-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Creator page</li>
</ol>
</div>
</div>
</div>
</section>
<section id="author" class="container">
  <div class="container">
    <div class="row">
      <div class="col-12 auth-config">
        <div class="auth-image">
          <img src="assets/img/users/<?=$author->image?>" alt="profile-image"/>
        </div>
        <div class="auth-data">
          <h1><?=$author->title?></h1>
          <p><?=$author->subtitle?></p>
        </div>
      </div>
    </div>
  </div>
         <div id="pageauthor" class="jumblock">
                 <div class="container bg-white">
                   <div class="row">
                    <div class="main_blog_details col-12">
                      <blockquote class="blockquote">
                                     <p><?=$author->info?></p>
                                     <p><?=$author->interest?></p>
                        </blockquote>
                      </div>
                      
                      <div class="col-12 p-3">
                      <form action="models/export_to_word.php" method="POST">
                      <input type="hidden" name="subtitle" value="<?=$author->subtitle?>"/>
                        <input type="hidden" name="info" value="<?=$author->info?>"/>
                        <input type="hidden" name="interest" value="<?=$author->interest?>"/>
                        <button type="submit" class="button" style="font-weight: bold;" name="abtn">Export data to Word</button>
                      </form>
                       </div>
               </div>
                        </div>
                      </div>
    <a id="backtotop"></a>
 </section>
