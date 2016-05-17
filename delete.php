<?php
    include("connection.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    // Delete a picture //

    $temp = filter_input(INPUT_GET, 'q');
    $sql = "DELETE FROM mempics WHERE picname='" . $temp . "';";
    $result = mysql_query($sql);
    header("location: profile.php");
?>