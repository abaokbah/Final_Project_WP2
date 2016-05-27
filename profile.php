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
        
        if(filter_input(INPUT_GET, 'name') == NULL){
            $temp = $user;
        }
        else{ $temp = filter_input(INPUT_GET, 'name'); }
        
        if(filter_input(INPUT_GET, 'name') == $_SESSION['SESS_FIRST_NAME']) {
            $temp = $user;
        }
     
        //$res = mysql_query("select * from abaokbah.member WHERE username='$user'");
        $res = mysql_query("select * from abaokbah.member WHERE username='$temp'");
        $ress = mysql_query("select * from abaokbah.member WHERE username='$temp'");
        $fetcher = mysql_query("select fav_hero1,fav_hero2,fav_hero3,role from abaokbah.member WHERE username='$temp'");
        if($fetcher){
            while($f = mysql_fetch_array($ress))
            {
                $fav1 = $f['fav_hero1'];
                $fav2 = $f['fav_hero2'];
                $fav3 = $f['fav_hero3'];
                $battleground = $f['battleground'];
                $role = $f['role'];
            }
        }
        //$fav1 = mysql_result($fetcher,0);
        //$fav2 = mysql_result($fetcher,0);
        //$fav3 = mysql_result($fetcher,0);
        
       echo "<div id='info'>";
       echo "<br>";
      // echo "<p style=''>$user's " . "information: </p>";
       echo "<div class='innerinfo'>";
       echo "<p style=''>$temp's " . "information: </p>";
        if($res){ 
                    while($row = mysql_fetch_array($res)) {
                    echo "<tr>";
                    echo "<li> Username: " . $row['username'] . "</li>";
                    echo "<li> First name: " . $row['fname'] . "</li>";
                    echo "<li> Last name: " . $row['lname'] . "</li>";
                    echo "<li> Gender: " . $row['gender'] . "</li>";
                    echo "<li> Role: " . $role . "</li>";
                    echo "<li> Favorite Battleground: <br><li>" . $row['battleground'] . "</li></li>";
                    echo "<img id='holder1' src='hero_icons/battlegrounds/" . $row['battleground'] . ".png' alt='favorite battleground' width='100' height='40'"
                    . "style='position:relative; left:30px;'>";
                    //echo "<li> fav_hero2: " . $row['fav_hero2'] . "</li>";
                    echo "</tr>";
            }
        }
        
        // Battleground options
        echo "<form id='bg' action='' style='display:inline; position:relative; left:40px; bottom:5px;'>
                  <select name='battleground' id='battleground_select'>
                    <option value=''>-</option>
                    <option value='BattlefieldOfEternity'>Battlefield of Eternity</option>
                    <option value='SkyTemple'>Sky Temple</option>
                    <option value='DragonShire'>Dragon Shire</option>      
                    <option value='TowersOfDoom'>Towers of Doom</option>
                    <option value='CursedHollow'>Cursed Hollow</option>
                    <option value='BlackheartsBay'>Blackheart's Bay</option>
                    <option value='TomboftheSpiderQueen'>Tomb of the Spider Queen</option>
                    <option value='InfernalShrines'>Infernal Shrines</option>
                    <option value='GardenofTerror'>Garden of Terror</option>
                  </select>
                  <input id='change' type='button' value='CHANGE' onclick='battlegroundselect()'>
                </form>";
        
        echo "</div>";
        
        // Heroes options. Choose and click "CHANGE", which takes to a function down bottom.
        echo "<div id='hotsinfo' class='innerinfo' style='margin-left:50px;'>"
                . "<p style='margin-left:1px';>Heroes Preferences:</p><br>"
                . "<img id='holder1' src='hero_icons/heroes/$fav1.png' onerror='check(this)' alt='favorite hero' width='50' height='50'>" //\"$fav1\"
                . "<img id='holder2' src='hero_icons/heroes/$fav2.png' onerror='check(this)' alt='favorite hero' width='50' height='50'>"
                . "<img id='holder3' src='hero_icons/heroes/$fav3.png' onerror='check(this)' alt='favorite hero' width='50' height='50'>"
                
                . " <form id='hr' action=''>
                  <select name='hero_select1' id='hero1'>
                    <option value=''>-</option>
                    <option value='Tassadar'>Tassadar</option>  <option value='Artanis'>Artanis</option>
                    <option value='Lunara'>Lunara</option>      <option value='Murky'>Murky</option>
                    <option value='Kaelthas'>Kaelthas</option>  <option value='Nazeebo'>Nazeebo</option>
                    <option value='Chen'>Chen</option>          <option value='Rexxar'>Rexxar</option>
                    <option value='Zeratul'>Zeratul</option>
                  </select>
                  <select name='hero_select2' id='hero2'>
                    <option value=''>-</option>
                    <option value='Tassadar'>Tassadar</option>  <option value='Artanis'>Artanis</option>
                    <option value='Lunara'>Lunara</option>      <option value='Murky'>Murky</option>
                    <option value='Kaelthas'>Kaelthas</option>  <option value='Nazeebo'>Nazeebo</option>
                    <option value='Chen'>Chen</option>          <option value='Rexxar'>Rexxar</option>
                    <option value='Zeratul'>Zeratul</option>
                  </select>
                  <select name='hero_select3' id='hero3'>
                    <option value=''>-</option>
                    <option value='Tassadar'>Tassadar</option>  <option value='Artanis'>Artanis</option>
                    <option value='Lunara'>Lunara</option>      <option value='Murky'>Murky</option>
                    <option value='Kaelthas'>Kaelthas</option>  <option value='Nazeebo'>Nazeebo</option>
                    <option value='Chen'>Chen</option>          <option value='Rexxar'>Rexxar</option>
                    <option value='Zeratul'>Zeratul</option>
                  </select>
                  <br>
                  <input id='change' type='button' value='CHANGE' onclick='heroselect()'>
                </form>"
                //. "<p style='margin:0px';>Role Preference:</p>" // Work on this!!
                . "<div id='rolee' style='position: relative; top:20px;'>"
                . "<img id='holder1' src='hero_icons/roles/$role.png' onerror='check(this)' alt='favorite hero' width='50' height='50' style='display:inline;'>"
                
                // Role options. also takes to a function down bottom.
                . "<form id='rl' action=''>
                  <select name='role' id='role'>
                    <option value=''>-</option>
                    <option value='Specialist'>Specialist</option>
                    <option value='Assassin'>Assassin</option>
                    <option value='Warrior'>Warrior</option>
                    <option value='Support'>Support</option>
                  </select>"
                . "<input id='change' type='button' value='CHANGE' onclick='roleselect()'></form>"
                . "</div> </div>";
                //. "<p id='role' style='display:inline-block;';>Favorite Hero Role:</p><br>";
        echo "</div>";
        
    ?>
    
    <script>
        function hide(){
            console.log("I'm in hide!!");
            document.getElementById("bg").style.display = "none";
            document.getElementById("hr").style.display = "none";
            document.getElementById("rl").style.display = "none";
            //document.getElementsByTagName("LI");
        }
    </script>
    
    <?php 
        if(checkurl() && filter_input(INPUT_GET, 'name') != $_SESSION['SESS_FIRST_NAME'])
        {
            $greetings = "Guest";
            $user = $_GET['name'];
            $keyholder = "Guest";
            echo "<h2> Welcome " . $greetings . ". You are checking ". $user. "'s profile</h2>";
            echo "<script type='text/javascript'>hide();</script>";
            //echo "<script type='text/javascript'>document.getElementByTagName('SELECT').style.display = 'none';</script>";
        }
        else {echo "<h2> Welcome " . $greetings . ".</h2>";}
    
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
                        
                        echo "<div><span id='picinfo'>Posted by: ". "<a href='profile.php?name="
                        .$row['membername']."'> ".$row['membername']."</a></span>"."<span id='date'>Posted on: " 
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
                
                $result2 = mysql_query("select * from abaokbah.fp_blog WHERE memname='$user' ORDER BY blog_id DESC");
                
                if($result2){ //echo "I'm here!!";
                    
                    
                    while($row = mysql_fetch_array($result2)) 
                    {
                        
                        
                        echo "<div><span id='picinfo'>Posted by:". "<a href='profile.php?name="
                        .$row['memname']."'> ".$row['memname']."</a></span>"."<span id='date'>Posted on: " 
                                .$row['OrderDate'] ."</span></div>"; /// I changed date_time to OrderDate
                        
                        echo "<center><p>". $row['blog_title']. "</p></center>";
                         echo "<center><p>". $row['blog']. "</p></center>";
                        if($row['memname']===$keyholder){
                            $pc = $row['blog_id'];
                            echo "<center><input id='change' type='button' value='EDIT BLOG' onclick='editBlog(\"$pc\")'></center>";
                            echo "<center><input id='delete' type='button' value='DELETE' onclick='deleteBlog(\"$pc\")'></center>";
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
                    //alert("Deletion complete!");
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
                    //alert("Changes submitted");
                    console.log("I'm here" + obj);
                    location.reload();
                }
            };
            
            var obj = document.getElementById("capchange").value;
            request.open('get', 'capchange.php?q='+pic+'&c='+obj, true);
            request.send();
        }
        
        function heroselect()
        {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {

                if (request.readyState === 4) {
                    console.log("chane a hero!");
                    location.reload();
                }
            };
            var h1 = document.getElementById("hero1").value;
            var h2 = document.getElementById("hero2").value;
            var h3 = document.getElementById("hero3").value;
            console.log("hero_select.php?h1="+h1+"&h2="+h2+"$h3="+h3);
            request.open('get', 'hero_select.php?h1='+h1+"&h2="+h2+"&h3="+h3, true); //
            request.send();
        }
        
        function roleselect()
        {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {

                if (request.readyState === 4) {
                    console.log("chane a role!");
                    location.reload();
                }
            };
            var r = document.getElementById("role").value;
            console.log(r);
            request.open('get', 'role_select.php?r='+r, true); //
            request.send();
        }
        
        function battlegroundselect()
        {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {

                if (request.readyState === 4) {
                    console.log("chane a bg!");
                    location.reload();
                }
            };
            var b = document.getElementById("battleground_select").value;
            console.log(b);
            request.open('get', 'battleground_select.php?b='+b, true); //
            request.send();
        }
        
        
        ////////////////////////////////////////////////////////////////////
        
        function deleteBlog(y)
        {
            var answer = confirm("Do you want to delete this blog?");
           if (answer){
            xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        var answer = confirm("Successfully deleted");
                                        setTimeout(function() {window.location = "profile.php" });
                    }
                }
                xmlhttp.open("POST","deleteBlog.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("y="+y);

           }
        }
        function editBlog(y)
        {
            //var answer = confirm("Do you want to delete this gallery?");

            xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("empty").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("POST","editBlog_helper.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("y="+y);

              setTimeout(function() {window.location = "editBlog.php" });

        } 
        
        function check(a){
            var image = a;
            if(image.src.match("hero_icons/heroes/.png") || image.src.match("hero_icons/roles/.png"))
            { image.src = "hero_icons/heroes/heroframe.png"; }
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
        
    <div id="footer"> Copyrights go to Ali Baokbah and University of Denver, CS Department. &copy </div>
    </body>
</html>



<!--
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
    
-->