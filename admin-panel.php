<!DOCTYPE html>
<html lang="en">
<?php 
 include "config/connection.php";
 include "models/functions.php";
include "views/admin-panel/fixed/head.php";
session_start();
?>
<body>
  <div class="wrapper">
  <?php include "views/admin-panel/fixed/sidebar.php";?>
    <div class="main-panel" id="main-panel">
  <?php include "views/admin-panel/fixed/navbar.php";?>
     <div class="p-5 mt-5">
     <?php
     if(!isset($_SESSION['korisnik'])){
      header('Location:index.php');
      }
    if($_SESSION['korisnik']->rolename =='user'){
      header('Location:index.php');
    }
      if (isset($_GET['page'])) {
          switch ($_GET['page']) {
              case 'dashboard':
                include "views/admin-panel/pages/dashboard.php";
                  break;
              case 'messages':
                  include "views/admin-panel/pages/messages.php";
                  break;
                  case 'users':
                    include "views/admin-panel/pages/users.php";
                    break;
                    case 'comments':
                      include "views/admin-panel/pages/comments.php";
                      break;
                     case 'panel_logout':
                     include "views/admin-panel/pages/panel_logout.php";
                     break;
                    case 'logs':
                    include "views/admin-panel/pages/logs.php";
                    break;
              }
            }
              else{
                include "views/admin-panel/pages/logs.php";
              }
      ?>
     </div>
    </div>
  </div>
  <?php include "views/admin-panel/fixed/scripts.php";?>
  
</body>


</html>

