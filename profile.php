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

<html id='html'>
    <head>
        <meta charset="UTF-8">
        <title>The Colosseum | Profile</title>
        <link rel="stylesheet" type="text/css" href="AssignmentStylesheet.css">
    </head>
    <body id='body'>
        
        
        
        <script>
        
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
            var x = document.forms["entries_form"]["num_entries2"].value;
            var re = /^[0-9]*$/;
            if (x==null || x=="" || !(x.match(re))) {
               // document.getElementById('first').style.borderColor = "red";
                document.getElementById('num_entries2').style.border = "2px solid red";
                //document.getElementById('first').style.backgroundColor = "red";
                msg ="Input must be a number \n";
                //alert("First name must be filled out");
                return msg;
            }
            else
            {
                document.getElementById('num_entries2').style.border = "0px";
            }
            return msg;
        }
        
        </script>
        
        
        
        <?php
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
            if(!isset($_SESSION['SESS_FIRST_NAME'])) { header("location: page_not_found.php"); }
            $check = filter_input(INPUT_GET, 'name');
            $sqql = mysql_query("SELECT * from member where username = '".$check."'");
            
            if(mysql_num_rows($sqql) > 0 || filter_input(INPUT_GET, 'name') == NULL){}
                else { echo "herro prease"; header("location: page_not_found.php"); }
            
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
                <td><a id="about" href="about.php">ABOUT</a></td>
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
                    <option value='Battlefield of Eternity'>Battlefield of Eternity</option>
                    <option value='Sky Temple'>Sky Temple</option>
                    <option value='Dragon Shire'>Dragon Shire</option>      
                    <option value='Towers of Doom'>Towers of Doom</option>
                    <option value='Cursed Hollow'>Cursed Hollow</option>
                    <option value='Blackhearts Bay'>Blackheart's Bay</option>
                    <option value='Tomb of the Spider Queen'>Tomb of the Spider Queen</option>
                    <option value='Infernal Shrines'>Infernal Shrines</option>
                    <option value='Garden of Terror'>Garden of Terror</option>
                  </select>
                  <input id='change' type='button' value='CHANGE' onclick='battlegroundselect()'>
                </form>";
        
        echo "</div>";
        
        // Heroes options. Choose and click "CHANGE", which takes to a function down bottom.
        echo "<div id='hotsinfo' class='innerinfo' style='margin-left:50px;'>"
                . "<p id='i' style='margin-left:1px';>Heroes Preferences:</p><br>"
                . "<img id='holder1' src='hero_icons/heroes/$fav1.png' onerror='check(this)' alt='favorite hero' width='50' height='50'>" //\"$fav1\"
                . "<img id='holder2' src='hero_icons/heroes/$fav2.png' onerror='check(this)' alt='favorite hero' width='50' height='50'>"
                . "<img id='holder3' src='hero_icons/heroes/$fav3.png' onerror='check(this)' alt='favorite hero' width='50' height='50'>"
                
                . " <form id='hr' action=''>
                  <select name='hero_select1' id='hero1'>
                    <option value=''>-</option>
                    <option value='Abathur'>Abathur</option>    <option value='Anubarak'>Anubarak</option>
                    <option value='Artanis'>Artanis</option>    <option value='Arthas'>Arthas</option>
                    <option value='Azmodan'>Azmodan</option>    <option value='Brightwing'>Brightwing</option>
                    <option value='Chen'>Chen</option>          <option value='Cho'>Cho</option>
                    <option value='Chromie'>Chromie</option>    <option value='Dehaka'>Dehaka</option>  
                    <option value='Diablo'>Diablo</option>      <option value='ETC'>E.T.C</option>
                    <option value='Falstad'>Falstad</option>    <option value='Gall'>Gall</option>
                    <option value='Gazlowe'>Gazlowe</option>    <option value='Greymane'>Greymane</option>
                    <option value='Illidan'>Illidan</option>    <option value='Jaina'>Jaina</option>
                    <option value='Johanna'>Johanna</option>    <option value='Kaelthas'>Kaelthas</option>  
                    <option value='Kerrigan'>Kerrigan</option>  <option value='Kharazim'>Kharazim</option>
                    <option value='Leoric'>Leoric</option>      <option value='LiLi'>LiLi</option>
                    <option value='LiMing'>LiMing</option>      <option value='LtMorales'>Lt. Morales</option>
                    <option value='Lunara'>Lunara</option>      <option value='Malfurion'>Malfurion</option>
                    <option value='Muradin'>Muradin</option>    <option value='Murky'>Murky</option>
                    <option value='Nazeebo'>Nazeebo</option>    <option value='Nova'>Nova</option>
                    <option value='Raynor'>Raynor</option>      <option value='Rehgar'>Rehgar</option>  
                    <option value='Rexxar'>Rexxar</option>      <option value='SgtHammer'>SgtHammer</option>
                    <option value='Sonya'>Sonya</option>        <option value='Stitches'>Stitches</option>
                    <option value='Sylvanas'>Sylvanas</option>  <option value='Tassadar'>Tassadar</option>
                    <option value='TheButcher'>The Butcher</option>      <option value='TheLostVikings'>The Lost Vikings</option>
                    <option value='Thrall'>Thrall</option>      <option value='Tracer'>Tracer</option>
                    <option value='Tychus'>Tychus</option>      <option value='Tyrande'>Tyrande</option>
                    <option value='Uther'>Uther</option>        <option value='Valla'>Valla</option>
                    <option value='Xul'>Xul</option>            <option value='Zagara'>Zagara</option>
                    <option value='Zeratul'>Zeratul</option>
                  </select>
                  <select name='hero_select2' id='hero2'>
                    <option value=''>-</option>
                    <option value='Abathur'>Abathur</option>    <option value='Anubarak'>Anubarak</option>
                    <option value='Artanis'>Artanis</option>    <option value='Arthas'>Arthas</option>
                    <option value='Azmodan'>Azmodan</option>    <option value='Brightwing'>Brightwing</option>
                    <option value='Chen'>Chen</option>          <option value='Cho'>Cho</option>
                    <option value='Chromie'>Chromie</option>    <option value='Dehaka'>Dehaka</option>  
                    <option value='Diablo'>Diablo</option>      <option value='ETC'>E.T.C</option>
                    <option value='Falstad'>Falstad</option>    <option value='Gall'>Gall</option>
                    <option value='Gazlowe'>Gazlowe</option>    <option value='Greymane'>Greymane</option>
                    <option value='Illidan'>Illidan</option>    <option value='Jaina'>Jaina</option>
                    <option value='Johanna'>Johanna</option>    <option value='Kaelthas'>Kaelthas</option>  
                    <option value='Kerrigan'>Kerrigan</option>  <option value='Kharazim'>Kharazim</option>
                    <option value='Leoric'>Leoric</option>      <option value='LiLi'>LiLi</option>
                    <option value='LiMing'>LiMing</option>      <option value='LtMorales'>Lt. Morales</option>
                    <option value='Lunara'>Lunara</option>      <option value='Malfurion'>Malfurion</option>
                    <option value='Muradin'>Muradin</option>    <option value='Murky'>Murky</option>
                    <option value='Nazeebo'>Nazeebo</option>    <option value='Nova'>Nova</option>
                    <option value='Raynor'>Raynor</option>      <option value='Rehgar'>Rehgar</option>  
                    <option value='Rexxar'>Rexxar</option>      <option value='SgtHammer'>SgtHammer</option>
                    <option value='Sonya'>Sonya</option>        <option value='Stitches'>Stitches</option>
                    <option value='Sylvanas'>Sylvanas</option>  <option value='Tassadar'>Tassadar</option>
                    <option value='TheButcher'>The Butcher</option>      <option value='TheLostVikings'>The Lost Vikings</option>
                    <option value='Thrall'>Thrall</option>      <option value='Tracer'>Tracer</option>
                    <option value='Tychus'>Tychus</option>      <option value='Tyrande'>Tyrande</option>
                    <option value='Uther'>Uther</option>        <option value='Valla'>Valla</option>
                    <option value='Xul'>Xul</option>            <option value='Zagara'>Zagara</option>
                    <option value='Zeratul'>Zeratul</option>
                  </select>
                  <select name='hero_select3' id='hero3'>
                    <option value=''>-</option>
                    <option value='Abathur'>Abathur</option>    <option value='Anubarak'>Anubarak</option>
                    <option value='Artanis'>Artanis</option>    <option value='Arthas'>Arthas</option>
                    <option value='Azmodan'>Azmodan</option>    <option value='Brightwing'>Brightwing</option>
                    <option value='Chen'>Chen</option>          <option value='Cho'>Cho</option>
                    <option value='Chromie'>Chromie</option>    <option value='Dehaka'>Dehaka</option>  
                    <option value='Diablo'>Diablo</option>      <option value='ETC'>E.T.C</option>
                    <option value='Falstad'>Falstad</option>    <option value='Gall'>Gall</option>
                    <option value='Gazlowe'>Gazlowe</option>    <option value='Greymane'>Greymane</option>
                    <option value='Illidan'>Illidan</option>    <option value='Jaina'>Jaina</option>
                    <option value='Johanna'>Johanna</option>    <option value='Kaelthas'>Kaelthas</option>  
                    <option value='Kerrigan'>Kerrigan</option>  <option value='Kharazim'>Kharazim</option>
                    <option value='Leoric'>Leoric</option>      <option value='LiLi'>LiLi</option>
                    <option value='LiMing'>LiMing</option>      <option value='LtMorales'>Lt. Morales</option>
                    <option value='Lunara'>Lunara</option>      <option value='Malfurion'>Malfurion</option>
                    <option value='Muradin'>Muradin</option>    <option value='Murky'>Murky</option>
                    <option value='Nazeebo'>Nazeebo</option>    <option value='Nova'>Nova</option>
                    <option value='Raynor'>Raynor</option>      <option value='Rehgar'>Rehgar</option>  
                    <option value='Rexxar'>Rexxar</option>      <option value='SgtHammer'>SgtHammer</option>
                    <option value='Sonya'>Sonya</option>        <option value='Stitches'>Stitches</option>
                    <option value='Sylvanas'>Sylvanas</option>  <option value='Tassadar'>Tassadar</option>
                    <option value='TheButcher'>The Butcher</option>      <option value='TheLostVikings'>The Lost Vikings</option>
                    <option value='Thrall'>Thrall</option>      <option value='Tracer'>Tracer</option>
                    <option value='Tychus'>Tychus</option>      <option value='Tyrande'>Tyrande</option>
                    <option value='Uther'>Uther</option>        <option value='Valla'>Valla</option>
                    <option value='Xul'>Xul</option>            <option value='Zagara'>Zagara</option>
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
    
    <form name="entries_form" id="entries_form" action="home.php" method="POST" onsubmit=" return validateForm();">
		 <h7> Choose number of entries: </h7>
            <input type="text" id="num_entries2" name="num_entries" value="10">
            <br>
            <input id="submit" name="submit" type="submit"> 
        </form>
    
    <div id="content">
        <div id = 'display'>
                <?php // actual url is: http://webbox.cs.du.edu/~abaokbah/FinalProject/profile.php?name=
                    //$result = mysql_query("select * from abaokbah.mempics ORDER BY PID DESC");
                
                 if($thrall=="true" && isset($_POST["submit"]))
		{
                    
			$num=$_POST["num_entries2"];
			$_SESSION["num2"]=$num;
                 
                        $thrall = 'false';
                   
		}
		else{
			if(isset($_SESSION["num2"]))
			{
				$num=$_SESSION["num2"];
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
                $result = mysql_query("SELECT OrderDate, membername FROM mempics UNION SELECT OrderDate, memname FROM fp_blog ORDER BY OrderDate DESC");
                
                    while($row = mysql_fetch_array($result)) 
                    {
                        $temp_blog = mysql_query("SELECT * from abaokbah.fp_blog where OrderDate = '".$row['OrderDate']."' and memname = "
                                . "'$user'");
                        $temp_pic = mysql_query("SELECT * from abaokbah.mempics where OrderDate = '".$row['OrderDate']."' and membername = "
                                . "'$user'");
                        $temp_user = mysql_query("SELECT rank,badge from abaokbah.member where username= '".$row['membername']."'");
                        $val = mysql_result($temp_user, 0, 'rank');
                        $bdg = mysql_result($temp_user, 0, 'badge');
                        
                        if($temp_blog){
                         while($roww = mysql_fetch_array($temp_blog)) 
                         {
                             echo "<div><span id='picinfo'>Posted by:". "<a href='profile.php?name="
                                .$roww['memname']."'> ".$roww['memname']."</a></span>"
                                     ."<span id='rank'>Rank: " .$val ."</span>"
                                     ."<span id='badge'>Badge: " .$bdg ."</span>"
                                     ."<span id='date'>Posted on: " 
                                .$roww['OrderDate'] ."</span></div>";// I changed date_time to OrderDate
                                echo "<center><p>". $roww['blog_title']. "</p></center>";
                                echo "<center><p id='blogg'>". $roww['blog']. "</p></center>";
                                echo "<tr >";
                                if($roww['memname']===$keyholder){
                            $pc = $roww['blog_id'];
                            echo "<center><input id='change' type='button' value='EDIT BLOG' onclick='editBlog(\"$pc\")'></center>";
                            echo "<center><input id='delete' type='button' value='DELETE' onclick='deleteBlog(\"$pc\")'></center>";
                        }
                                
                         }
                        }
                        
                        if($temp_pic){
                         while($roww = mysql_fetch_array($temp_pic)) 
                         {
                             $roww['picname'] = str_replace(' ', '', $roww['picname']);
                                echo "<div><span id='picinfo'>Posted by:". "<a href='profile.php?name="
                                .$roww['membername']."'> ".$roww['membername']."</a></span>"
                                        ."<span id='rank'>Rank: " .$val ."</span>"
                                        ."<span id='badge'>Badge: " .$bdg ."</span>"
                                        ."<span id='date'>Posted on: " 
                                        .$roww['OrderDate'] ."</span></div>";

                                echo "<center><p>". $roww['caption']. "</p></center>";
                                echo "<center><img src=./pics/" . $roww['picname'] ."></center>";
                                if($roww['membername']===$keyholder){
                            $pc = $roww['picname'];
                            echo "<center><input id='change' type='button' value='CHANGE CAPTION' onclick='changecap(\"$pc\")'></center>";
                            echo "<center><input id='delete' type='button' value='DELETE' onclick='deletepic(\"$pc\")'></center>";
                        }
                         }
                        }
                        
                    }
                    
                    $sql22 = "SELECT OrderDate FROM mempics UNION SELECT OrderDate FROM fp_blog";
			 $result2=mysql_query($sql22);
			  $rows=mysql_num_rows($result2);
                      
			  $no=ceil($rows/$num);
                          echo "<br><center><p style='font-size:19px;'>Page Number: </p>";
			  for($i=1;$i<=$no;$i++)
			  {
                              ?><a id='pg' href="profile.php?page=<?php echo $i ?>" style="text-decoration:none"><?php echo $i." "; ?></a><?php
			  }
                          echo "</center>";
                    
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
        
    <div id="footer"> Copyrights go to Ali Baokbah, Mansour Malaika and University of Denver, CS Department. &copy </div>
    </body>
</html>