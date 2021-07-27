<?php 
$author = (object) [
  'title' => 'Hello there',
  'subtitle' => 'Here is something about me.',
  'image' => 'author_07.jpg',
  'info' => 'Hi, my name is Djordje Taskovic. I am a beginner when it comes to web design but keep my expectations high and i am looking forward to progress even further. ',
'interest'=>'Young and passionate developer, always happy to learn new things and evolve. Intrested in 3D modeling, web design, photography, writing, drawing and learning new things. In free time I love reding a good book or comic, watch series and movies etc.'];
?>
<section class="mb-30px">
<div class="container">
<div class="hero-banner hero-banner--sm">
<div class="hero-banner__content">
<img  src="assets/img/users/<?=$author->image?>" alt="profile-image"/>
<h1><?=$author->title?></h1>
<p><?=$author->subtitle?></p>
<nav aria-label="breadcrumb" class="banner-breadcrumb">
</nav>
</div>
</div>
</div>
</section>
<section id="author" class="container">
         <div id="pageauthor" class="jumblock">
                 <div class="container bg-white">
                   <div class="row text-center">
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
                        <button type="submit" class="btn btn-warning" name="abtn">Export data to Word</button>
                      </form>
                       </div>
               </div>
                        </div>
                      </div>
    <a id="backtotop"></a>
 </section>
