
<div class="content pt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Messages</h4>
            <p class="category"> Here is a table of messages</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name
                  </th>
                  <th>Email
                  </th>
                  <th>Subject
                  </th>
                  <th>Note
                  </th>
                </thead>
                <tbody>
                   <?php
                   $messages = getAllFromTable('messages');
                   foreach ($messages as $m ):?>
                    <tr>
                      <td><?=$m->id?></td>
                      <td><?=$m->name?></td>
                      <td><?=$m->email?></td>
                      <td><?=$m->subject?></td>
                      <td><?=$m->message?></td>
                    </tr>
                    <?php endforeach;
                    ?>
                    <tr>
                      <a href="models/export_to_excel.php"
                       class="btn btn-warning" name="abtn">
                        Export data to Excel</a></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
