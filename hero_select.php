<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                session_start();
                include("connection.php");
                $temp1 = filter_input(INPUT_GET, 'h1');//hero_select1
                $temp2 = filter_input(INPUT_GET, 'h2');//hero_select2
                $temp3 = filter_input(INPUT_GET, 'h3');//hero_select3
                
                if($_SERVER["REQUEST_METHOD"] == "GET")
                {
                   htmlspecialchars($temp1);
                   strip_tags($temp1);
                   stripcslashes($temp1);

                   htmlspecialchars($temp2);
                   strip_tags($temp2);
                   stripcslashes($temp2);
                   
                   htmlspecialchars($temp3);
                   strip_tags($temp3);
                   stripcslashes($temp3);
                }
                
                //echo"<script>console.log(".$temp1.");</script>";
                
                echo $_SESSION['SESS_FIRST_NAME'];
                $sql = "UPDATE member SET fav_hero1 = '".$temp1."', fav_hero2 = '".$temp2."', fav_hero3 = '".$temp3."' WHERE username='".$_SESSION['SESS_FIRST_NAME']."';";
                $result = mysql_query($sql);
                //header("location: profile.php");
        ?>
    </body>
</html>
