
<div class="content pt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Product Orders</h4>
            <p class="category"> Here is a table of orders form users.</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>UserID
                  </th>
                  <th>BlogID
                  </th>
                  <th>Comment
                  </th>
                  <th>Date
                </th>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['blogfcommid'])):
                      $ID = $_GET['blogfcommid'];
                    $com = getcommentsbyID($ID);
                   
                   foreach($com as $comments):
                    ?>
                    <tr>
                      <td><?=$comments->id?></td>
                      <td><?=$comments->id_user?></td>
                      <td><?=$comments->id_blogs?></td>
                      <td><?=$comments->comment?></td>
                      <td><?=$comments->date?></td>

                    </tr>
                   <?php
                   endforeach;
                   endif;
                   ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
