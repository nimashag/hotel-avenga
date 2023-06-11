<?php
   session_start();

   include("db.php");

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
      $username = $_POST['username'];
      $password = $_POST['password'];

      // Input validations
      $errors = array();

      if (empty($firstname) || empty($lastname) || empty($gender) || empty($mobile) || empty($email) ||
          empty($address) || empty($country) || empty($postalcode) || empty($dob) || empty($username) || empty($password)) {
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
         $query = "INSERT INTO registration (firstname, lastname, gender, mobile, email, address, country, postalcode, dob, username, password) VALUES ('$firstname', '$lastname', '$gender', '$mobile', '$email', '$address', '$country', '$postalcode', '$dob', '$username', '$password')";
         mysqli_query($con, $query);

         echo "<script type='text/javascript'> alert('Successfully Registered!') </script>";
         header('location:login.php');
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
    <title>Registration Form</title>	
	
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
		<form action="#" method="POST" onsubmit="return checkPassword()">
			<div>
				<h2>Registration</h2> <br>

				<label>First Name:</label> 
				<input type="text" name="firstname" placeholder="First Name" required> <br/><br/>

				<label>Last Name:</label> 
				<input type="text" name="lastname" placeholder="Last Name" required> <br/><br/>

				<label>Gender:</label>
				<input type="radio" name="gender" value="Male">Male
				<input type="radio" name="gender" value="Female" checked>Female<br/><br/>

				<label>Mobile Number:</label>
				<input type="phone" name="mobile" placeholder="0777777777" pattern="[0-9]{10}" required> <br/> <br/>

				<label>Email:</label>
				<input type="email" name="email" placeholder="abc@gmail.com" required> <br/> <br/>	

				<label>Address:</label>
				<textarea name="address" rows="1" cols="20" required></textarea> <br/> <br/>

				<label>Country:</label> 
				<input type="text" name="country" placeholder="Country Name" required> <br/><br/>

				<label>Postal Code:</label> 
				<input type="text" name="postalcode" placeholder="Postal Code" required> <br/><br/>

				<label>Birthday:</label>
				<input type="date" name="dob" required> <br/> <br/>

				<label>Username:</label> 
				<input type="text" name="username" placeholder="Username" required> <br/><br/>

				<label>Password:</label>
				<input type="password" name="password" id="pwd" required><br/><br/>

				<label>Re-Enter Password:</label>
				<input type="password" name="password" id="cnfrmpwd" required> <br/><br/>

				<br><center>
				<input type="checkbox" id="checkbox" class="inputStyle" onclick="enableButton()">Accept Privacy Policy and Terms<br/><br/>
				</center>   

				<center>
					<input type="submit" value="Register" id="submitBtn" disabled>
				</center> 

				<p><center>Already have an account?
					<a href="login.php" class="login-link">Login</a></center>
				</p> 
			</div>    
		</form>
	</right>
</body>
</html>
