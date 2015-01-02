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
session_start();
if (!$_SESSION['admin']){
    $_SESSION['page'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    header( 'Location: http://localhost/linux_commands/admin/' );
    exit();
}else{
    unset($_SESSION['page']);
}
include './inc/db.inc.php';
if(isset($_GET['command_id'])&&
        $_GET['command_id'] != "" &&
        is_numeric($_GET['command_id'])){
    try{
        $query  = "DELETE  FROM command WHERE command_id = " . addslashes($_GET['command_id']);
	$affectedRows = $db->exec($query);
        if($affectedRows < 1){
            $message = "صفحة غير موجودة!!";
            include './html/msg.html.php';
            exit();
        }else{
            $message = "تم حذف الأمر بنجاح!!";
            include './html/msg.html.php';
            exit();
        }
    } catch (PDOException $e) {
            $error = 'Error Deleting Row: ' . $e->getMessage();
            include './html/error.html.php';
            exit();
        }
    }else{
        $message = "صفحة غير موجودة!!";
        include './html/msg.html.php';
        exit();
    }
?> 
