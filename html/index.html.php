<?php
session_start();
?>
<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/linux_commands/css/styles.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="search_php.js"></script>
        <title>
            TULCR - The Ultimate Linux Commands Reference
        </title>
    </head>
    <body>
        <input type="text" id="box" onkeyup="getAjxaData()" placeholder="أبحث" /> 

        <div id="result"></div>
        <?php
        if (isset($_SESSION['admin'])) {
            $admin = TRUE;
            $span = 4;
            echo "<a href='logout.php'>تسجيل خروج الأدمن</a><br>\n"; // <--| later you should move these three lines to header.php
            echo "<a href='addcommand.php'>إضافة أمر</a><br>\n"; // <------------|
            //echo "<a href='addcat.php'>إضافة تصنيف</a><br>\n"; // <--------------|
            echo "<a href='search.php'>بحث عن أمر</a><br>\n";
        } else {
            $admin = FALSE;
            $span = 3;
        }
        ?>
        <?php
        $iteration = 0;
        foreach ($catRows as $catKey => $catValue) {
            $data[$catKey] = $catValue;
            foreach ($commandRows as $key => $value) {
                if ($catValue['cat_id'] == $value['category_cat_id']) {
                    $data[$catKey]['commands'][$key] = $value;
                    unset($commandRows[$key]);
                }
                $iteration += 1; //for optimization purposes.
            }
        }
        ?>
        <table>
            <?php
            foreach ($data as $cat) {
                if (isset($cat['commands'])) {
                    echo "<tr>\r\n";
                    echo "<td colspan=$span>\r\n";
                    echo "<H1>" /* . $cat['cat_id'] . " :: " */ . $cat['name'] . "</H1>";
                    echo "</td>\r\n";
                    echo "</tr>\r\n";
                    echo "<tr>\r\n";
                    echo "<td>اسم الأمر</td>\r\n";
                    if ($admin)
                        echo "<td></td>\r\n";
                    echo "<td>وصف الأمر</td>\r\n";
                    echo "<td>صيغة الأمر</td>\r\n";
                    echo "</tr>\r\n";
                    foreach ($cat['commands'] as $commands) {
                        echo "<tr>\r\n";
                        echo "<td><a href=command.php?command_id={$commands['command_id']}> {$commands['command_name']}</a></td?>\r\n";
                        if ($admin)
                            echo "<td><a href='delcommand.php?command_id={$commands['command_id']}'><img src='img/delete.png'></a> <a href='editcommand.php?command_id={$commands['command_id']}'><img src='img/edit.png'></a></td>\r\n";
                        echo "<td>" . $commands['command_description'] . "</td>\r\n";
                        echo "<td dir=ltr>" . $commands['command_form'] . "</td>\r\n";
                        echo "</tr>\r\n";
                    }
                }
            }
            echo "</table>\r\n";
            echo 'DataArray iterations: ' . $iteration; //for debugging purpose.
            ?>
    </body>
</html>