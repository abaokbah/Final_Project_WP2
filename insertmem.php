<?php

    // Validate correct input and then add it to the database //
    session_start();
    include('connection.php');
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
           {
               htmlspecialchars($_POST["fname"]);
               strip_tags($_POST["fname"]);
               stripcslashes($_POST["fname"]);
               htmlspecialchars($_POST["lname"]);
               strip_tags($_POST["lname"]);
               stripcslashes($_POST["lname"]);
               htmlspecialchars($_POST["username"]);
               strip_tags($_POST["username"]);
               stripcslashes($_POST["username"]);
               htmlspecialchars($_POST["password"]);
               strip_tags($_POST["password"]);
               stripcslashes($_POST["password"]);
           }
    
    $fname=$_POST['fname']; $lname=$_POST['lname']; $gender=$_POST['gender'];
    $username=$_POST['username']; $password=$_POST['password'];
    mysql_query("INSERT INTO member(username, password, fname, lname, gender) "
            . "VALUE('$username', '$password', '$fname', '$lname', '$gender');");
    header("location: index.php");
    mysql_close($con);
?>
