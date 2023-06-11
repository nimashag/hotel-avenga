<?php
   session_start();

   include("db.php");

   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            $query = "select * from registration where username = '$username' limit 1 ";
            $result = mysqli_query($con , $query);

            if($result)
            {
               if($result && mysqli_num_rows($result) > 0)
               {
                   $user_data = mysqli_fetch_assoc($result);

                   if($user_data['password'] == $password)
                   {
                       $user_data['password'] = null; # Avoid sharing password via session data
                       $_SESSION['user_data'] = $user_data;
                       header("location: index.php");
                       die;
                   }
               } 
            }
            echo "<script type = 'text/javascript'> alert('Wrong Username or Password !') </script>";
        }
        else
        {
            echo "<script type = 'text/javascript'> alert('Wrong Username or Password !') </script>";
        }
   }

?>   

<!DOCTYPE HTML>
<html lang = "en" dir="ltr">

<head>
    <meta charset=""utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=""viewpoint" content="width=device-width , initial-scale=1.0">
    <title> Hotel Avenga</title>
    <link rel="stylesheet" href="css/logstyle.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    
</head>

<body>

    <br/><br/><br/><br/>

    <center>
    <div class="wrapper">


        <div class="form-box login">
            <h2>Login</h2>
            <form action="#" method="POST">
                <div class="input-box">
                    <div class="fas fa-user" id="user"></div>
                    <input type="username" name="username"   required>
                    <label>Username</label>
                </div>
                
                <div class="input-box">
                    <div class="fas fa-lock" id="lock"></div>
                    <input type="password"  name="password" required>
                    <label>Password</label>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox">
                    Remember me</label><a href="register.php">Forgot Password?</a>
                </div>

                <!-- <button type="submit" onclick="myFunction()" class="btn">Login</button>  -->
                <a href="#">
                <button id="logButton" class="btn">Login</button> 
                </a>

                <div class="login-register">
                    <p>Don't have an account?
                        <a href="register.php" class="register-link">Register</a>
                    </p>
                </div>
            </form>
        </div>

        

    </div>
    </center>
    
    

</body>

</html>