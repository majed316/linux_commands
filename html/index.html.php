<?php
/*
 * @Author : Majed Ali
 * @Author : GMajedli@gmail.com
 * 
 */
include 'header.html.php';
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
    <?php
    echo "<div class='row'>";
    foreach ($data as $cat) {
        $rowsCount = 0;
        if (isset($cat['commands'])) {
            echo "<div class='col-xs-12 col-sm-6 col-lg-4' id='column'>";
            echo "<div class='panel panel-default'>";
            echo "<div class='panel-heading'> {$cat['name']}</div>";
            echo "<table class='table table-hover'>";
            foreach ($cat['commands'] as $commands) {
                if ($rowsCount > 3){
                    break;
                }  else {
                    $rowsCount = $rowsCount + 1;
                }
                echo "<tr>";
                echo "<td><a href=command.php?command_id={$commands['command_id']}> {$commands['command_name']}</a></td>";
                if ($admin){
                    echo "<td><a href='delcommand.php?command_id={$commands['command_id']}'><img src='img/delete.png'></a> <a href='editcommand.php?command_id={$commands['command_id']}'><img src='img/edit.png'></a></td>";
                }
                echo "<td>". _limit($commands['command_description'], 35, '...'). "</td>";
                echo "<td dir='ltr'>";
                echo _limit($commands['command_form'], 10);
                echo "</td>";
                echo "</tr>";
            }
        }
            echo "</table>"; //end of panel-body div
            echo "</div>"; //end of panel div
            echo "</div>"; //end of column div
    }
    echo "</div>"; //end of row div
    //echo 'DataArray iterations: ' . $iteration . "\n"; //for debugging purpose.
    include 'footer.html.php';
    ?>