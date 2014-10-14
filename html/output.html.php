<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta charset="utf-8">
        <title>
            OutPut Page
        </title>
        <style>
            body{
                width:960px;
                margin:0 auto;
            }
            table, td{
                border: 1px solid black;
            }
            table{
                width:100%;
            }
        </style>
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
            echo "<td>id</td>\r\n";
            echo "<td>اسم الأمر</td>\r\n";
            echo "<td>وصف الأمر</td>\r\n";
            echo "<td>صيغة الأمر</td>\r\n";
            echo "</tr>\r\n";
            foreach($cat['commands'] as $commands){
                echo "<tr>\r\n";
                echo "<td>" . $commands['command_id'] . "</td>\r\n";
                echo "<td>" . $commands['command_name'] . "</td>\r\n";
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