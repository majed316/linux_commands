<?php
/*
 * addCommand.php
 * Author : Majed Ali
 * TODO LIST:
 * 1- Grab all Categories from database and display it in <select> tag.                                             DONE
 * 2- Make three input text (command, desc, syntax) and combine it in form with sumbit button.                      DONE
 * 3- make the form dynamic, so it can grow as far as the data submiter want.                                       DONE
 * 4- Make the form fallback to html in case the user doesn't use javascript.                                       DONE
 * 5- In case javascript submited the form, then collect all the <input> data and validate it, then seralize it.    DONE
 * 6- In case html submitted the form, just send the form as usual.                                                 DONE
 * 7- loop through the data recived and insert it in database in one big submition using PDO->excute();             DONE
 */
include './inc/db.inc.php';
try
{
    $catSql = 'SELECT * FROM category';
    $catResult = $db->query($catSql);
    $catRows = $catResult->fetchall();
} catch (PDOException $e) {
    $error = 'Error fetching rows: ' . $e->getMessage();
    include './html/error.html.php';
    exit();
}
?>
<html dir="rtl">
    <head>
        <meta charset="utf-8">
        <title>
            toDatabase
        </title>
    </head>
    <body>
        <form id="form1" action="addcommand.php" method="post">
            اختر التصنيف:
            <select id="cats" name="cat">
                <?php
                foreach ($catRows as $row) {
                    echo "<option value='{$row['cat_id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
            <br>
            <br>
        <table id="tbl">
            <thead>
                <tr>
                    <td>
                        الأمر
                    </td>
                    <td>
                        الوصف
                    </td>
                    <td>
                        صيغة الأمر
                    </td>
                </tr>
            </thead>
            <tbody id="tblbdy">
                <tr>
                    <td>
                        <input type="text" name="command">
                    </td>
                    <td>
                        <input type="text" name="desc" size="100" maxlength="500">
                    </td>
                    <td>
                        <input type="text" name="syntax">
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <input type="submit" id="submit" name="Send" value="حفظ" onClick="post('addcommand.php', returnValidatedData(), 'POST' )">
                    </td>
                </tr>
            </tfoot>
        </table>
        </form>
        <button onclick="newRow()">أضف صف</button>
        <pre>
<?php
if(isset($_REQUEST['data']) && $_REQUEST['data'] != ''){
    //echo $_REQUEST['data'];
    echo "submited with javascript<br>";
    $str = $_REQUEST['data'];
    $array = array();
    foreach (preg_split("/\n/", $str) as $line){
        $array[] = explode("|||", $line);
    }
    unset($array[count($array)-1]); // <---- to remove the last item in the array, not the best way but currently we will stick with it.
    $count = count($array);
}else if(isset($_REQUEST['command']) && 
        $_REQUEST['desc'] != ''   &&
        $_REQUEST['syntax'] != ''   &&
        $_REQUEST['cat'] != ''){
    echo "submited with html<br>";
    $array = array();
    $array[] = array($_REQUEST['command'], $_REQUEST['desc'], $_REQUEST['syntax'], $_REQUEST['cat']);
    $count = 1;
}
if(isset($array)){
    try{
        $STH = $db->prepare("INSERT INTO command (command_name, command_description, command_form, category_cat_id) values (?, ?, ?, ?)");
        foreach ($array as $row) {
            $STH->execute($row);
        }
        echo $count . " row/rows inserted.";
    } catch (PDOException $e) {
    $error = 'Error inserting rows: ' . $e->getMessage();
    include './html/error.html.php';
    exit();
}
}
?>
        </pre>
        <script src="JavaScript.js"></script>
    </body>
</html>