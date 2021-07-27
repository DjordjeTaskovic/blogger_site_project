<?php
header("Content-type: application/vnd.ms-word");  
header("Content-Disposition: attachment;Filename=author_details".rand().".doc");  
header("Pragma: no-cache");  
header("Expires: 0");  
if (isset($_POST['abtn'])) {
    $subtitle = $_POST['subtitle'];
    $info = $_POST['info'];
    $interest = $_POST['interest'];
    echo "<html>";
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
    echo "<body>";
    echo '<h1>'.$subtitle.'</h1>';
    echo '<p>'.$info.'</p>';
    echo '<p>'.$interest.'</p>';

    echo "</body>";
    echo "</html>";
}?>



