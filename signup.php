<html>
<body>
	<script type="text/javascript">
		function create() {
				window.alert("submited")
		}	
	</script>

	<link rel="stylesheet" href="style.css">
	<div class="login-box">
		<h1>SIGNUP</h1>
	<form method="post" action="#">
			<div class="user-box">
		<input type='text' name='email' required="" /><label>Email</label><br>
	</div>
	<div class="user-box">
		<input type="text" name="user_name" required="" /><label>Username</label><br>
		</div>
<div class="user-box">
		<input type='password' name="pass" required="" /><label>Password</label><br>
		</div>
<div class="user-box">
		<input type='password' name="cpass" required="" /><label>ConfirmPassword</label><br>
	</div>
		<button name="submit"> Sign Up </button>
		<a href="login.php">Already user</a>
	</form>
</div>
</body>
</html>

<?php

	$conn = new mysqli('localhost','root','','userdata');

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	if (!empty($_POST))
	{
      $email = $_POST['email'];
      $user=$_POST['user_name'];
      $pass = $_POST['pass'];

      $sql = "INSERT INTO user (email,username,password) VALUES ('$email','$user','$pass')";

	  if ($conn->query($sql) === TRUE) {
	  			 echo '<script type="text/JavaScript">  
     window.alert("Account Created Successfully"); 
     </script>' ;
	     header("location:login.php");
	   } else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	   }

	}
?>

