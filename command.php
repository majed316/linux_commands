<?php

/*
 * command.php
 * Author: Majed Ali
 * TODO LIST:
 * 1- Grab the variable 'command_id' from $_REQUEST or $_GET.
 * 2- Search the command_id in command table, then retrive it.
 * 3- Search the command options and uses in databases.
 * 4- combine all result in one $data array.
 * 5- pass that array to command.html.php file.
 */
include './inc/db.inc.php';
try
{
    $commandSql = "SELECT * FROM command WHERE command_id = {$_REQUEST['command_id']}";
    $optionsSql = "SELECT * FROM options WHERE command_command_id = {$_REQUEST['command_id']}";
    $usesSql = "SELECT * FROM uses WHERE command_command_id = {$_REQUEST['command_id']}";
    $commandResult = $db->query($commandSql);
    $optionsResult = $db->query($optionsSql);
    $usesResult = $db->query($usesSql);
    $commandRow = $commandResult->fetchall();
    $optionsRows = $optionsResult->fetchall();
    $usesRows = $usesResult->fetchall();
} catch (PDOException $e) {
    $error = 'Error fetching rows: ' . $e->getMessage();
    include '/html/error.html.php';
    exit();
}
include './html/command.html.php';