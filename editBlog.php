<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html id='html'>
    <head>
        <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="AssignmentStylesheet.css">
        <title>The Colosseum | Edit</title>
    </head>
    <body id="body">
        <style>
            
            h5{
                font-size:16px;
            }
            
        </style>
        <table class="upperBanner">
            <a href="home.php">
                <center><img id="upbanner" src="HOTS-Open-Beta-screen.png" alt="heroes background" 
                            width="100%" height="210">
                </center></a>
        </table> 
        <!-- Content menu section -->
        <table id="menutable">
            <tr>
                <td><a id="home" href="home.php">HOME</a></td>
                <td><a id="profile" href="profile.php">PROFILE</a></td>
                <td><a id="about" href="about.php">ABOUT</a></td>
                <td><a id="upcoming" href="index.php">LOGOUT</a></td>
            </tr>
        </table>
    <!-- Styling pillars section section -->
    <span id="rightpillar"></span>
    
    <span id="leftpillar"></span>
	<script>
        function col(a){
            var foo = document.getElementsByTagName('li');
            var foo2 = document.getElementsByTagName('p');
            var foo3 = document.getElementsByTagName('div');
            var foo4 = document.getElementsByTagName('span');
            for(i=0;i<foo.length;i++){
                foo[i].style.color=a;
            }
            for(i=0;i<foo2.length;i++){
                foo2[i].style.color=a;
            }
            for(i=0;i<foo3.length;i++){
                foo3[i].style.color=a;
            }
            for(i=0;i<foo4.length;i++){
                foo4[i].style.color=a;
            }
        }
    </script>
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





            echo"<h5 style='margin-bottom:0px;'>Blog:</h5>";
            echo"<textarea id='blog' name='fblog' rows='30' cols='135' style='width:85%; height:150px; margin-left:30px;'> $blog</textarea>";
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
                    
            if(isset($_SESSION['col'])||isset($_SESSION['col2']))   
        {
            $color = $_SESSION['col'];
            $color2 = $_SESSION['col2'];
           echo "<script type='text/javascript'>document.getElementById('html').style.backgroundColor =\" ".$color."\"</script> ";
	    echo "<script type='text/javascript'>document.getElementById('html').style.color =\" ".$color2."\"</script> ";
            echo "<script type='text/javascript'>document.getElementById('body').style.backgroundColor =\" ".$color."\"</script> ";
	    echo "<script type='text/javascript'>document.getElementById('body').style.color =\" ".$color2."\"</script> ";
            //echo "<script type='text/javascript'>document.getElementsByTagName('html')[0].style.backgroundColor =\" ".$color."\"</script> ";
	    //echo "<script type='text/javascript'>document.getElementById('info').style.color =\" ".$color2."\"</script> ";
            echo "<script type='text/javascript'>col('$color2');</script>";
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
        <div id="footer"> Copyrights go to Ali Baokbah, Mansour Malaika and University of Denver, CS Department. &copy </div>
    </body>
	
</html>
