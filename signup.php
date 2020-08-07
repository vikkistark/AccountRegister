

<html>
<body>
	<script type="text/javascript">
		function create() {
				window.alert("submited")
		}	
		/*function show()
		{
				var user=document.getElementById("uid").value;
				var pass=document.getElementById("pid").value;
				if(pass.length>=8)
				{

				}
				else
				{
		      window.alert("enter 8 digit password")
				exit();
				}
		}
	</script>

	<link rel="stylesheet" href="style.css">
	<div class="login-box">
		<h1>SIGNUP</h1>
	<form method="post" action="#">
			<div class="user-box">
		<input type='text' name='email' required="" id="uid"/><label>Email</label><br>
	</div>
	<div class="user-box">
		<input type="text" name="user_name" required="" /><label>Username</label><br>
		</div>
<div class="user-box">
		<input type='password' name="pass" required="" id="pid"/><label>Password</label><br>
		</div>
<div class="user-box">
		<input type='password' name="cpass" required="" id="pid2"/><label>ConfirmPassword</label><br>
	</div>
		<button name="submit" onclick="show()"> Sign Up </button>
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
      $cpass=$_POST['cpass'];
      //$email = test_input($_POST["email"]);
      if(strlen(trim($pass)) < 8)
      {
     echo '<script type="text/JavaScript">  
     window.alert("password should contain 8 characters"); 
     </script>' ;
      }
      elseif ($pass!=$cpass) {
      	echo '<script type="text/JavaScript">  
     window.alert("password doesnt match"); 
     </script>' ;
      	
      }
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
  		echo '<script type="text/JavaScript">  
     window.alert("invalid email format"); 
     </script>' ;
	  }
      else{
      $sql = "INSERT INTO user (email,username,password) VALUES ('$email','$user','$pass')";

	  if ($conn->query($sql) === TRUE) {
	  			 echo '<script type="text/JavaScript">  
     window.alert("Account Created Successfully"); 
     </script>' ;
	     header("location:login.php");
	   } 
	   else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	   }
	}

	}


?>

