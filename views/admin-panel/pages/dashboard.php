<div class="content ">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> All Blog Stats</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Informations</th>
                  <th >Image</th>
                  <th>Category</th>
                  <th>Blogger</th>
                  <th>Update/Delete</th>
                </thead>
                <tbody>
                  <?php 
                 
                  $blogs = getAllBlogs();
                  foreach ($blogs as $p):?>
                    <tr>
                        <td><?=$p->bID?></td>
                        <td><?=$p->blog_name?></td>
                        <td><?php if(strlen($p->info)>300){echo substr($p->info,0,300).'...';}?></td>
                        <td><img src="assets/img/blogs/<?=$p->url?>" alt="<?=$p->alt?>"/>
                        <a href="admin-panel.php?page=comments&blogfcommid=<?=$p->bID?>"
                        class=" btn btn-success">Check Comments</a>
                        </td>
                        <td><?=$p->kat?></td>
                        <td><?=$p->username?></td>
                       
                        <td>
                        <form method="POST" action="index.php?page=blog_form">
                    <input type="hidden" name="blogID" value="<?=$p->bID?>"/>
                    <button type="submit" class="btn btn-warning">Update
                    </button>
                    </form>
                 <br>
                 <form method="POST" action="models/delete_blog.php">
                    <input type="hidden" name="blogID" value="<?=$p->bID?>"/>
                            <button onclick="return confirm('Are you sure you want to delete item?')"
                            name="btndelete" class="btn btn-danger" type="submit"> Delete </button>
                      </form>
                        </td>
                      </tr>
                    <?php endforeach;?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> All Side-Post Stats</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Informations</th>
                  <th >Image</th>
                  <th>Category</th>
                  <th>Blogger</th>
                  <th>Date</th>
                  <th>Update/Delete</th>
                </thead>
                <tbody>
                  <?php 
                 
                  $posts = getAllPosts('posts');
                  foreach ($posts as $p):
                  ?>
                    <tr>
                        <td><?=$p->post_ID?></td>
                        <td><?=$p->post_name?></td>
                        <td><?php if(strlen($p->info)>300){echo substr($p->info,0,300).'...';}?></td>
                        <td><img src="assets/img/side_posts/<?=$p->url?>" alt="<?=$p->alt?>"/></td>
                        <td><?=$p->kat?></td>
                        <td><?=$p->username?></td>
                        <td><?=$p->date?></td>

                        <td>
                        <form method="POST" action="admin-panel.php?page=post_form">
                    <input type="hidden" name="blogID" value="<?=$p->post_ID?>"/>
                    <button type="submit" class="btn btn-warning">Update
                    </button>
                    </form>
                 <br>
                 <form method="POST" action="models/delete_post.php">
                    <input type="hidden" name="blogID" value="<?=$p->post_ID?>"/>
                            <button onclick="return confirm('Are you sure you want to delete item?')"
                            name="btndelete" class="btn btn-danger" type="submit"> Delete </button>
                      </form>
                        </td>
                      </tr>
                    <?php endforeach;?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
