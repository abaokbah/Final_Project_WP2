<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    //Start session
    session_start();	
    //Unset the variables stored in session
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_FIRST_NAME']);
    unset($_SESSION['SESS_LAST_NAME']);
    
?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- A small part of php segment came from a source code 
    http://www.sourcecodester.com/tutorials/php/4341/how-create-login-page-phpmysql.html
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>The Colosseum | Login</title>
        <link rel="stylesheet" type="text/css" href="LoginStylesheet.css">
        <style>
            
            table {
                width:305px;
            }
            
        </style>
    </head>
    <body>
        
        <audio controls autoplay loop>
            <source src="hotsTheme.wav" type="audio/mpeg"><!-- ENABLE WHEN DONE DEBUGGING!!!!-->
            
        </audio>
        
        
    <center><img src='HOTS-Open-Beta-screen.png' alt='hots' style='width:96%;'></center>
    <center><div id='welcome'>The Storm Colosseum</div></center>
        <form id = "indexform" name="loginform" action="login_exec.php" method="post">
            <table border="0" align="center" cellpadding="2" cellspacing="5">
            <tr>
            <td colspan="2">
            <!--the code bellow is used to display the message of the input validation-->
            <?php
            if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) 
                    && count($_SESSION['ERRMSG_ARR']) > 0 ) 
            {
                echo '<ul class="err">';
                foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                    echo '<li>',$msg,'</li>';
                }
            echo '</ul>';
            unset($_SESSION['ERRMSG_ARR']);
            }
            ?>
            </td>
            </tr>
            <tr>
                <td width="116"><div align="right" style="color: #3F0A73; font-family: monaco;">Username</div></td>
                <td width="177"><input name="username" type="text" /></td>
            </tr>
            <tr>
                <td><div align="right" style="color: #3F0A73; font-family: monaco;">Password</div></td>
                <td><input name="password" type="password" /></td>
            </tr>
            <tr>
                <!--<td><div align="right" ></div></td>-->
                <td><input name="loging" class="button button1" type="submit" value="Login" /></td>
                <td></td>
            </tr>
            <tr>
            <p align="center"><a href="registration.php">Sign up</a></p>
            </tr>
            </table>
        </form>
        <form>
            
        </form>
    </body>
</html>
