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
                    foreach ($catis as $cat) : ?>
                        <li>
                            <input type="submit" class="d-block sidebar_btn" 
                            name="cat" value='<?= $cat->name ?>'/>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </form>
        </div>
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Popular Post</h4>
            <div class="popular-post-list">
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="assets/img/side_posts/post1.jpg" alt="side_post" />
                        <ul class="thumb-info">
                            <li><a href="#">Adam Colinge</a></li>
                            <li><a href="#">Dec 15</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h6>Accused of assaulting flight attendant miktake alaways</h6>
                        </a>
                    </div>
                </div>
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="assets/img/side_posts/post2.jpg" alt="side_post" />

                        <ul class="thumb-info">
                            <li><a href="#">Adam Colinge</a></li>
                            <li><a href="#">Dec 15</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h6>Tennessee outback steakhouse the
                                worker diagnosed</h6>
                        </a>
                    </div>
                </div>
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="assets/img/side_posts/post3.jpg" alt="side_post" />

                        <ul class="thumb-info">
                            <li><a href="#">Adam Colinge</a></li>
                            <li><a href="#">Dec 15</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h6>Tennessee outback steakhouse the
                                worker diagnosed</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="single-post-list">
                <div class="thumb">
                    <img class="card-img rounded-0" src="assets/img/side_posts/post4.jpg" alt="side_post" />

                    <ul class="thumb-info">
                        <li><a href="#">Adam Colinge</a></li>
                        <li><a href="#">Dec 15</a></li>
                    </ul>
                </div>
                <div class="details mt-20">
                    <a href="blog-single.html">
                        <h6>Tennessee outback steakhouse the
                            worker diagnosed</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
</div>