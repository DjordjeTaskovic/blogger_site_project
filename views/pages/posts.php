<section class="mb-30px">
<div class="container">
<div class="hero-banner hero-banner--sm">
<div class="hero-banner__content">
<h1>Our Posts</h1>
<nav aria-label="breadcrumb" class="banner-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Posts</li>
</ol>
</nav>
</div>
</div>
</div>
</section>


<section class="blog-post-area section-margin">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="row">
    <?php 
    include 'config/connection.php';
    include 'models/functions.php';
    if (isset($_GET['perPage'])) {
        $perPage = $_GET['perPage'];
    }else{
        $perPage = 2;
    }
    if (isset($_GET['pagelist'])) {
        $pagelist = $_GET['pagelist'];
    }else{
        $pagelist = 1;
    }
    $offset = ((int)$pagelist - 1) * (int)$perPage;
    $perPage = (int)$perPage;
    $posts = getPostsbyPagination($perPage,$offset);
    $total = count(getAllFromTable('posts'));
    $pagesCount = round($total/$perPage);

    foreach ($posts as $p):
        $pdate = explode(" ",$p->date);
        $newDate = date("M jS, Y", strtotime($pdate[0]));
    ?>
    <div class="col-lg-6">
    <div class="single-recent-blog-post card-view">
    <div class="thumb">
    <img class="card-img rounded-0" src="assets/img/side_posts/<?=$p->url?>" alt="<?=$p->alt?>"/>
    <ul class="thumb-info">
    <li><a href="#"><i class="ti-user"></i><?=$p->username?></a></li>
    <li><a href="#"><i class="ti-date"></i><?=$newDate?></a></li>
    </ul>
    </div>
    <div class="details mt-20">
    <a href="blog-single.html">
    <h3><?=$p->post_name?></h3>
    </a>
    <p><?php if(strlen($p->info)>300){echo substr($p->info,0,300).'...';}?></p>

    <a class="button" href="index.php?page=detail_page&source=posts&itemID=<?=$p->post_ID?>">
    Read More <i class="ti-arrow-right"></i></a>
    </div>
    </div>
    </div>

    <?php endforeach;?>

</div>
<!--  -->

<div class="row">
        <div class="col-lg-12">
        <nav class="blog-pagination justify-content-center d-flex">
        <ul class="pagination">
         <?php
        if ( $pagelist > 1):?>
           <li class="page-item">
           <a href="index.php?page=posts&&pagelist=<?= $pagelist-1?>" 
           class="page-link" aria-label="Previous">
           <span aria-hidden="true">
           <i class="ti-angle-left"></i>
           </span>
           </a>
           </li>;
        <?php
        endif;
         for($i = 1; $i<=$pagesCount; $i++):
        ?>
        <li class="page-item <?=$class?>"><a href="index.php?page=posts&&pagelist=<?=$i?>" 
        class="page-link"><?=$i?></a></li>
        <?php endfor;
        if ( $pagelist < $pagesCount):
        ?>
        <li class="page-item">
        <a href="index.php?page=posts&&pagelist=<?= $pagelist+1?>" 
        class="page-link" aria-label="Next">
        <span aria-hidden="true">
        <i class="ti-angle-right"></i>
        </span>
        </a>
        </li>
        <?php endif;?>
        </ul>
        </nav>
        </div>
    </div>
</div>

</div>

</div>
<a id="backtotop"></a>
</section>

