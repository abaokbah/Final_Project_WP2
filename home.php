
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
<html>
    <head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link rel="stylesheet" type="text/css" href="AssignmentStylesheet.css">
    <style>
        h2 {
            font-family: Garamond;
        }
        
    </style>
    </head>
     
    <body>
        <?php 
            $user = $_SESSION['SESS_FIRST_NAME'];
            //echo $user;
        
        ?>
        <!-- Header section -->
        <table class="upperBanner">
            <a href="home.php">
                <center><img id="upbanner" src=" HOTS-Open-Beta-screen.png" alt="heroes background"
                            width="100%" height="200"> <!-- yellow-and-blue_00435238.jpg -->
                </center></a>
        </table> 
        <!-- Content menu section -->
        <table id="menutable">
            <tr>
                <td><a id="home" href="home.php">HOME</a></td>
                <td><a id="profile" href="profile.php">PROFILE</a></td>
                <td><a id="upcoming" href="index.php">LOGOUT</a></td>
            </tr>
        </table>
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
                    <center>Add caption: <input type="text" name="caption"></center>
                    <center><input type="file" name="myfile" id="file">
                    <input type="button" id="upload" onclick="sendInfo();"  value="Upload"></center>
                </form>
                <!-- Blog form -->
                <center><form id="myform2" method="post" enctype="multipart/form-data" style="margin:2px;">
                    
                    
                    <h5 style="margin:2px;">Blog Title:<br> <input id="title" type="text" name="fTitle" size="40"></h5>
                    <h5 style="margin:2px;">Blog Content:</h5>
                
                    <textarea name="fblog" id="blog" rows="30" cols="135" style="width:85%; height:150px;"></textarea>
                <input name="Upload" type="button" id="Upload" onclick="sendPost();"  value="Post">
                </form></center>
            </div>
         
            <br>
        </div>
    
    <div id="content">
        <div id = 'display'>
                <?php // actual url is: http://webbox.cs.du.edu/~abaokbah/FinalProject/profile.php?name=
                    //$result = mysql_query("select * from abaokbah.mempics ORDER BY PID DESC");
                $pic = false;
                $result = mysql_query("SELECT OrderDate, membername FROM mempics UNION SELECT OrderDate, memname FROM fp_blog ORDER BY OrderDate DESC");
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
                                echo "<center><p>". $roww['blog']. "</p></center>";
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