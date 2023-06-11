<?php
  session_start();
  include("db.php");

  $user_data = null;
  $username = null;
  if (isset($_SESSION['user_data'])) {
    $user_data = $_SESSION['user_data'];
    $username = $_SESSION['user_data']['username'];
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $postalcode = $_POST['postalcode'];
    $dob = $_POST['dob'];

    # Input validations
    $errors = array();

    if (empty($firstname) || empty($lastname) || empty($gender) || empty($mobile) || empty($email) ||
      empty($address) || empty($country) || empty($postalcode) || empty($dob)) {
      $errors[] = "All fields are required.";
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $firstname)) {
      $errors[] = "First name should only contain letters and spaces.";
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $lastname)) {
      $errors[] = "Last name should only contain letters and spaces.";
    }

    if (!in_array($gender, array("Male", "Female"))) {
      $errors[] = "Invalid gender.";
    }

    if (!preg_match("/^\d{10}$/", $mobile)) {
      $errors[] = "Mobile number should be 10 digits long.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Invalid email address.";
    }

    if (!preg_match("/^[a-zA-Z0-9\s,'-]*$/", $address)) {
      $errors[] = "Invalid address.";
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $country)) {
      $errors[] = "Invalid country name.";
    }

    if (!preg_match("/^[0-9]{5}$/", $postalcode)) {
      $errors[] = "Postal code should be 5 digits long.";
    }

    if (count($errors) === 0) {
      $query = "UPDATE registration SET firstname='$firstname', lastname='$lastname', gender='$gender', mobile='$mobile', email='$email', address='$address', country='$country', postalcode='$postalcode', dob='$dob' WHERE username='$username'";
      mysqli_query($con, $query);

      echo "<script type='text/javascript'> alert('Profile updated successfully!') </script>";

      $query = "select * from registration where username = '$username' limit 1 ";
      $result = mysqli_query($con , $query);
      $user_data = mysqli_fetch_assoc($result);
      $user_data['password'] = null; # Avoid sharing password via session data
      $_SESSION['user_data'] = $user_data;
      header('location:user.php');
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
  <title>Update Profile</title>

  <link rel="stylesheet" href="css/logstyle.css">
  <link rel="stylesheet" href="css/Rformstyle.css">

</head>

<body>
  <right>
    <form action="#" method="POST">
      <div>
        <h2>Update Profile</h2> <br>

        <label>First Name:</label>
        <input type="text" name="firstname" value="<?php echo $user_data['firstname']; ?>" required>
        <br/><br/>

        <label>Last Name:</label>
        <input type="text" name="lastname" value="<?php echo $user_data['lastname']; ?>" required> <br/><br/>

        <label>Gender:</label>

        <?php if($user_data['gender'] == "Male") { ?>
            <input type="radio" name="gender" value="Male" checked>Male
            <input type="radio" name="gender" value="Female">Female<br/><br/>
        <?php } else { ?>
            <input type="radio" name="gender" value="Male">Male
            <input type="radio" name="gender" value="Female" checked>Female<br/><br/>
        <?php } ?>

        <label>Mobile Number:</label>
        <input type="phone" name="mobile" value="<?php echo $user_data['mobile']; ?>" pattern="[0-9]{10}" required> <br/> <br/>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user_data['email']; ?>" required> <br/> <br/>

        <label>Address:</label>
        <textarea name="address" rows="1" cols="20" required><?php echo $user_data['address']; ?></textarea> <br/> <br/>

        <label>Country:</label>
        <input type="text" name="country" value="<?php echo $user_data['country']; ?>" required> <br/><br/>

        <label>Postal Code:</label>
        <input type="text" name="postalcode" value="<?php echo $user_data['postalcode']; ?>" required> <br/><br/>

        <label>Birthday:</label>
        <input type="date" name="dob" value="<?php echo $user_data['dob']; ?>" required> <br/> <br/>


        <center>
          <input type="submit" value="Update Profile" id="submitBtn">
        </center>

        <p><center>Go back to
          <a href="user.php" class="login-link">User Profile</a></center>
        </p>
      </div>
    </form>
  </right>
</body>
</html>
