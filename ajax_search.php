<?php 
/*
 * Author by : Abdulrahman Abdullah on Date()
 * Edited by : Majed Ali on Date()
 * NEXT TODO LIST:
 * 1. format the output as links to the result page, or use anchor if the result in the same page.(index.html.php).
 * 2. search in another tables and fileds in database like (options, uses, commands names, commands descriptions).
 * 3. Limit the search result to limited number (i.e 5) then add "more" at the end if the search result is more than that limit.
 * 4. Let the user navigate through the results using arrows keys. <== should be moved to javascript file.
  */
 include './inc/db.inc.php' ; 
if(isset($_POST['term']) && !empty($_POST['term'])){
    $term = $_POST['term'];
    $s_term = addslashes($term);
    $sql = "SELECT * FROM command WHERE command_name LIKE '%{$s_term}%' OR command_description LIKE '%{$s_term}%' ";
    $ste = $db->query($sql);
    $result = $ste->fetchall(); 
    
    if(count($result) < 1){
        echo "No results found";
    }  else {
        echo '<ul>';
        foreach ($result as $row){
            //echo "<a href='{$row['command_name']}'>{$row['command_name']}</a>".'<br>';
            //echo "<a href='{$row['command_description']}'>{$row['command_description']}</a>".'<br>';
             //echo $row['command_description'].'<br>';
            echo "<a href=command.php?command_id={$row['command_id']}><li>{$row['command_name']} {$row['command_description']}</li></a>\r\n".'<br>';
        } echo '</ul>';  
    }
}
$db = null ; 
?>
