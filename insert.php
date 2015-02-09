<?php
include './inc/db.inc.php';
?>
<html>
    <form method="post" action="insert.php" autocomplete="off">
        name : <input type="text" name="name" ><br>
        insert: <input type="submit" value="add_command "><br> 
       
    </form>
</html>
<?php 
if(isset($_POST['name'])){
    $name =addslashes($_POST['name']);
    
    $sql = "INSERT INTO category (name) VALUES ('$name')";
    $query = $db->query($sql);
   
    
}  
echo  "$name "."<---  "."تم ضافة الامر  ";
 //require 'Delete_edit.php';
