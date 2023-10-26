<section>
  <div class="container">
    <section class="mb-30px">
      <div class="container">
        <div class="hero-banner">
          <div class="hero-banner__content">
            <?php
            include 'config/connection.php';
            include 'models/functions.php';
            $userID = '';
            if (!isset($_SESSION['korisnik'])) {
              header("Location:index.php");
            }
            if (isset($_SESSION['korisnik'])) {
              $userID = $_SESSION['korisnik']->id;
            }
            $userinfo = getuserbyID($userID);
            $userimage = getuserimage($userinfo->id_img);
            ?>
            <img src="assets/img/users/<?= $userimage->url ?>" alt="<?= $userimage->alt ?>" />
            <h1><?= $userinfo->name ?></h1>
            <p><?= $userinfo->about ?></p>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12" id="user-blogs">
            <div class="row">
              <div class="col-lg-6 sidebar-widgets">
                <div class="widget-wrap">
                  <div class="single-sidebar-widget newsletter-widget">
                    <h4 class="single-sidebar-widget__title">Usefull links</h4>
                    <button class="bbtns d-block mt-2 w-100" id="user_info">Update your info <i class="ti-arrow-down"></i></button>
                    <div id="more_user_info" style="display:none;">
                      <div class="card">
                        <div class="card-body">

                          <form action="models/update_user.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="ID" value="<?= $userinfo->id ?>" />
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>UserName</label>
                                  <input type="text" class="form-control" name="name" value="<?= $userinfo->name ?>">
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" class="form-control" name="email" value="<?= $userinfo->email ?>" disabled />

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" class="form-control" name="address" value="<?= $userinfo->address ?>">

                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Date</label>
                                  <input type="date" class="form-control" name="date" value="<?= $userinfo->birthdate ?>">

                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>About Me</label>
                                  <textarea rows="4" cols="80" name="message" class="form-control"
                                   value="<?= $userinfo->about ?>"><?= $userinfo->about ?></textarea>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Profile photo</label>
                                  <input type="file" class="form-control" name="imagefile" />

                                </div>
                              </div>


                              <div class="col-md-12">
                                <div class="form-group">
                                  <button type="submit" class="btn btn-warning" name="update_user">Update data</button>
                                  <div id="user_responce"></div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <a href="index.php?page=blog_form" class="bbtns d-block mt-2 w-100 text-center">Add New Blog</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <h1 class="d-flex align-items-center justify-content-center">Your blogs</h1>
                <?php
                $blogsbyuser = getBlogsbyUserID($userID);
                if (!$blogsbyuser) {
                  echo '<div id="no-blogs"class="d-flex justify-content-center mt-5">
                        <i>You need to post more blogs...</i>
                        </div>';
                }
                foreach ($blogsbyuser as $b) :
                  $blogdate = explode(" ", $b->date);
                  $newblogDate = date("M jS, Y", strtotime($blogdate[0]));
                ?>
                  <div class="single-recent-blog-post">
                    <div class="thumb">
                      <img class="img-fluid" src="assets/img/blogs/<?= $b->url ?>" alt="<?= $b->alt ?>">
                      <ul class="thumb-info">
                        <li><a href="#"><i class="ti-user"></i><?= $b->username ?></a></li>
                        <li><a href="#"><i class="ti-notepad"></i><?= $newblogDate ?></a></li>
                      </ul>
                    </div>
                    <div class="details mt-20">
                      <a href="blog-single.html">
                        <h3><?= $b->blog_name ?></h3>
                      </a>
                      <p class="tag-list-inline">Tag:<a href="#"><?= $b->kat ?></a></p>

                      <p><?php if (strlen($b->info) > 300) {
                            echo substr($b->info, 0, 300) . '...';
                          } else {
                            echo $b->info;
                          } ?>
                      </p>
                      <form method="POST" action="index.php?page=blog_form">
                        <input type="hidden" name="blogID" value="<?= $b->bID ?>" />
                        <button type="submit" class="btn btn-warning">Update
                          <i class="ti-arrow-right"></i></button>
                      </form>

                      <form method="POST" action="models/delete_blog.php">
                        <input type="hidden" name="blogID" value="<?= $b->bID ?>" />
                        <button onclick="return confirm('Are you sure you want to delete item?')" 
                        name="btndelete" class="btn btn-danger" type="submit"> Delete </button>
                      </form>

                    </div>
                  </div>
                <?php endforeach; ?>
              </div>

            </div>

          </div>

        </div>
      </div>
  </div>
</section>
<a id="backtotop"></a>
</div>
</section>