<?php

/*
 * index.php
 * entry file
 */
include './inc/db.inc.php';
include './inc/func.php';
try
{
    $catSql = 'SELECT * FROM category';
    $commandSql = 'SELECT * FROM command';
    $catResult = $db->query($catSql);
    $commandResult = $db->query($commandSql);
    $catRows = $catResult->fetchall();
    $commandRows = $commandResult->fetchall();
} catch (PDOException $e) {
    $error = 'Error fetching rows: ' . $e->getMessage();
    include './html/error.html.php';
    exit();
}
include './html/index.html.php';