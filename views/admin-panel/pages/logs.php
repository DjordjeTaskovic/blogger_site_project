<div class="content pt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Table of site access for the last 24h</h4>
            <p class="category">Site Access</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover">

<thead class="text-warning">
    <th>Route</th>
    <th>Date</th>
    <th>Ip</th>
</thead>
<tbody>
  <?php
    $filea = fopen("config/logs/access.txt", "r");
    $dataa = file("config/logs/access.txt");
    //check if logs hapened today
    $count = 0;
    $cdate = date('Y-m-d');
    for ($i = 0; $i < count($dataa); $i++):

      $in = explode("\t", $dataa[$i]);
       $adate = explode(' ',$in[1]);
       if ($adate[0] == $cdate):
        $count++;
      ?>
       <tr><td><?= $in[0] ?></td>
        <td><?= $in[1] ?></td>
        <td><?= $in[2] ?></td>
        </tr> 
  <?php
    endif;
  endfor;
  echo '<p>= There where (<b>'.$count.'</b>) of site accesses for the day.</p><hr/>';
?>
</tbody>
</table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  -->
  <div class="content pt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Table of user logs and register for the last 24h</h4>
            <p class="category">Site Logs</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover">

<thead class="text-warning">
    <th>Username</th>
    <th>Role</th>
    <th>Route</th>
    <th>Ip</th>
    <th>Date</th>
    <th>Status</th>
</thead>
<tbody>
  <?php
    $file = fopen("config/logs/log.txt", "r");
    $data = file("config/logs/log.txt");

    //check if logs hapened today
    $logcount = 0;
    $curentdate = date('Y-m-d');
    foreach($data as $d):
      $ind = explode("\t", $d);
      $listdate = explode(' ',$ind[4]);
      if ($listdate[1] == $curentdate):
        $logcount++;
      ?>
       <tr><td><?= $ind[0] ?></td>
        <td><?= $ind[1] ?></td>
        <td><?= $ind[2] ?></td>
        <td><?= $ind[3] ?></td>
        <td><?= $ind[4] ?></td>
        <td><?= $ind[5] ?></td></tr> 
  <?php
    endif;
  endforeach;
  echo '<p>= There where (<b>'.$logcount.'</b>) of log for the day.</p><hr/>';

?>
</tbody>
</table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

