
			<body>
				<script type="text/javascript">
					function show(){
						var user=document.getElementById("uid").value;
						var pass=document.getElementById("pid").value;
						if(pass.length<8)
						{
							window.alert("field should contain atleast 8 characters")
						}
						if(!empty(uid)&&!empty(pid))
						{
							$sql="select user,pass from userdata where user='uid' and pass='pid';";
							window.alert(user)
							window.alert(pass) 
						}
						else{
							window.alert("no such login data")
						}
					}
				</script>

		<link rel="stylesheet" href="style.css">
		<div class="login-box">
			<h1>LOGIN</h1>
		<form method="post">
	<div class="user-box">
		<input type='text' name="email" required="" /><br>
		<label>Username</label>
	</div>
	<div class="user-box">
		<input type='password' name="pass" required="" /><br>
		<label>Password</label>
	</div>
		<button  onclick="show()">Login </button>

		<a href="signup.php">Sign up</a>
	</form>
</div>
		</body>

<?php


	$conn = new mysqli('localhost','root','','userdata');

	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}


	if (!empty($_POST))
	{
      $email = $_POST['email'];
      $pass = $_POST['pass'];

      $sql = "SELECT email,password FROM user WHERE email='".$email."'AND password='".$pass."'";
 

      /*if($result=$conn->query($sql))
      {
      	echo"login sucessfully";
      	echo"<pre>";
	  }
	  else
	  {
	  	echo"invlaid login";

	}*/
	$result = $conn->query($sql);

		if (!empty($result) && $result->num_rows > 0) {
		
		  while($row = $result->fetch_assoc()) 
		  {
		    header("location: welcome.php");

		  }
		} 
		else
		 {
		 echo '<script type="text/JavaScript">  
     window.alert("Invalid email or password"); 
     </script>' ;
		 }
    }
?>
