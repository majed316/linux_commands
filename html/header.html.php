<?php
session_start();
?>
<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/linux_commands/css/styles.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <title>
            TULCR - The Ultimate Linux Commands Reference
        </title>
    </head>
    <body>
        <?php
        include 'nav.html.php';
        ?>
        <div class="container">
            <?php
            if (isset($_SESSION['admin'])) {
                $admin = TRUE;
                $span = 4;
                echo "<a href='logout.php'>تسجيل خروج الأدمن</a><br>\n";
                echo "<a href='addcommand.php'>إضافة أمر</a><br>\n";
                //echo "<a href='addcat.php'>إضافة تصنيف</a><br>\n";
                echo "<a href='search.php'>بحث عن أمر</a><br>\n";
            } else {
                $admin = FALSE;
                $span = 3;
            }
            ?>