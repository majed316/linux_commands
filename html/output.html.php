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
        <!--<p>
        <pre>
            <?php //print_r($catRows) ?>
        </pre>
        <pre>
            <?php //print_r($commandRows); ?>
        </pre>
        </p>
        -->        
        <?php
        $iteration = 0;
        foreach ($catRows as $catKey=>$catValue){
            //print_r($catValue);
            $data[$catKey] = $catValue;
            foreach ($commandRows as $key => $value){
                if ($catValue['cat_id'] == $value['category_cat_id']){
                    //print_r($value);
                    $data[$catKey]['commands'][$key] = $value;
                    unset($commandRows[$key]);
                }
                $iteration += 1;
                }
        }
        //print_r($data);
        //}
       
        /* Building the $data Array Start here
        $data = array();
        $count = 0;
        for ($i=0; $i < count($catRows); $i++){
            //print_r($catRows[$i]);
            $data[$i] = $catRows[$i];
            for ($j=0; $j < count($commandRows); $j++){
                if ($catRows[$i]['cat_id'] == $commandRows[$j]['category_cat_id']){
                    $data[$i]['commands'][$j] = $commandRows[$j];
                    //print_r($commandRows[$j]);
                    //array_splice($commandRows, $j, $j-1);
                    //unset($commandRows[$j]);
                    //$commandRows = array_values($commandRows);
                }
            $count += 1;
        }
        }
        //echo $count;
        //print_r($data);*/
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
                echo "<td>" . $commands['command_discription'] . "</td>\r\n";
                echo "<td dir=ltr>" . $commands['command_form'] . "</td>\r\n";
                echo "</tr>\r\n";
            }
        }
        echo "</table>\r\n";
    /* Using foreach
    foreach($catRows as $mainRow){
    print_r($mainRow);
    foreach($commandRows as $branchRow){
        if ($mainRow['cat_id'] == $branchRow['category_cat_id'])
        print_r($branchRow);
    $count = $count + 1;
    }
    }
    echo $count;*/
        echo 'DataArray iterations: ' . $iteration
?>
    </body>
</html>