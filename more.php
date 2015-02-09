 
<?php
include './inc/db.inc.php';
if(isset($_GET['catid']) &&
$_GET['catid'] != "" &&
is_numeric($_GET['catid'])){
$cat_id = addslashes($_GET['catid']);
$sqlCommands = "SELECT * FROM command WHERE category_cat_id='$cat_id'";
$sqlCat = "SELECT * FROM category WHERE cat_id='$cat_id'";
}else{
$message = '???? ??? ??????!!';
include './html/msg.html.php';
exit();
}
try{
$queryCommands = $db->query($sqlCommands);
$queryCategory = $db->query($sqlCat);
$commandRows = $queryCommands->fetchall();
$CategoryRow = $queryCategory->fetch();
} catch (PDOException $e) {
$error = 'Error fetching rows: ' . $e->getMessage();
include './html/error.html.php';
exit();
}
if(count($commandRows)<1){
$message = '???? ??? ??????!!';
include './html/msg.html.php';
exit();
}
include './html/more.html.php';