<?php
/*
 * logout.php
 * Author: Majed Ali
 * TODO LIST:
 * 1- this page will recieve an argument from the caller page, that contain the PHP_SELF SuperGlobal Variable then.
 * 2- the PHP_SELF SuperGlobal variable will passed to header function to redirect the user where he actully was.
 */
session_start();
unset($_SESSION['admin']);
header( "Location: http://$_SERVER[HTTP_HOST]/linux_commands" ) ;
?>