<?php
include './inc/db.inc.php';
$sql = " SELECT * FROM command";
$query = $db->query($sql);
foreach ($query as $row) {
	echo $row['command_name'].'  '." <td><a href=delete.php?commandname="  . $row['command_id'] .  "> <i><b> Delete </b></i> </a> </td>". '<br>';
}


?> 
