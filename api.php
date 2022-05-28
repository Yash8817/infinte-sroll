<?php

    include "conn.php";

    $myarry = array();
    $myrow = array();

    if(empty($_POST['iload']))
    {
        $vlimit  = 1 ; 
    }
    else
    {
        $vlimit = $_POST['iload'];
    }
    $myarry['vlimit'] = $vlimit;

    if(isset($_POST['oset']))
    {
        $oset = $_POST['oset'];
    }
    else
    {
        $oset  = 1 ; 
    }
    $myarry['oset'] = $oset;
    
    
    
    $quary = "SELECT * FROM bposts ORDER BY id LIMIT ". $vlimit ." OFFSET ". $oset ;
    $myarry['quary'] = $quary;
    $result = mysqli_query($link , $quary);
    
    while($row = mysqli_fetch_array($result))
    {
        $myrow[] = array(
            "id" => $row['id'],
            "content" => $row['content'],
            "date" => $row['date']
        );
        }


        $myarry['content'] = $myrow;

        echo json_encode($myarry);
?>