<?php
/*
 * editcommand.php
 * Author: Majed Ali
 * TODO List:
 * 1- Recieve the command_id.
 * 2- Retrieve the command from database.
 * 3- Create form consist of three fields (command_name, command_desc, command_syntax), and one hiden field for command_id.
 * 4- When submiting the form query the database with update statement to update the the command according to its id.
 * 5- Test if the admin variable is set or not, and according to that the page will be shown or not.
 * 6- Actully you may use ajax to edit the command while you are in the index.html.php page.
 */
include './inc/db.inc.php';
if (!empty($_REQUEST)) {                             //there is argments passed.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {    // the form submitted
        try{
            $sql = "UPDATE command SET command_name = '{$_REQUEST['command']}',
            command_description = '{$_REQUEST['desc']}',
            command_form = '{$_REQUEST['syntax']}'
            WHERE command_id = {$_REQUEST['id']}";
            $stmt = $db->query($sql);
            $text="تم تعديل الأمر بنجاح";
        } catch (PDOException $e) {
            $error = 'Error fetching rows: ' . $e->getMessage();
            include './html/error.html.php';
            exit();
        }
    }else{                                          // the command_id passed
        if (isset($_REQUEST['command_id']) && $_REQUEST['command_id'] != "") {
            try {
                $commandSql = "SELECT * FROM command WHERE command_id = {$_REQUEST['command_id']}";
                $commandResult = $db->query($commandSql);
                $commandRow = $commandResult->fetchall();
                if (count($commandRow) < 1) {
                    $message = "لم يتم تمرير رقم أمر صحيح";
                    include './html/msg.html.php';
                    exit();
                } else {
                    $row = $commandRow[0];
                    $text ="<form action = 'editcommand.php' method = 'post'>"
                            . "<table>"
                            . "<tr>"
                            . "<td>اسم الأمر</td>"
                            . "<td>وصف الأمر</td>"
                            . "<td>صيغة الأمر</td>"
                            . "</tr>"
                            . "<tr>"
                            . "<td>"
                            . "<input type = 'hidden' name = 'id' value = '{$row['command_id']}'>"
                            . "<input type = 'text' name = 'command' value = '{$row['command_name']}'>"
                            . "</td>"
                            . "<td><input type = 'text' name = 'desc' value = '{$row['command_description']}'></td>"
                            . "<td><input type = 'text' name = 'syntax' value = '{$row['command_form']}'></td>"
                            . "</tr>"
                            . "<tr>"
                            . "<td colspan='3'><input type = 'submit' value = 'حفظ'></td>"
                            . "</tr>"
                            . "</table>"
                            . "</form>";
                }
            } catch (PDOException $e) {
                $error = 'Error fetching rows: ' . $e->getMessage();
                include './html/error.html.php';
                exit();
            }
        }else{
                $message = "لم يتم تمرير أي رقم تعريف";
            include './html/msg.html.php';
            exit();
        }
    }
}else{                                              //No Argments are passed.
    $message = "لم يتم تمرير أي رقم تعريف";
    include './html/msg.html.php';
    exit();
}


?>
<html dir="rtl">
    <head>
        <meta charset="utf-8">
        <title>تعديل أمر</title>
    </head>
    <body>
        <?php echo $text; ?>
    </body>
</html>