<?php
/*
 * delcommand.php
 * Author: Abdulrahman Abdullah
 * TODO List:
 * 1- Recieve the command id from delete_command.php.                                       DONE
 * 2- Excute sql query that simply delete the command from database according to its id.    DONE
 * 3- Include delete_command.php, to show a list of all command in database.                DONE
 * 4- Test if the admin variable is set or not, and according to that the page will be shown or not.
 * 5- Actully you may use ajax to delete the command while you are in the index.html.php page.
 */
include './inc/db.inc.php';
if(isset($_GET['command_id'])){
	$query = "DELETE  FROM command WHERE command_id = " . addslashes($_GET['command_id']);
	$result= $db->query($query);
	//this -if- for result after delete ... 
	if($result){
		echo "تم الحذف بنجاح ".'<br>';
	}
	//this line easily  show command staying ....
	require 'delete_command.php';
	// status for first if ... 
}else
	{
		echo "حدث خطأ، لم يتم حذف الأمر";
	}


?> 
