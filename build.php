<?php

include "conn.php";



for($i = 0 ; $i < 50 ; $i++)
{

    $file = file_get_contents("https://loripsum.net/api/5",true);
    $utime = time();
    $quary = "INSERT INTO `bposts`( `content`, `date`) VALUES ('" .$file ."', $utime)";
    $result  = mysqli_query($link , $quary);
    
}
