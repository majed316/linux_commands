<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './inc/db.inc.php';
if(isset($_GET['category_cat_id']) && !empty($_GET['category_cat_id'])){
 $cat_id = addslashes($_GET['category_cat_id']);
$sql = "SELECT * FROM command WHERE category_cat_id='$cat_id'";
echo $sql;
echo "<br>";
$query = $db->query($sql);
$result = $query->fetchall();
foreach ($result as $row ){
//<<<<<<< HEAD
    echo $row['command_name'].'<br>'; 
}
}
?>


=======
 echo $row['command_name'].'<br>'; 
}}
>>>>>>> 85dad66bb5a6ddb0c77ba63ea557f64c2b64a982
