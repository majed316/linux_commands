<?php   include './html/search.html.php'; ?>
 
        <?php 

             include './inc/db.inc.php';
             if(isset($_POST['commandname'])){
                 $post =$_POST['commandname'];
                 $sql = "SELECT command_name,command_description FROM command WHERE command_name LIKE '%{$post}%'";
                 //Generation slashes .. 
                 $ste=  addslashes($sql);
                 $ste = $db->query($sql);
                 $result = $ste->fetchall();
                 if(count($result)<1 ){
                     echo 'لم يتم العثور على نتائج البحث ';
                 }  else {
                 foreach ($result as $row) {
                     echo $row['command_name'].'<br>';
                     echo $row['command_description'].'<br>';
                 }}
             }
             //close database 
             $db=null;

           ?>
        
  





