<?php


    // Had to change my connection method from sqli_connect() to sql_connect()
    // because of the Zend version Webbox is supporting



    /*$con = mysqli_connect("localhost", "abaokbah", "Po77YgV07B", "abaokbah") or die("Could not connect database");
    mysqli_select_db($con, "abaokbah") or die("Could not select database");*/
    
    $username = "abaokbah";
    $password = "naypIn.nat";
    $database = "abaokbah";
    
    $con = mysql_connect("localhost", $username, $password, $database) or die("Could not connect database");
    mysql_select_db($database) or die("Could not select database");
?>