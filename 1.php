<?php
 function pascal($jumlah){
    for($i=1;$i<=$jumlah;$i++)
    {
     for($j=1;$j<=$i;$j++)
     {
      if($j==1 || $j==$i)
      {
       $value[$i][$j]=1;
      }
      else
      {
       $value[$i][$j]=$value[$i-1][$j] + $value[$i-1][$j-1];
      }
      echo $value[$i][$j]." ";
     }
     echo "</center><br>";
    }
 }

 pascal(4);
?>