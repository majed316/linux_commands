<?php
include 'header.html.php';
        ?>
        <div id="command">
            <H2><?php echo $commandRow[0]['command_name'] ?></H2>
            <p id="Mdesc"><?php echo $commandRow[0]['command_description'] ?></p>
            <div class="row">
                <div class="col-md-6" id="options">
                <H3>خيارات الأمر</H3>
                <?php
                    foreach($optionsRows as $option){
                        echo "<div class='row'><div class='command'>{$option['option']}</div> <div class='desc'><pre>{$option['option_desc']}</pre></div></div>";
                    }
                ?>
            </div>
                <div class="col-md-6" id="uses">
                <h3>استخدامات مفيدة</h3>
                <?php
                    foreach($usesRows as $use){
                        echo "<div class='row'><div class='command'>{$use['command']}</div> <div class='desc'><pre>{$use['command_description']}</pre></div></div>";
                    }
                ?>
            </div>
                </div>
            </div>
        </div>
<?php
include 'footer.html.php';
?>