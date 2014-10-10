<?php

/*
 * Created By Majed Ali
 */
include '/inc/db.inc.php';
try
{
    $catSql = 'SELECT * FROM category';
    $commandSql = 'SELECT * FROM command';
    $catResult = $pdo->query($catSql);
    $commandResult = $pdo->query($commandSql);
    $catRows = $catResult->fetchall();
    $commandRows = $commandResult->fetchall();
} catch (PDOException $e) {
    $error = 'Error fetching rows: ' . $e->getMessage();
    include '../html/error.html.php';
    exit();
}
include '/html/output.html.php';