<?php
		$fileName = '331.webm';
        $uploadDirectory = $fileName;
        
//        if (!move_uploaded_file($_FILES["${type}-blob"]["tmp_name"], $uploadDirectory)) {
  //          echo(" problem moving uploaded file");
    //    }
        $file = '331.webm';
        // Open the file to get existing content
        //$current = file_get_contents($);
        // Append a new person to the file
        $current = "John Smith\n";
        // Write the contents back to the file
		//file_put_contents($file,$_FILES['file']['tmp_name']);
    $fname = "11" . ".webm";
    $target_dir = "business-ads/";
    echo $_FILES["${type}-blob"]["tmp_name"];
    if(move_uploaded_file($_FILES["${type}-blob"]["tmp_name"], $target_dir)){
        echo 'ok';
    }
    else{
        echo 'nok';
    }
    echo 'yash';
?>