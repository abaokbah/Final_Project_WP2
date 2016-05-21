<?php
    include("connection.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    //Change caption//
    $pic = filter_input(INPUT_GET, 'q');
    $cap = filter_input(INPUT_GET, 'c');
    
    $cap = str_replace('\'', '\\\'', $cap);
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
       htmlspecialchars($cap);
       strip_tags($cap);
       stripcslashes($cap);
       
       htmlspecialchars($pic);
       strip_tags($pic);
       stripcslashes($pic);
    }
    

    $sql = "UPDATE mempics SET caption='" . $cap . "' WHERE picname='". $pic."'";
    $result = mysql_query($sql);
?>