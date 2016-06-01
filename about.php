<!DOCTYPE html>
<?php 
    session_start();
    include("connection.php");
    ?>
<html id='html'>
    <head>
        <title>The Colosseum | ABOUT</title>
        <link rel="stylesheet" type="text/css" href="AssignmentStylesheet.css">
        
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

        </span><h1 style='font-family: calibri; margin-left: 45px;'>  What we do </h1>
                    <div style='margin-left:45px; margin-right:45px; background: #BDBCB7; '><span style='font-family: calibri; font-size: 20px; color:#FFFCF5'> 
                    Welcome to The Heroes Colosseum! This website is dedicated to creating a more social Heroes of the Storm
                    application that allows community members to socialize with each other. Members can post blogs and pictures
                    about their in-game experiences for the purpose of creating a more intact and fun community. Feel free to let us
                    know your favorite in-game heroes, maps and much more. See you in the Nexus.
                    </span></div><br><br>
                    
                    <div style='margin-left:45px; margin-right:45px; background: #BDBCB7; '><span style='font-family: calibri; font-size: 20px; color:#FFFCF5'> 
                            Things to keep in mind when posting:<br>
                    -- You can only upload images that are 3 Megabytes in size or less.<br>
                    -- Only images of the following extensions are allowed: gif, jpeg, jpg, pjpeg, x-png, or png.<br>
                    -- Blogs need to have a title and some content -preferably Hots related- in order for them to be posted.<br>
                    </span></div><br><br>
                    
                    <div style='margin-left:45px; margin-right:45px; background: #BDBCB7; '><span style='font-family: calibri; font-size: 20px; color:#FFFCF5'> 
                            About using the platform:<br>
                    -- Posting anything on the platform earns a rank.<br>
                    -- For each five ranks, you earn a badge that signifies your contributions to the website.<br>
                    -- You also earn 2 ranks once you get a new badge to speed up progression.<br>
                    -- You can change the background and font color of the website to personalize your experience.<br>
                    -- It's also possible to choose the number of entries you would like to see on the homepage.<br>
                    </span></div>
                    
                <br>
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
                    }?>
                
        <div id="footer"> Copyrights go to Ali Baokbah, Mansour Malaika and University of Denver, CS Department. &copy </div>
        
    </body>
</html>