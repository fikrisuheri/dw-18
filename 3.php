<?php
$text = "alagcgcdodol";
//conversi text ke array
$converArray = str_split($text);

foreach($converArray as $row){
    if($row == 'a' || $row == 'i' || $row == 'u' || $row == 'e' || $row == 'o'){
       
    }else{
        echo $row;
    }
}
?>