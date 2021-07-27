
<div class="content pt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> All User Informations</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Adrress</th>
                  <th>Role</th>
                </thead>
                <tbody>
                    <?php 
                    $users = getAllUsers();
                    foreach ($users as $p):?>
                    <tr>
                        <td><?=$p->id?></td>
                        <td><?=$p->name?></td>
                        <td><?=$p->email?></td>
                        <td><?=$p->address?></td>
                        <td><?=$p->password?></td>
                        <td><?=$p->rolename?></td>


                      </tr>
                    <?php endforeach?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
