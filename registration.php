<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!-- Validate user input for registration -->
<!-- A slight use of a source code -->

<html>
    <head>
        <title>Registration</title>
        <style>
            
            body {
                background: url("blue_and_yellow_by_emina2492-d319f9w.jpg");
                background-repeat: no-repeat;
                width: 100%;
                height: 100%;
            }
            
            #myform {
                margin-top: 50px;
                //margin-left: 30px;
                color: navy;
            }
            
            td {
                font-family: monaco; font-weight: bold; 
            }
            
            h2 {
                font-family: monaco; color: navy; font-weight: bold; margin-left: 25%; margin-top: 70px;
            }
            
        </style>
        
    </head>
    <body>
        <h2>Welcome to Blue Skies Photo Sharing Website</h2>
        <form id="myform" name="reg" action="insertmem.php" method="post">
            <table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
            <td colspan="2">
            <div align="center">
            
            </div></td>
            </tr>
            <tr>
                <td width="200"><div align="right">First Name:</div></td>
                <td width="171"><input type="text" name="fname" /></td>
            </tr>
            <tr>
                <td><div align="right">Last Name:</div></td>
                <td><input type="text" name="lname" /></td>
            </tr>
            <tr>
                <td><div align="right">Gender:</div></td>
                <td><input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="Female">Female</td>
            </tr>
            <!--
            <tr>
                <td><div align="right">Picture:</div></td>
                <td><input type="text" name="pic" /></td>
            </tr>-->
            <tr>
                <td><div align="right">Username:</div></td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td><div align="right">Password:</div></td>
                <td><input type="password" name="password" /></td> <!-- Change type to password later -->
            </tr>
            <tr>
                <td><div align="right"></div></td>
                <td><input type="button" value="Sign up" onclick="validateData()"/></td>
            </tr>
            </table>
            
        </form>
        
        
        <script>
        
        function validateData()
        {//console.log("I'm here!!");
            var obj = document.getElementById("myform");
            var a=document.forms["reg"]["fname"].value;
            var b=document.forms["reg"]["lname"].value;
            var c=document.forms["reg"]["gender"].value;
            //var f=document.forms["reg"]["pic"].value;
            var g=document.forms["reg"]["username"].value;
            var h=document.forms["reg"]["password"].value;
            var ffnm, flnm, ffsr, ffsd = false;
            if (a===null || a==="" || (/[^A-Za-z]/.test(a)))
            {
                alert("First name must be filled out");
                document.forms["reg"]["fname"].style.background="#F7AA00";
            }
            else {
                document.forms["reg"]["fname"].style.background="white";
                ffnm = true;
            }
            if (b==null || b=="" || (/[^A-Za-z]/.test(b)))
            {
                alert("Last name must be filled out");
                document.forms["reg"]["lname"].style.background="#F7AA00";
                
            }
            else {
                document.forms["reg"]["lname"].style.background="white";
                flnm = true;
            }

            if (g==null || g=="" || (/[^A-Za-z0-9_-]/.test(g)))
            {
                alert("username must be filled out");
                document.forms["reg"]["username"].style.background="#F7AA00";
                
            }
            else {
                document.forms["reg"]["username"].style.background="white";
                ffsr = true;
            }
            if (h==null || h=="" || (/[^A-Za-z0-9]/.test(h)))
            {
                alert("password must be filled out");
                document.forms["reg"]["password"].style.background="#F7AA00";
                
            }
            else {
                document.forms["reg"]["password"].style.background="white";
                ffsd = true;
            }
            
            if(ffnm === true && flnm === true && ffsr === true && ffsd === true)
            {
                //console.log("I'm here!!");
                setTimeout(function() {obj.submit();}, 500);
            }
        }
        
        </script>
    </body>
</html>