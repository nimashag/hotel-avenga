<?php
     include('db.php');

     session_start();

     $display_name = "Guest";
     if(isset($_SESSION['user_data'])){
        $display_name = $_SESSION['user_data']['firstname']." ".$_SESSION['user_data']['lastname'];
     };

     $image_url = "img/default-avatar.png";
     if (isset($_SESSION['user_data']['image_url'])) {
        $image_url = $_SESSION['user_data']['image_url'];
     }

     if(isset($_GET['logout'])){
        unset($display_name);
        session_destroy();
        header('location:login.php');
     }
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/user.css">

    <style>
      body
      {
          background-image: url('bg0.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: 100% 100%;
      }
  </style>

</head>
<body>

<div class="container">

   <div class="profile">
      <img src=<?php echo $image_url; ?>>
      <h3><?php echo $display_name; ?></h3>
      <a href="update_profile.php" class="btn">Update Profile</a>
      <a href="update_password.php" class="btn">Update Password</a>

      <p><center>Go back to
        <a href="index.php" class="login-link">Home</a></center>
      </p>

      <a href="?logout" class="nav-link">Logout</a>
   </div>

</div>

</body>
</html>