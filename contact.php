
<?php
   session_start();

   include("db.php");

   if ($_SERVER['REQUEST_METHOD'] == "POST") 
   {
      $full_name = $_POST['full_name'];
      $email = $_POST['email'];
      $message = $_POST['message'];
      

    
    //   mysqli_query($con, $query);

    // Input validations
    $errors = array();

    if (empty($full_name) || empty($email) || empty($message)) {
       $errors[] = "All fields are required.";
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $full_name)) {
       $errors[] = "Full name should only contain letters and spaces.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
     }

     if (count($errors) === 0) {
        $query = "INSERT INTO contact (full_name, email, message) VALUES ('$full_name', '$email', '$message')";
        mysqli_query($con, $query);

        echo "<script type='text/javascript'> alert('Successfully submitted !') </script>";
     } else {
        foreach ($errors as $error) {
           echo "<script type='text/javascript'> alert('$error') </script>";
        }
     }
   } 

   ?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/contact.css">
        <style>
            body
            {
                background-image: url('bg5.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
            }
        </style>

    </head>

    <body>
        <section class="contact">
            <div class="content">
                <h2>Contact Us</h2>
                <p>We are always eager to hear from you</p>
            </div>
            <div class="button">
                <button class="btn1"><a href="index.html" style="text-decoration:none">Home</a></button>
              </div>
            <div class="container">
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon"><i class="fa fa-map-marker"></i></div>
                        <div class="text">
                            <h3>Adress</h3>
                            <p>34/2, Pasan Mawatha<br>Colombo 03<br>Sri Lanka</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-phone"></i></div>
                        <div class="text">
                            <h3>phone</h3>
                            <p>+94124345678</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-envelope-o"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>Res@avengahotels.com</p>
                        </div>
                    </div>
                </div>
                <div class="contactForm">
                    <form  action="#" method="POST">
                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" name="full_name" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="email" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="message" required="required">
                            <span>Type Your Message...</span>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="" value="send">
                        </div>
                </form>
                </div>
            </div>
        </section>
    </body>
</html>