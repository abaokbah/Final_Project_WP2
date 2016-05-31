<?php
    session_start();
    include("connection.php");
    $cap = $_POST['caption'];
    if($_SERVER["REQUEST_METHOD"] == "POST")
           {
               htmlspecialchars($cap);
               strip_tags($cap);
               stripcslashes($cap);
           }
    
    $filename = $_FILES["myfile"]["name"];
    debug_to_console($filename);
    $filename = str_replace(' ', '', $filename);
    $allowed_Ext = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $filename);
    $ext = end($temp);
    if ((($_FILES["myfile"]["type"] == "image/gif") ||
            ($_FILES["myfile"]["type"] == "image/jpeg") ||
            ($_FILES["myfile"]["type"] == "image/jpg") ||
            ($_FILES["myfile"]["type"] == "image/pjpeg") ||
            ($_FILES["myfile"]["type"] == "image/x-png") ||
            ($_FILES["myfile"]["type"] == "image/png")) &&
            ($_FILES["myfile"]["size"] < 1048576) &&
            in_array($ext, $allowed_Ext)) {
        if ($_FILES["myfile"]["error"] > 0) {
            echo "<br>";
            echo "Return Code: " . $_FILES["myfile"]["error"] . "<br>";
        } else {
            if (file_exists("./pics/" . $filename)) {
                //echo "File already exsists.";
            } else {
                move_uploaded_file($_FILES["myfile"]["tmp_name"], "./pics/" . $filename);
                
                //echo $_FILES["myfile"]["tmp_name"];
                //echo "./pics/" . $filename;
            }
            echo "<center><img src= ./pics/" . $filename . "><center>";
            array_push($_SESSION['pics'], $filename);
            $pic=$filename;
            $user = $_SESSION['SESS_FIRST_NAME'];
            
            mysql_query("INSERT INTO abaokbah.mempics(membername, picname, caption)"
                    ."VALUES('$user', '$pic', '$cap')");
            mysql_query("UPDATE member SET member.rank = member.rank + 1 where username ='".$_SESSION['SESS_FIRST_NAME']."';");
        }
    } else {
        echo "<br>";
        echo "File Invalid";
        echo "<br>";
    }
    //setcookie("list", serialize($_SESSION["pics"]), time() + (60*60*24*7));
?>


<?php

function debug_to_console( $data ) {

    $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
    echo $output;
}

?>