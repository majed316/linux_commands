<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/linux/css/styles.css"/>
        <title>
            TULCR - The Ultimate Linux Commands Reference
        </title>
    </head>
    <body>
        <?php
        $iteration = 0;
        foreach ($catRows as $catKey=>$catValue){
            $data[$catKey] = $catValue;
            foreach ($commandRows as $key => $value){
                if ($catValue['cat_id'] == $value['category_cat_id']){
                    $data[$catKey]['commands'][$key] = $value;
                    unset($commandRows[$key]);
                }
                $iteration += 1; //for optimization purposes.
                }
        }
        ?>
        <table>
        <?php
        foreach($data as $cat){
            echo "<tr>\r\n";
            echo "<td colspan=5>\r\n";
            echo "<H1>" /*. $cat['cat_id'] . " :: " */. $cat['name'] . "</H1>";
            echo "</td>\r\n";
            echo "</tr>\r\n";
            echo "<tr>\r\n";
            echo "<td>اسم الأمر</td>\r\n";
            echo "<td>وصف الأمر</td>\r\n";
            echo "<td>صيغة الأمر</td>\r\n";
            echo "</tr>\r\n";
            foreach($cat['commands'] as $commands){
                echo "<tr>\r\n";
                echo "<td><a href=command.php?command_id={$commands['command_id']}> {$commands['command_name']}</a></td?>\r\n";
                echo "<td>" . $commands['command_description'] . "</td>\r\n";
                echo "<td dir=ltr>" . $commands['command_form'] . "</td>\r\n";
                echo "</tr>\r\n";
            }
        }
        echo "</table>\r\n";
        echo 'DataArray iterations: ' . $iteration; //for debugging purpose.
?>
    </body>
</html>