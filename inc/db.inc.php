<?php

/*
 * db.inc.php
 * all database connections happen here.
 */
include 'config.php';
try
{
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->exec('SET NAMES "utf8"');
} catch (PDOException $e) {
    $error = 'Unable to connect to the database server: ' . $e->getMessage();
    $data = array();
    include '../html/error.html.php';
    exit();
}