<html>
    <head>
        <meta charset="utf-8"/> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
        <script src="search_php.js"></script>  
        <title>
            search command 
        </title>
    </head>
   <body>
   	<input type="text" id="box" onkeyup="getAjxaData()" />
   	<div id="result">
   		
   	</div>
   </body>
</html>
<?php 
 include './inc/db.inc.php' ; 
if(isset($_POST['term']) && !empty($_POST['term'])){
    $s_term = $_POST['term'];
    $sql = "SELECT command_name,command_description FROM command WHERE command_name LIKE '%{$s_term}%' ";
    $ste = addcslashes($sql);
    $ste = $db->query($sql);
    $result = $ste->fetchall(); 
    if(count($result) < 1){
        echo " لم يتم العثور على نتائج مشابه  ";       
    }  else {
        foreach ($result as $row){
            echo $row['command_name'].'<br>';
             echo $row['command_description'].'<br>';
        }    
    }
}
$db = null ; 
?>
