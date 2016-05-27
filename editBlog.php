<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="AssignmentStylesheet.css">
        <title></title>
    </head>
    <body id="body">
	
    <?php
          include("connection.php");
          session_start();
          $id = $_SESSION['blog_id_temp'];
          //$sql = "DELETE FROM fp_blog WHERE blog_id='$id'";
          //$result = mysqli_query($con, $sql);
          $sql = "SELECT * from abaokbah.fp_blog WHERE blog_id=$id";
          $result = mysql_query($sql);
          $row = mysql_fetch_array($result);
          $title = $row['blog_title'];
          $blog = $row['blog'];

          $mem_name = $row['memname'];




          echo'<form name="myForm" action="" method="POST" onsubmit=" return validateForm();">';
            echo "<h5>Blog Title:<br> <input id='title' type='text' name='fTitle' value='$title' size='40'></h5>";
            echo '<!img class="hint" src="hint.jpg" title="Name must be from 3 to 10 (No symbols or numbers) ">';





            echo'<h5>Blog:</h5>';
            echo'<br>';
            echo"<textarea id='blog' name='fblog' rows='30' cols='135'> $blog</textarea>";
            echo'<input id="mybutton" name="submit" type="submit" value="submit">';
        echo'</form>';

         if (isset($_POST['submit'])) {

                     $title = $_POST['fTitle'];

                     $blog=$_POST['fblog'];
                     $sq = "UPDATE abaokbah.fp_blog SET blog='$blog',"
                             . "blog_title='$title'"
                             . "WHERE blog_id='$id'";
                     $final_result = mysql_query($sq);
                     echo "<script> setTimeout(function() {window.location = 'profile.php' }) </script>";
                mysql_close($con);
        }
                    
              
              
              
              
        ?>
	<script>
        function validateForm() {
            var msg = '';
            msg+=validateBlogTitle();
            msg+=validateBlog();

            if(msg.length>2)
            {
                alert(msg);
                return false;
            }
           //return false;
           else
           {
               return true;
           }
        }
        function validateBlogTitle() {
            var msg = '';
            var x = document.forms["myForm"]["fTitle"].value;
            var re = /^[a-z A-Z 0-9]*$/;
            if (x==null || x=="" || !(x.match(re))) {
               // document.getElementById('first').style.borderColor = "red";
                document.getElementById('title').style.border = "2px solid red";
                //document.getElementById('first').style.backgroundColor = "red";
                msg ="Title must be legal \n";
                //alert("First name must be filled out");
                return msg;
            }
            else
            {
                document.getElementById('title').style.border = "0px";
            }
            return msg;
        }
        function validateBlog() {
            var msg = '';
            var x = document.forms["myForm"]["fblog"].value;
            var re = /^[a-z A-Z 0-9 ^\n]*$/;
            if (x==null || x=="" || !(x.match(re))) {
               // document.getElementById('first').style.borderColor = "red";
                document.getElementById('blog').style.border = "2px solid red";
                //document.getElementById('first').style.backgroundColor = "red";
                msg ="Blog must be legal \n";
                //alert("First name must be filled out");
                return msg;
            }
            else
            {
                document.getElementById('blog').style.border = "0px";
            }
            return msg;
        }
        </script>
        <div id="footer">Copyright © Computerscience.du.edu</div>
    </body>
	
</html>
