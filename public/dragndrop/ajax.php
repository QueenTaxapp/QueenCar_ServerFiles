<?php
 $data =  $_POST["value"];

 $path =  $_POST["path"];



    $has = @get_headers($path);

    if($has[0] == 'HTTP/1.1 200 OK')
    {

        file_put_contents("./array.json","".$data.""); 
     
    }

    
?>