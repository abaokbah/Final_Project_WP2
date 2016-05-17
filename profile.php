<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<?php 
    session_start();
    include("connection.php");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="AssignmentStylesheet.css">
    </head>
    <body>
        <?php
        //echo "<h1>Proflie page (Under construction)</h1>";
        // put your code here
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
    
    <?php 
        $user = $_SESSION['SESS_FIRST_NAME'];
        $greetings = $_SESSION['SESS_FIRST_NAME'];
        $keyholder = $_SESSION['SESS_FIRST_NAME'];
        
        if(checkurl())
        {
            $greetings = "Guest";
            $user = $_GET['name'];
            $keyholder = "Guest";
            echo "<h2> Welcome " . $greetings . ". You are checking ". $user. "'s profile</h2>";
        }
        else {echo "<h2> Welcome " . $greetings . ".</h2>";}
        
        $res = mysql_query("select * from abaokbah.member WHERE username='$user'");
        
       echo "<div id='info'>";
       echo "<br>";
       echo "<p>$user's " . "information: </p>";
        if($res){ 
                    while($row = mysql_fetch_array($res)) {
                    echo "<tr>";
                    echo "<li> Username: " . $row['username'] . "</li>";
                    echo "<li> First name: " . $row['fname'] . "</li>";
                    echo "<li> Last name: " . $row['lname'] . "</li>";
                    echo "<li> Gender: " . $row['gender'] . "</li>";
                    echo "</tr>";
            }
        }
        echo "</div>";
    ?>
    
    <div id="content">
        <div id = 'display'>
                <?php
                $result = mysql_query("select * from abaokbah.mempics WHERE membername='$user' ORDER BY PID DESC");
                
                if($result){ //echo "I'm here!!";
                    
                    echo "<center>"
                    . "<input type='text' name='capchange' id='capchange'></center>"
                            . "<center><p> Enter a new caption and scroll down to modify desired picture</p></center>";
                    while($row = mysql_fetch_array($result)) 
                    {
                        $row['picname'] = str_replace(' ', '', $row['picname']);
                        
                        echo "<div><span id='picinfo'>Posted by:"
                        .$row['membername']."</span>"."<span id='date'>Posted on: " 
                                .$row['OrderDate'] ."</span></div>";
                        echo "<center><p>". $row['caption']. "</p></center>";
                        echo "<center><img src=../pics/" . $row['picname'] ."></center>";
                        if($row['membername']===$keyholder){
                            $pc = $row['picname'];
                            echo "<center><input id='change' type='button' value='CHANGE CAPTION' onclick='changecap(\"$pc\")'></center>";
                            echo "<center><input id='delete' type='button' value='DELETE' onclick='deletepic(\"$pc\")'></center>";
                        }
                    }
                }
                ?>
            </div>
    </div>
    
    <script>
        function deletepic(a)
        {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {

                if (request.readyState === 4) {
                    console.log("I'm here in delete!");
                    alert("Deletion complete!");
                    location.reload();
                }
            };
            request.open('get', 'delete.php?q='+a, true);
            request.send();
        }
        
        function changecap(pic)
        {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {

                if (request.readyState === 4) {
                    alert("Changes submitted");
                    console.log("I'm here" + obj);
                    location.reload();
                }
            };
            
            var obj = document.getElementById("capchange").value;
            request.open('get', 'capchange.php?q='+pic+'&c='+obj, true);
            request.send();
        }
        
    </script>
    <script>
        <?php
        
            function checkurl()
            {
                if(!empty($_GET['name']))
                { return true; }
                else {return false;}
            }

            function checkusr()
            {
                //echo "I'm here!! <br>";
                //echo $url = $_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF']
                if($_GET['name'])
                {
                    if($_GET['name'] === '')
                    {
                        return 'Unknown';
                    }
                    else { return $_GET['name']; }
                }
            }

        ?>
    </script> 
        
    <div id="footer"> Copyrights go to Ali Baokbah and University of Denver, CS Department. &copy </div>
    </body>
</html>