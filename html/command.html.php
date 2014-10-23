<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>command details</title>
        <style>
            H2, H3, #Mdesc{
                text-align:center;
            }
            h2, h3{
                
            }
            #options{
                width:50%;
                float:left;
            }
            #uses{
                width:50%;
                float:left;
            }
            div #options div.row:nth-child(even){
                background-color:lightgray;
            }
            div #uses div.row:nth-child(even){
                background-color:lightgray;
            }
            .row{
                padding:2px;
                margin:2px;
            }
            .desc{
                direction:rtl;
            }
            pre{
                white-space:pre-wrap;
            }
        </style>
    </head>
    <body>
        <div id="command">
            <H2><?php echo $commandRow[0]['command_name'] ?></H2>
            <p id="Mdesc"><?php echo $commandRow[0]['command_description'] ?></p>
            <div id="options">
                <H3>خيارات الأمر</H3>
                <?php
                    foreach($optionsRows as $option){
                        echo "<div class='row'><div class='command'>{$option['option']}</div> <div class='desc'><pre>{$option['option_desc']}</pre></div></div>";
                    }
                ?>
            </div>
            <div id="uses">
                <h3>استخدامات مفيدة</h3>
                <?php
                    foreach($usesRows as $use){
                        echo "<div class='row'><div class='command'>{$use['command']}</div> <div class='desc'><pre>{$use['command_description']}</pre></div></div>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>