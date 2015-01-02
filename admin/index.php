<?php
session_start();
if(isset($_SESSION['page']) && $_SESSION['page'] != ""){
    $_SESSION['admin'] = true;
    header( 'Location: ' . $_SESSION['page']) ;

}else{
    $_SESSION['admin'] = true;
    unset($_SESSION['page']);
    header( 'Location: http://localhost/linux_commands/');

}
?>