<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            <a class="bbtns d-block mt-20 w-100" href="index.php?page=register">Subcribe</a>
        </div>
        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Category</h4>
            <form action="index.php#blog-post-area" method="GET">
                <ul class="cat-list mt-20">
                    <?php
                    $catis = getAllFromTable('categories');
                    foreach ($catis as $cat): ?>
                        <li>
                            <input type="submit" class="button" style="cursor: pointer;" 
                            name="category" value="<?=$cat->name ?>"/>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </form>
        </div>
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Popular News</h4>
            <?php 
            $news = getPosts(3);
            foreach($news as $p):
                $pdate = explode(" ", $p->date);
                $newDate = date("M jS, Y", strtotime($pdate[0]));
            ?>
            <div class="popular-post-list">
                <div class="single-post-list">
                    <div class="thumb">
                        <a href="index.php?page=detail_page&source=posts&itemID=<?= $p->post_ID ?>">
                            <img class="card-img rounded-0 bg-light" src="assets/img/side_posts/<?= $p->url ?>" alt="<?= $p->alt ?>" />
                        </a>
                        <ul class="thumb-info">
                            <li><a href="#"><?=$p->username?></a></li>
                            <li><a href="#"><?=$newDate?></a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="index.php?page=detail_page&source=posts&itemID=<?= $p->post_ID ?>">
                            <h6><?= $p->post_name ?></h6>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
           
        </div>
    </div>

</div>
</div>