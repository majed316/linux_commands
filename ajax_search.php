<?php

include './inc/db.inc.php';
if (isset($_POST['term']) && !empty($_POST['term'])) {
    $s_term = $_POST['term'];
    $sql = "SELECT command_name,command_description FROM command WHERE command_name LIKE '%{$s_term}%'";
    $ste = addslashes($sql);
    $ste = $db->query($sql);
    $result = $ste->fetchall();
    if (count($result) < 1) {
        echo 'لم يتم العثور على نتائج البحث ';
    } else {
        foreach ($result as $row) {
            echo $row['command_name'] . '<br>';
            echo $row['command_description'] . '<br>';
        }
    }
}
$db = null;
?>