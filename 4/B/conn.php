<?php
function jalan($sql){
    $conn = mysqli_connect('localhost','root','','dw-18');
    return $result =  mysqli_query($conn,$sql);
}