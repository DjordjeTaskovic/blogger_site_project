<main class="site-main">

    <section class="mb-30px">
        <div class="container">
            <div class="hero-banner">
                <div class="hero-banner__content">
                    <h3>Publish your passion, your unique</h3>
                    <h1>Amazing and Beautiful Blog</h1>
                    <h4></h4>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-post-area section-margin mt-4" id="blog-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    include 'config/connection.php';
                    include 'models/functions.php';
                    if (isset($_GET['perPage'])) {
                        $perPage = $_GET['perPage'];
                    } else {
                        $perPage = 3;
                    }
                    if (isset($_GET['pagelist'])) {
                        $pagelist = $_GET['pagelist'];
                    } else {
                        $pagelist = 1;
                    }
                    $offset = ((int)$pagelist - 1) * (int)$perPage;
                    $perPage = (int)$perPage;
                    $total = count(getAllFromTable('blogs'));
                    $pagesCount = round($total / $perPage);

                    if (isset($_GET['category'])) {
                        $blogs = sortBlogsbyCat($perPage, $offset, $_GET['category']);
                    } else {
                        $blogs = getBlogsbyPagination($perPage, $offset);
                    }

                    foreach ($blogs as $blog) :
                        $blogdate = explode(" ", $blog->date);
                        $newblogDate = date("M jS, Y", strtotime($blogdate[0]));
                        $comments = getcommentsbyBlogID($blog->bID); ?>
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <a href="index.php?page=detail_page&source=blogs&itemID=<?= $blog->bID ?>">
                                <img class="img-fluid bg-light" src="assets/img/blogs/<?= $blog->url ?>" alt="<?= $blog->alt ?>"/>
                                </a>
                                <ul class="thumb-info">
                                    <li><a><i class="ti-user"></i><?= $blog->username ?></a></li>
                                    <li><a><i class="ti-notepad"></i><?= $newblogDate ?></a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                               <div class="blog-tags">
                                   <div class="tag-list-inline">
                                       <a href="#" class="com-btn" 
                                       data-id="<?= $blog->bID ?>">
                                       (<b><?= count($comments) ?></b>) Comments</a>
                                    </div>
                                    <div class="tag-list-inline">
                                        <a href="#"><?= $blog->kat ?></a>
                                    </div>
                               </div>
                                <a href="index.php?page=detail_page&source=blogs&itemID=<?= $blog->bID ?>">
                                    <h3><?= $blog->blog_name ?></h3>
                                </a>

                                <p><?php if (strlen($blog->info) > 300) {
                                        echo substr($blog->info, 0, 300) . '...';
                                    } ?>
                                </p>
                                <div class="show-comment jumbotron cblock<?= $blog->bID ?> p-3" style="display: none;">
                                    <h3><?= count($comments) ?> Comments</h3>
                                    <hr>
                                    <?php
                                    foreach ($comments as $c) :
                                        $comd = explode(" ", $c->comdate);
                                        $newcomDate = date("M jS, Y", strtotime($comd[0]));
                                    ?>
                                        <b><?= $c->username ?></b>
                                        <p><?= $newcomDate ?></p>
                                        <p><i class="ti-angle-double-right"></i><?= $c->comment ?></p>
                                        <hr>
                                    <?php
                                    endforeach;
                                    if (isset($_SESSION['korisnik'])) :
                                        $userid = $_SESSION['korisnik']->id; ?>
                                        <form method="POST" action="models/insert_comments.php">
                                            <input type="hidden" name="blogID" value="<?= $blog->bID ?>" />
                                            <input type="hidden" name="userID" value="<?= $userid ?>" />
                                            <textarea name="newcomment" id="newcomment"></textarea><br>
                                            <button name="ncom" class="btn btn-warning" type="submit"> Add new Comment </button>
                                        </form>
                                    <?php endif;
                                    if (!isset($_SESSION['korisnik'])) {
                                        echo '<b>You need to login first to make comment on site.</b>';
                                    } ?>
                                </div>

                                <a class="button" href="index.php?page=detail_page&source=blogs&itemID=<?= $blog->bID ?>">
                                    Read More
                                    <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php endforeach;
                    if (!isset($_GET['category'])) :
                    ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <nav class="blog-pagination justify-content-center d-flex">
                                    <ul class="pagination">
                                        <?php if ($pagelist > 1) : ?>
                                            <li class="page-item">
                                                <a href="index.php?pagelist=<?= $pagelist - 1 ?>" class="page-link" aria-label="Previous">
                                                    <span aria-hidden="true">
                                                        <i class="ti-angle-left"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <?php
                                        endif;
                                        for ($i = 1; $i <= $pagesCount; $i++) :
                                            if ($pagelist == $i) :
                                            ?>
                                                <li class="page-item">
                                                    <a href="index.php?pagelist=<?= $i ?>" class="page-link active-page">
                                                        <?= $i ?>
                                                    </a>
                                                </li>
                                            <?php else : ?>
                                                <li class="page-item">
                                                    <a href="index.php?pagelist=<?= $i ?>" class="page-link">
                                                        <?= $i ?>
                                                    </a>
                                                </li>
                                            <?php
                                            endif;

                                        endfor;

                                        if ($pagelist < $pagesCount) :
                                            ?>
                                            <li class="page-item">
                                                <a href="index.php?pagelist=<?= $pagelist + 1 ?>" class="page-link" aria-label="Next">
                                                    <span aria-hidden="true">
                                                        <i class="ti-angle-right"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
                include "views/fixed/sidebar.php";
                ?>
            </div>
        </div>
        <a id="backtotop"></a>
    </section>
</main>