<?php
include "../config/connection.php";
include "functions.php";
$messages = getAllFromTable('messages');
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=messages_export".rand().".com.xls");
	
?>
	 <br>
	 <table style="width:100%" border='1'>
	  <tr>
		<th>id</th>
		<th>Name</th> 
		<th>Email</th>
		<th>Subject</th>
		<th>Message</th>
	  </tr>
    <?php foreach($messages as $m):?>
	  <tr>
		<td><?=$m->id?></td>
		<td><?=$m->name?></td> 
		<td><?=$m->email?></td>
		<td><?=$m->subject?></td>
		<td><?=$m->message?></td>
	  </tr>
    <?php endforeach;?>

	</table>
 
 
    
