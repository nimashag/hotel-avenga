
<?php
  session_start();
  include("db.php");

  $user_data = null;
  $username = null;
  if (isset($_SESSION['user_data'])) {
    $user_data = $_SESSION['user_data'];
    $username = $_SESSION['user_data']['username'];
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['changePassword'])) {
    $password = $_POST['password'];

    // Input validations
    $errors = array();

    if (empty($username) || empty($password)) {
      $errors[] = "Username and password are required.";
    }

    if (count($errors) === 0) {
      $query = "UPDATE registration SET password='$password' WHERE username='$username'";
      mysqli_query($con, $query);

      echo "<script type='text/javascript'> alert('Password updated successfully!') </script>";

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

  <script>
    function enableButton() {
      const checkbox = document.getElementById('checkbox');
      const submitBtn = document.getElementById('submitBtn');
      submitBtn.disabled = !checkbox.checked;
    }

    function checkPassword() {
      const password = document.getElementById('pwd').value;
      const confirmPassword = document.getElementById('cnfrmpwd').value;
      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
      }
      return true;
    }
  </script>
</head>

<body>
  <right>
    <form action="#" method="POST">
      <div>
        <h2>Change Password for <?php echo $user_data['username']; ?></h2> <br>

        <label>New Password:</label>
        <input type="password" name="password" id="pwd" required><br/><br/>

        <label>Confirm Password:</label>
        <input type="password" name="confirmPassword" id="cnfrmpwd" required> <br/><br/>

        <center>
          <input type="submit" name="changePassword" value="Change Password">
        </center>

        <p><center>Go back to
          <a href="user.php" class="login-link">User Profile</a></center>
        </p>
      </div>
    </form>
  </right>
</body>
</html>
