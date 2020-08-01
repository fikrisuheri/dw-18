<?php

function hitung($voucher,$uang){
    
    $resultDiskon;

    if($voucher == 'DumbWaysJos'){
        if($uang >= 50000){
            $diskon = (21.1 / 100) * $uang;
            if($diskon > 20000){
                $resultDiskon = 20000;
            }else{
                $resultDiskon = $diskon;
            }
        }else{
            echo 'Tidak memenuhi kriteria diskon';
        }
    }else if($voucher == 'DumbWaysMantap'){
        if($uang >= 80000){
            $diskon = (30/ 100) * $uang;
            if($diskon > 40000){
                $resultDiskon = 40000;
            }else{
                $resultDiskon = $diskon;
            }
        }else{
            echo 'Tidak memenuhi kriteria diskon';
        }
    }


    $bayar = $uang - $resultDiskon;
    $kembalian = $uang - $bayar;
    echo "- Uang yang harus dibayar : " . $bayar . '</br>'; 
    echo "- Diskon : " . $resultDiskon . '</br>'; 
    echo "- Kembalian : " . $kembalian . '</br>'; 
}

hitung('DumbWaysJos', 100000);

?> 