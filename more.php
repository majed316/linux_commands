<?php 
include './inc/db.inc.php';
if(isset($_GET['category_cat_id']) && !empty($_GET['category_cat_id'])){
    $cat_id = addslashes($_GET['category_cat_id']);
$sql = "SELECT * FROM command WHERE category_cat_id='$cat_id'";
$query = $db->query($sql);
$result = $query->fetchall();
foreach ($result as $row ){
    echo $row['command_name'].'<br>'; 
}}
?>


