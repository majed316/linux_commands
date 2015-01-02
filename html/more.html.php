<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'header.html.php';
echo "<div class='row'>";
            echo "<div class='col-xs-12 col-sm-12 col-lg-12 column'>";
            echo "<div class='panel panel-default back'>";
            $color = dechex($CategoryRow['cat_color']);
            echo "<div class='panel-heading'><img class='cat_image' src='$images_folder{$CategoryRow['image']}'><h3 style='color: #$color' class='cat_names'>{$CategoryRow['name']}</h3></div>";
            echo "<table class='table table-hover pbody'>";
            foreach ($commandRows as $commands ){
                echo "<tr>";
                echo "<td><a href=command.php?command_id={$commands['command_id']}> {$commands['command_name']}</a></td>";
                if ($admin){
                    echo "<td><a href='delcommand.php?command_id={$commands['command_id']}'><img src='img/delete.png'></a> <a href='editcommand.php?command_id={$commands['command_id']}'><img src='img/edit.png'></a></td>";
                }
                echo "<td>". $commands['command_description']. "</td>";
                echo "<td dir='ltr'>";
                echo $commands['command_form'];
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>"; //end of panel div
            echo "</div>"; //end of column div
    echo "</div>"; //end of row div
include 'footer.html.php';