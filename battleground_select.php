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
            include("connection.php");
                $temp = filter_input(INPUT_GET, 'b');//hero_select1
                
                
                if($_SERVER["REQUEST_METHOD"] == "GET")
                {
                   htmlspecialchars($temp);
                   strip_tags($temp);
                   stripcslashes($temp);
                }
                
                //echo"<script>console.log(".$temp1.");</script>";
                
                $sql = "UPDATE member SET battleground = '".$temp."'WHERE username='".$username."';";
                $result = mysql_query($sql);
                //header("location: profile.php");
        ?>
    </body>
</html>
