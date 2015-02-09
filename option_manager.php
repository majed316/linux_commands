<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './inc/db.inc.php';
if (isset($_GET['Action'])) {
    if ($_GET['Action'] == "Add") {
        ?>
        <form>
            <input type="text" name="command"><br>
            <input type="text" name="desc"><br>
            <input type="hidden" name="sql" value="sql_add">
            <input type="hidden" name="command_id" value="<?php echo $_GET['command_id'] ?>">
            <input type="submit" value="save">
        </form>
    <?php }
    if ($_GET['Action'] == "Edit") {
        ?>
        <form>
            <input type="text" name="command"><br>
            <input type="text" name="desc"><br>
            <input type="hidden" name="sql" value="sql_edit">
            <input type="hidden" name="option_id" value="<?php echo $_GET['option_id'] ?>">
            <input type="submit" value="save">
        </form>
    <?php
    }
    if (addslashes($_GET['Action'] == "Delete")) {
        $sql = "DELETE FROM  options WHERE option_id = {$_GET['option_id']} ";
        $db->query($sql);
        echo "deleting option successfully "; 
        
    }
}

if(isset($_GET['sql'])){
    if(addslashes($_GET['sql'] == 'sql_add') ){
        $sql = "INSERT INTO `options` (`option`, `option_desc`, `command_command_id`) VALUES ('{$_GET['command']}', '{$_GET['desc']}', '{$_GET['command_id']}')";
        $db->query($sql);
        echo "added successfully!";
    }
    if(addslashes($_GET['sql'] == 'sql_edit')){
        $sql = "UPDATE `options` SET `option`='{$_GET['command']}',`option_desc`='{$_GET['desc']}'  WHERE option_id ='{$_GET['option_id']}'";
        $db->query($sql);
        echo "updated successfully";
    }
}
