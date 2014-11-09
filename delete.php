<?php
include './inc/db.inc.php';
if(isset($_GET['commandname'])){
	$query = "DELETE  FROM command WHERE command_id = " . $_GET['commandname'];
	addslashes($_get['commandname']);
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
		echo "wrong";
	}


?> 
