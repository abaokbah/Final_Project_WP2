
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- I used a little bit of my PhotoStream assignment code in here -->

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
                <center><img id="upbanner" src="yellow-and-blue_00435238.jpg" alt="Blue and yellow share" 
                            width="100%" height="320">
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
                    <center><h2>Welcome to Blue Skies Photo Sharing Website</h2></center>
                    <center>Add caption: <input type="text" name="caption"></center>
                    <center><input type="file" name="myfile" id="file">
                    <input type="button" id="upload" onclick="sendInfo();"  value="Upload"></center>
                </form>
            </div>
         
            <br>
        </div>
    
    
    
    <div id="content">
        <div id = 'display'>
                <?php
                    $result = mysql_query("select * from abaokbah.mempics ORDER BY PID DESC");
                    while($row = mysql_fetch_array($result)) 
                    {
                        $row['picname'] = str_replace(' ', '', $row['picname']);
                        echo "<div><span id='picinfo'>Posted by:". "<a href='http://webbox.cs.du.edu/~abaokbah/FinalProject/profile.php?name="
                        .$row['membername']."'> ".$row['membername']."</a></span>"."<span id='date'>Posted on: " 
                                .$row['OrderDate'] ."</span></div>";
                        
                        echo "<center><p>". $row['caption']. "</p></center>";
                        echo "<center><img src=../pics/" . $row['picname'] ."></center>";

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
            
            function refresh()
            {
                location.reload();
            }
        </script>
        
        <div id="footer"> Copyrights go to Ali Baokbah and University of Denver, CS Department. &copy </div>
    </body>
</html>