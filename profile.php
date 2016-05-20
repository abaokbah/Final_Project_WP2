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
                <center><img id="upbanner" src="HOTS-Open-Beta-screen.png" alt="heroes background" 
                            width="100%" height="210">
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
        $ress = mysql_query("select * from abaokbah.member WHERE username='$user'");
        $fetcher = mysql_query("select fav_hero1,fav_hero2,fav_hero3 from abaokbah.member WHERE username='$user'");
        if($fetcher){
            while($f = mysql_fetch_array($ress))
            {
                $fav1 = $f['fav_hero1'];
                $fav2 = $f['fav_hero2'];
                $fav3 = $f['fav_hero3'];
            }
        }
        //$fav1 = mysql_result($fetcher,0);
        //$fav2 = mysql_result($fetcher,0);
        //$fav3 = mysql_result($fetcher,0);
        
       echo "<div id='info'>";
       echo "<br>";
      // echo "<p style=''>$user's " . "information: </p>";
       echo "<div class='innerinfo'>";
       echo "<p style=''>$user's " . "information: </p>";
        if($res){ 
                    while($row = mysql_fetch_array($res)) {
                    echo "<tr>";
                    echo "<li> Username: " . $row['username'] . "</li>";
                    echo "<li> First name: " . $row['fname'] . "</li>";
                    echo "<li> Last name: " . $row['lname'] . "</li>";
                    echo "<li> Gender: " . $row['gender'] . "</li>";
                    //echo "<li> fav_hero1: " . $fav1 . "</li>";
                    //echo "<li> fav_hero1: " . $row['fav_hero1'] . "</li>";
                    //echo "<li> fav_hero2: " . $row['fav_hero2'] . "</li>";
                    echo "</tr>";
            }
        }
        echo "</div>";
        echo "<div id='hotsinfo' class='innerinfo' style='margin-left:50px;'>"
                //. "<p style='margin-left:1px';>Heroes Preferences:</p><br>"
                /*. "<img id='holder1' src='hero_icons/heroframe.png' alt='favorite hero' width='50' height='50' onclick=" . "'hero(\"$fav1\",this)'>" //\"$fav1\"
                . "<img id='holder2' src='hero_icons/heroframe.png' alt='favorite hero' width='50' height='50' onclick=" . "'hero(\"$fav2\",this)'>"
                . "<img id='holder3' src='hero_icons/heroframe.png' alt='favorite hero' width='50' height='50' onclick=" . "'hero(\"$fav3\",this)'>"
                */ // THIS IS A WORKING CODE!!!!
                
                /*. "<p style='margin-left:1px';>Heroes Preferences:</p><br>"
                . "<img id='holder1' src='hero_icons/heroframe.png' onload='this.onload=null; this.src=herro(\"$fav1\",this) alt='favorite hero' width='50' height='50'>" //\"$fav1\"
                . "<img id='holder2' src='hero_icons/heroframe.png' onload='this.onload=null; this.src=herro(\"$fav2\",this) alt='favorite hero' width='50' height='50'>"
                . "<img id='holder3' src='hero_icons/heroframe.png' onload='this.onload=null; this.src=herro(\"$fav3\",this) alt='favorite hero' width='50' height='50'>"
                    */
                
                . "<p style='margin-left:1px';>Heroes Preferences:</p><br>"
                . "<img id='holder1' src='hero_icons/$fav1.png' onerror='check(this)' alt='favorite hero' width='50' height='50'>" //\"$fav1\"
                . "<img id='holder2' src='hero_icons/$fav2.png' onerror='check(this)' alt='favorite hero' width='50' height='50'>"
                . "<img id='holder3' src='hero_icons/$fav3.png' onerror='check(this)' alt='favorite hero' width='50' height='50'>"
                
                /*. " <div class='dropdown'>
                    <button class='dropbtn'>Choose your hero</button>
                    <div class='dropdown-content'>
                      <a href='#'>Link 1</a>
                      <a href='#'>Link 2</a>
                      <a href='#'>Link 3</a>
                    </div>
                    </div>"*/
                . ""
                . "</div>"
                . "<p id='role' style='display:inline-block;';>Favorite Hero Role:</p><br>";
        echo "</div>";
        
    ?>
    
    <form>
        
        
    </form>
    
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
                        echo "<center><img src=./pics/" . $row['picname'] ."></center>";
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
        
        function test(a)
        {
            var image = a;
            //var image = document.getElementById("holder1");
            //alert(image.src);
            if(image.src.match("frame")) {
                switch(Math.floor((Math.random() * 9) + 1)){
                    case 1: image.src = "hero_icons/Tassadar.png"; break;
                    case 2: image.src = "hero_icons/Murky.png"; break;
                    case 3: image.src = "hero_icons/TheLostVikings.png"; break;
                    case 4: image.src = "hero_icons/Xul.png"; break;
                    case 5: image.src = "hero_icons/Anubarak.png"; break;
                    case 6: image.src = "hero_icons/Chen.png"; break;
                    case 7: image.src = "hero_icons/Kaelthas.png"; break;
                    case 8: image.src = "hero_icons/Nazeebo.png"; break;
                    case 9: image.src = "hero_icons/Rexxar.png"; break;
                    
                }
                        
                //image.src = "tassicon.png"; //tassicon.png
            }
            else {
                image.src = "hero_icons/heroframe.png";
                //alert("im here");
            }
        }
        
        function check(a){
            
            var image = a;
            //alert(image.src);
            if(image.src.match("hero_icons/.png")){ image.src = "hero_icons/heroframe.png"; }
            else{  }
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
    
    <script>
            
    function herro(a,b){
            var hero = a;
            var temp;
            if(hero == "") { return "hero_iconst/heroframe.png"; }
            else{ temp = "hero_icons/"+ a +".png"; return temp; }
        }  
     function hero(a,b){
            var image = b;
            var heroo = a;
            var temp;
            //alert(heroo);
            if(heroo == "") { image.src = "hero_icons/heroframe.png"; }
            else{ 
                temp = "hero_icons/"+ a +".png";
                image.src = temp; 
            }
            //alert(a);
        }
    
    </script>
        
    <div id="footer"> Copyrights go to Ali Baokbah and University of Denver, CS Department. &copy </div>
    </body>
</html>