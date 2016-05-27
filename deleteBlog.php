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
              
              $id = $_POST['y'];
              $sql = "DELETE FROM abaokbah.fp_blog WHERE blog_id='$id'";
              $result = mysql_query($sql);
             
              echo"<h2> Deleted Successfully! </h2>";
              echo "<a href='index.php' >Main Menu</a>";
              
              mysql_close($con);
              
        ?>
    </body>
</html>
