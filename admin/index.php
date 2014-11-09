<?php
session_start();
$_SESSION["admin"] = "true";
header( 'Location: http://localhost/linux_commands/' ) ;
?>