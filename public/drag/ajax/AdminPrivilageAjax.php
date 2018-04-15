<?php
   
   

    if(isset($_POST['value']))
    {
         $value = $_POST['value'];
    }
    else
    {
        $value = array();
    }

    $filePath = $_POST['filePath'];
  
    //$myfile = fopen($filePath, "r+") or die("Unable to open file!");
    
    $fullPath = $_POST['fullPath'];

    $has = @get_headers($fullPath);

    if($has[0] == 'HTTP/1.1 200 OK')
    {
        
          $ValueOnFile =  file_get_contents($filePath); 

          $ValueOnFile = json_decode($ValueOnFile, TRUE);

          $array = array('dashboard'=>$value);

          $newArray = array();
          $newArray ['module'] = $ValueOnFile['module'];
          $newArray ['sub_module'] = $ValueOnFile['sub_module'];
          $newArray ['dashboard'] = $value;

          $JsonEncodedNewArray =  json_encode($newArray);

          print_r($JsonEncodedNewArray);

        file_put_contents($filePath,"".$JsonEncodedNewArray."");
    }

    
?>