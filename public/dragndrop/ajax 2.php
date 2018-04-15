<?php
// $row =  $_POST["row"];

// $column =  $_POST["column"];
 $row =  5;

 $column =  6;
if($column == 3)
{
$size = 'col-sm-4';
}
else
{
    $size = 'col-sm-3';
}
?>

 
<?php

        for($i = 1 ;$i<= $row;$i++)
        {
            
?>
                <div class="<?php echo $size?>">
                        
                        <div id ="<?php echo 'a'.$i?>" class="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                        </div>
                </div>
<?php
         }
?>
