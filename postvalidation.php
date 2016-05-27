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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
                      $user = $_SESSION['SESS_FIRST_NAME'];
                         
                         $title = $_POST['fTitle'];
                         
                         $blog=$_POST['fblog'];
                         
                         $sq = "INSERT INTO abaokbah.fp_blog (blog, blog_title, memname) "
                                 . "VALUES ('$blog', '$title', '$user')";
                         $final_result = mysql_query($sq); 
                    mysql_close($con);
            }
        ?>
    </body>
</html>
