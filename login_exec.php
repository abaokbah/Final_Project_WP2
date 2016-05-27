<html>
    <body>
        
        <!-- I used a source code to figure out the idea of a login page.
            I also added security measures to prevent corss-site scripting.
            http://www.sourcecodester.com/tutorials/php/4341/how-create-login-page-phpmysql.html -->
        
        <?php
        //Start session
        session_start();

        include("connection.php");

        if($_SERVER["REQUEST_METHOD"] == "POST")
               {
                   htmlspecialchars($_POST["username"]);
                   strip_tags($_POST["username"]);
                   stripcslashes($_POST["username"]);
                   htmlspecialchars($_POST["password"]);
                   strip_tags($_POST["password"]);
                   stripcslashes($_POST["password"]);
               }

        //Array to store validation errors
        $errmsg_arr = array();

        //Validation error flag
        $errflag = false;

        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) 
        {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_real_escape_string($str);
            //return $str;
        }
        
        //Sanitize the POST values
        $username = clean($_POST['username']);
        $password = clean($_POST['password']);

        //Input Validations
        if($username == '' || $username == null) {
            $errmsg_arr[] = 'Username missing';
            $errflag = true;
        }
        if($password == '' || $password == null) {
            $errmsg_arr[] = 'Password missing';
            $errflag = true;
        }

        //If there are input validations, redirect back to the login form
        if($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location: index.php");
            exit();
        }

        //Create query
        $qry="SELECT * FROM member WHERE username='$username' AND password='$password'";
        //$result=mysqli_query($con, $qry);
        $result=mysql_query($qry);

        //Check whether the query was successful or not
        if($result) {
            if(mysql_num_rows($result) > 0) {
                //Login Successful
                session_regenerate_id();
                $member = mysql_fetch_assoc($result);
                $_SESSION['SESS_MEMBER_ID'] = $member['mem_id'];
                $_SESSION['SESS_FIRST_NAME'] = $member['username'];
                $_SESSION['SESS_LAST_NAME'] = $member['password'];
                session_write_close();
                header("location: home.php");
                exit();
            }
            else {
                //Login failed
                $errmsg_arr[] = 'Couldn\'t detect a username or the password. Try again';
                $errflag = true;
                if($errflag) {
                    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                    session_write_close();
                    header("location: index.php");
                exit();
                }
            }
        }
        else {
            die("Query failed");
        }
    ?>

    </body>
</html>
