
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
    require_once('auth.php');
    if (!isset($_SESSION["pics"]))
    {
        //A session variable that is an array to hold the
        //pictures.
        $_SESSION["pics"] = array();
    }
    include("connection.php");
?>
<html id="html">
    <head>
    <meta charset="UTF-8">
    <title>The Colosseum | Home page</title>
    <link rel="stylesheet" type="text/css" href="AssignmentStylesheet.css">
    <style>
        
    </style>
    </head>
     
    <body id='body'>
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
        function validateForm() {
	//alert("sdasda");
            var msg = '';
            msg+=validateEntries();


            if(msg.length>2)
            {

                alert(msg);
                <?php $thrall = "false";?>
                return false;
            }
           //return false;
           else
           {
               <?php $thrall = "true";?>
               return true;
           }
        }
        function validateEntries() {
            var msg = '';
            var x = document.forms["entries_form"]["num_entries"].value;
            var re = /^[0-9]*$/;
            if (x==null || x=="" || !(x.match(re))) {
               // document.getElementById('first').style.borderColor = "red";
                document.getElementById('num_entries').style.border = "2px solid red";
                //document.getElementById('first').style.backgroundColor = "red";
                msg ="Input must be a number \n";
                //alert("First name must be filled out");
                return msg;
            }
            else
            {
                document.getElementById('num_entries').style.border = "0px";
            }
            return msg;
        }
    </script>
        <?php 
            $user = $_SESSION['SESS_FIRST_NAME'];
            //echo $user;
           if(isset($_SESSION['col'])||isset($_SESSION['col2']))   
                    {
                        $color = $_SESSION['col'];
                        $color2 = $_SESSION['col2'];
                        echo "<script type='text/javascript'>document.getElementById('body').style.backgroundColor =\" ".$color."\"</script> ";
                        echo "<script type='text/javascript'>document.getElementById('body').style.color =\" ".$color2."\"</script> ";
                        echo "<script type='text/javascript'>document.getElementById('html').style.backgroundColor =\" ".$color."\"</script> ";
                        echo "<script type='text/javascript'>document.getElementById('html').style.color =\" ".$color2."\"</script> ";
                        //echo "<script type='text/javascript'>document.getElementsByTagName('P').style.backgroundColor =\" ".$color."\"</script> ";
                        //echo "<script type='text/javascript'>document.getElementsByTagName('P').style.color =\" ".$color2."\"</script> ";
                        echo "<script type='text/javascript'>col('$color2');</script>"; 
                    }
            if(isset($_POST['submit2']))   
            {
                $color = $_POST['color_choice'];
                $color2 = $_POST['color_choice2'];
                echo "<script type='text/javascript'>document.getElementById('body').style.backgroundColor =\" ".$color."\"</script> ";
                echo "<script type='text/javascript'>document.getElementById('body').style.color =\" ".$color2."\"</script> ";
                echo "<script type='text/javascript'>document.getElementById('html').style.backgroundColor =\" ".$color."\"</script> ";
                echo "<script type='text/javascript'>document.getElementById('html').style.color =\" ".$color2."\"</script> ";
                //echo "<script type='text/javascript'>document.getElementsByTagName('P').style.backgroundColor =\" ".$color."\"</script> ";
                //echo "<script type='text/javascript'>document.getElementsByTagName('P').style.color =\" ".$color2."\"</script> ";
                echo "<script type='text/javascript'>col('$color2');</script>";

                $_SESSION["col"] = $color;
                $_SESSION["col2"] = $color2;
            }
        //global $thrall;
                //$thrall = "false";
        ?>
        <!-- Header section -->
        <table class="upperBanner">
            <a href="home.php">
                <center><img id="upbanner" src=" HOTS-Open-Beta-screen.png" alt="heroes background"
                            width="100%" height="200">
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
        
        <form id="color_form" method="POST">
		 <h2 style='margin:0px;'> Please choose your page style</h2><br>
		 <h7> Background color </h7>
            <!input id="txt_list" list="color" name="color_choice">
            <!datalist id="color">
            <select name='color_choice' id='c'>
                <option value="#528C05">Challenger Chartreuse</option>
                <option value="#8345A6">Daring Purple</option>
                <option value="Crimson">Pioneer Crimson</option>
                <option value="Grey">Grey</option>
                <option value="#5F3C6B">Original</option></select>
            
        
		
            <h7> Text color </h7>
            <!input id="txt_list2" list="color2" name="color_choice2">
            <!datalist id="color2">
            <select name='color_choice2' id='c2'>
            <option value="Black">Black</option>
            <option value="White">White</option>
            <option value="Gold">Gold</option>
            <option value="#00A7B0">Blue</option></select>
            <input id="submit_left" name="submit2" type="submit"> 
        </form>
    <!-- Styling pillars section section -->
    <span id="rightpillar">
        
    </span>
    
    <span id="leftpillar">
        
    </span>
    
    <!-- Photo streaming code section -->
        <div>
            <div>
                <form id="myform" method="post" enctype="multipart/form-data">
                    <center><h2>Welcome to the Hero Colosseum</h2></center>
                    <center><span style='font-family:monaco;'>Add caption: </span><input type="text" name="caption"></center>
                    <center><input type="file" name="myfile" id="file">
                    <input type="button" id="upload" onclick="sendInfo();"  value="Upload"></center>
                </form>
                <!-- Blog form -->
                <center><form id="myform2" method="post" enctype="multipart/form-data" style="margin:2px;">
                    
                    
                    <h5 style="margin:2px;">Blog Title:<br> <input id="title" type="text" name="fTitle" size="40"></h5>
                    <h5 style="margin:2px;">Blog Content:</h5>
                
                    <textarea name="fblog" id="blog" class='blog' rows="30" cols="135" style="width:85%; height:150px;"></textarea>
                <input name="Upload" type="button" id="Upload" onclick="sendPost();"  value="Post">
                </form></center>
            </div>
         
            <br>
        </div>
    
    <form name="entries_form" id="entries_form" action="home.php" method="POST" onsubmit=" return validateForm();">
		 <h7> Choose number of entries: </h7>
            <input type="text" id="num_entries" name="num_entries" value="10">
            <br>
            <input id="submit" name="submit" type="submit"> 
        </form>
    
    <div id="content">
        <div id = 'display'>
                <?php // actual url is: http://webbox.cs.du.edu/~abaokbah/FinalProject/profile.php?name=
                    //$result = mysql_query("select * from abaokbah.mempics ORDER BY PID DESC");
                if($thrall=="true" && isset($_POST["submit"]))
		{
                    
			$num=$_POST["num_entries"];
			$_SESSION["num"]=$num;
                        $thrall = 'false';
                   
		}
		else{
			if(isset($_SESSION["num"]))
			{
				$num=$_SESSION["num"];
			}
			else{
				$num=10;
			}
			
		}
                if(isset($_GET["page"]))
                {
		  $page=$_GET["page"];
       	        }
		else{
                   $page="1";
		}
			  
		if($page=="" || $page=="1")
		{
                    $page1=0;
		}
		else{
		     $page1=($page*$num)-$num;
		}
                
                $pic = false;
                $result = mysql_query("SELECT OrderDate, membername FROM mempics UNION SELECT OrderDate, memname FROM fp_blog ORDER BY OrderDate DESC "
                        . "LIMIT $page1,$num");
                $yes = true;
                    while($row = mysql_fetch_array($result)) 
                    {
                        $temp_blog = mysql_query("SELECT * from abaokbah.fp_blog where OrderDate = '".$row['OrderDate']."'");
                        $temp_pic = mysql_query("SELECT * from abaokbah.mempics where OrderDate = '".$row['OrderDate']."'");
                        $temp_user = mysql_query("SELECT rank,badge from abaokbah.member where username= '".$row['membername']."'");
                        $val = mysql_result($temp_user, 0, 'rank');
                        $bdg = mysql_result($temp_user, 0, 'badge');
                        if($val % 5 == 0){
                            if($yes){
                                 mysql_query("UPDATE member set member.badge = concat(member.badge,'*') where username = '".$_SESSION['SESS_FIRST_NAME']."';");
                                 $yes = false;
                                 mysql_query("UPDATE member SET member.rank = member.rank + 1 where username ='".$_SESSION['SESS_FIRST_NAME']."';");
                            }
                        }
                             
                        if($temp_blog){
                         while($roww = mysql_fetch_array($temp_blog)) 
                         {
                             //if($yes){ $bdg.='*'; $yes=false; } else {}
                             echo "<div><span id='picinfo'>Posted by:". "<a href='profile.php?name="
                                .$roww['memname']."'> ".$roww['memname']."</a></span>"
                                     ."<span id='rank'>Rank: " .$val ."</span>"
                                     ."<span id='badge'>Badge: " .$bdg ."</span>"
                                     ."<span id='date'>Posted on: " 
                                .$roww['OrderDate'] ."</span></div>";// I changed date_time to OrderDate
                                echo "<center><p>". $roww['blog_title']. "</p></center>";
                                echo "<center><p id='blogg'>". $roww['blog']. "</p></center>";
                                echo "<tr >";
                                
                         }
                        }
                        
                        if($temp_pic)
                        {
                         while($roww = mysql_fetch_array($temp_pic)) 
                         {  
                            /*if($val % 5 == 0){
                                 mysql_query("UPDATE member set member.badge = concat(member.badge,'*') where username = '".$_SESSION['SESS_FIRST_NAME']."';");
                             }*/
                             $roww['picname'] = str_replace(' ', '', $roww['picname']);
                                echo "<div><span id='picinfo'>Posted by:". "<a href='profile.php?name="
                                .$roww['membername']."'> ".$roww['membername']."</a></span>"
                                        ."<span id='rank'>Rank: " .$val ."</span>"
                                        ."<span id='badge'>Badge: " .$bdg ."</span>"
                                        ."<span id='date'>Posted on: " 
                                        .$roww['OrderDate'] ."</span></div>";

                                echo "<center><p>". $roww['caption']. "</p></center>";
                                echo "<center><img src=./pics/" . $roww['picname'] ."></center>";
                        }}


                    }
                    
                        $sql2 = "SELECT OrderDate FROM mempics UNION SELECT OrderDate FROM fp_blog";
			 $result2=mysql_query($sql2);
			  $rows=mysql_num_rows($result2);
                      
			  $no=ceil($rows/$num);
                          echo "<br><center><p style='font-size:19px;'>Page Number: </p>";
			  for($i=1;$i<=$no;$i++)
			  {
                              ?><a id='pg' href="home.php?page=<?php echo $i ?>" style="text-decoration:none"><?php echo $i." "; ?></a><?php
			  }
                          echo "</center>";
                    
                    
                    
                     if(isset($_SESSION['col'])||isset($_SESSION['col2']))   
                    {
                        $color = $_SESSION['col'];
                        $color2 = $_SESSION['col2'];
                        echo "<script type='text/javascript'>document.getElementById('body').style.backgroundColor =\" ".$color."\"</script> ";
                        echo "<script type='text/javascript'>document.getElementById('body').style.color =\" ".$color2."\"</script> ";
                        echo "<script type='text/javascript'>document.getElementById('html').style.backgroundColor =\" ".$color."\"</script> ";
                        echo "<script type='text/javascript'>document.getElementById('html').style.color =\" ".$color2."\"</script> ";
                        //echo "<script type='text/javascript'>document.getElementsByTagName('P').style.backgroundColor =\" ".$color."\"</script> ";
                        //echo "<script type='text/javascript'>document.getElementsByTagName('P').style.color =\" ".$color2."\"</script> ";
                        echo "<script type='text/javascript'>col('$color2');</script>"; 
                    }
                ?>
            
            </div>
    </div>
      
    <script>
            function sendInfo() {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {

                    if (request.readyState === 4) {
                        var p = document.createElement(p);
                        //var c = document.createElement("p");
                        p.innerHTML = request.responseText;
                        document.getElementById('display').appendChild(p);
                        location.reload();
                    }
                };
                request.open('post', 'photovalidation.php', true);
                var fd = new FormData(document.getElementById('myform'));
                request.send(fd);
            }
            
            function sendPost() {
                var x = document.forms["myform2"]["fTitle"].value;
                var y = document.forms["myform2"]["fblog"].value;
                var msg='';
                if(x == "" || x == null){
                    msg+="Title must be legal \n";
                }
                if(y == "" || y == null){
                    msg+="blog must be legal \n";
                }
                if(msg.length>2)
                {
                    alert(msg);
                }
                else
                {
                    var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (request.readyState === 4) {
                        var p = document.createElement(p);
                        //var c = document.createElement("p");
                        p.innerHTML = request.responseText;
                        document.getElementById('display').appendChild(p);
                        location.reload();
                    }
                };
                request.open('post', 'postvalidation.php', true);
                var fd = new FormData(document.getElementById('myform2'));
                request.send(fd);
                }
                
            }
            
            function refresh()
            {
                location.reload();
            }
            
            
            
        </script>
        <?php if(!$yes) { echo "<script>refresh();</script>"; } ?>
        <div id="footer"> Copyrights go to Ali Baokbah, Mansour Malaika and University of Denver, CS Department. &copy </div>
    </body>
</html>





<!--<div id="content">
        <div id = 'display'>
                <?php // actual url is: http://webbox.cs.du.edu/~abaokbah/FinalProject/profile.php?name=
                    /*$result = mysql_query("select * from abaokbah.mempics ORDER BY PID DESC");
                    while($row = mysql_fetch_array($result)) 
                    {
                        $row['picname'] = str_replace(' ', '', $row['picname']);
                        echo "<div><span id='picinfo'>Posted by:". "<a href='profile.php?name="
                        .$row['membername']."'> ".$row['membername']."</a></span>"."<span id='date'>Posted on: " 
                                .$row['OrderDate'] ."</span></div>";
                        
                        echo "<center><p>". $row['caption']. "</p></center>";
                        echo "<center><img src=./pics/" . $row['picname'] ."></center>";

                    }*/
                ?>
            
            </div>
    </div>
        
    <div id="content">
        <div id = 'display'>
                <?php // actual url is: http://webbox.cs.du.edu/~abaokbah/FinalProject/profile.php?name=
                    /*$result = mysql_query("select * from abaokbah.fp_blog ORDER BY OrderDate");
                   
             
                    while($row = mysql_fetch_array($result)) 
                    {
                        echo "<div><span id='picinfo'>Posted by:". "<a href='profile.php?name="
                        .$row['memname']."'> ".$row['memname']."</a></span>"."<span id='date'>Posted on: " 
                                .$row['OrderDate'] ."</span></div>";// I changed date_time to OrderDate
                        
                        echo "<center><p>". $row['blog_title']. "</p></center>";
                         echo "<center><p>". $row['blog']. "</p></center>";
                        /////////////
                        echo "<tr >";
                    }*/
                ?>
            
            </div>
    </div>-->