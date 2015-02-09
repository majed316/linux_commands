<!DOCTYPE >
<html>
	<?php include './inc/db.inc.php';?>

	<?php 
if(isset($_GET['ACTION'])){
	if($_GET['ACTION'] == 'INSERT'){ //$INSERT >>> values SEND of  index.php
		 $cat_id=$_GET['catname'];
		echo "<form>
			<input type='text' name='catname' /><br>
			<input type='hidden' name='sql' value='insert_sql' /><br>
			<input type='submit' value='save' /><br> 
			</form>"; 
}
	if($_GET['ACTION'] == 'UPDATE'){
		echo "<form>
			<input type='text' name='catname' value={$_GET['CAT_NAME']} /><br>
			<input type='hidden' name='sql' value='update_sql'/><br>
			<input type='hidden' name='cat_id' value='{$_GET['CAT_ID']}'/><br>
			<input type='submit' value='save' /><br> 
			</form>"; 
	}
	if($_GET['ACTION'] == 'DELETE'){
		$sql_com = "DELETE FROM command WHERE category_cat_id = {$_GET['CAT_ID']}";
		$sql_cat = "DELETE FROM category WHERE cat_id = '{$_GET['CAT_ID']}'";
		$db->query($sql_com);
		$db->query($sql_cat);
		echo "deleted successfully";
		
	}
}

if(isset($_GET['sql'])){
	if($_GET['sql'] == 'insert_sql'){
		$sql = "INSERT INTO category (name) VALUES ('{$_GET['catname']}')";
		$db->query($sql);
		echo "inserted successfully";
	}
	if($_GET['sql'] == 'update_sql'){
		$sql = "UPDATE category SET name = '{$_GET['catname']}' WHERE cat_id = {$_GET['cat_id']}";
		$db->query($sql);
		echo "updated successfully";
		
	}
}

?>
	</html> 
