<?php
/*
 * delcommand.php
 * Author: Abdulrahman Abdullah
 * TODO List:
 * 1- Simply retrive all commands from database.                                DONE
 * 2- Then Display it, whith a link which pass command_id to delcommand.php.    DONE
  */
include './inc/db.inc.php';
$sql = " SELECT * FROM command";
$query = $db->query($sql);
foreach ($query as $row) {
	echo $row['command_name'].'  '." <td><a href=delcommand.php?command_id="  . $row['command_id'] .  "> <i><b> Delete </b></i> </a> </td>". '<br>';
}


?> 
