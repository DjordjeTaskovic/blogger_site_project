<section class="mb-30px">
    <div class="container">
        <div class="hero-banner hero-banner--sm">
            <div class="hero-banner__content">
                <h1>A Little Bit More..</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="blog-post-area section-margin">
    <div class="container">
        <div class="row">
            <?php
            include 'config/connection.php';
            include 'models/functions.php';
            $it;
            $file;
            $itemID;
            if (isset($_GET['itemID']) && isset($_GET['source'])) {
                $items = getItemsByID($_GET['source'], $_GET['itemID']);
            }
            if ($_GET['source'] == "posts") {
                $file = 'assets/img/side_posts/' . $items->url;
            } else {
                $file = 'assets/img/blogs/' . $items->url;
                $itemID = $_GET['itemID'];
            }
            $date = explode(" ", $items->date);
            $newDate = date("M jS, Y", strtotime($date[0]));
            ?>
            <div class="col-12">
                <div class="main_blog_details">
                    <img class="img-fluid" src="<?= $file ?>" alt="<?= $items->alt ?>" />
                    <a href="#">
                        <h4><?= $items->item_name ?></h4>
                    </a>
                    <div class="user_details">
                        <div class="float-left">
                            <a href="#"><?= $items->kat ?></a>
                        </div>
                        <div class="float-right mt-sm-0 mt-3">
                            <div class="media">
                                <div class="media-body">
                                    <h5><?= $items->username ?></h5>
                                    <p><?= $newDate ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <blockquote class="blockquote">
                        <p class="mb-0"><?= $items->info ?></p>
                    </blockquote>
                </div>
                <?php
                if (isset($itemID)) :
                    $comments = getcommentsbyBlogID($itemID);
                ?>
                    <div class="comments-area">
                        <h4><?= count($comments) ?> Comments</h4>
                        <?php
                        foreach ($comments as $c) :
                            $comd = explode(" ", $c->comdate);
                            $newcomDate = date("M jS, Y", strtotime($comd[0]));
                        ?>
                            <div class="comment-list">
                                <div class="single-comment">
                                    <div class="user">
                                        <div class="desc">
                                            <h5><a href="#"><?= $c->username ?></a></h5>
                                            <p class="date"><?= $newcomDate ?></p>
                                            <p class="comment">
                                                <?= $c->comment ?>
                                            </p>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        <?php 
                    endforeach;
                    if(!isset($_SESSION['korisnik'])):
                    ?>
                    <i style="font-size:13px;">You need to login first to make comment on site.</i>
                    <?php endif;?>
                    </div>
                    <div class="comment-form">
                        <?php if (isset($_SESSION['korisnik'])) :
                            $userid = $_SESSION['korisnik']->id; ?>
                            <form method="POST" action="models/insert_comments.php">
                                <input type="hidden" name="blogID" value="<?= $itemID ?>" />
                                <input type="hidden" name="userID" value="<?= $userid ?>" />
                                <textarea name="newcomment" id="newcomment"></textarea><br>
                                <button name="ncom" class="btn btn-warning" type="submit"> Add new Comment </button>
                            </form>
                    <?php
                    endif;
                    endif;
                    ?>
                    </div>

            </div>
        </div>
        <a id="backtotop"></a>
</section>