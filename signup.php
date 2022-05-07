<!doctype html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<meta charset="utf-8">
<title>About us</title>
<style>
body
{
  background-image: url("https://www.tokkoro.com/picsup/3029533-coffee_color_cup-of-coffee_drink_fabric_notebook_notepad_office_paper_pattern_pen_placemat_table_textile_texture_work_workplace.jpg");
  font-size: 20px;
  
}
.error {color: #FF0000; 
    padding-top: 12px;
}
.submit_{
 border-radius: 20px;
  border: 1px solid #000000;
  background-color: #000000;
  color: #FFFFFF;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;}
  input {
  background-color: #eee;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}span {
  font-weight: bold;
  font-size: 12px;
}
form {
  background-color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  text-align: center;
}
.background
{
  max-width:700px;
  padding: 20px;
  position: relative;
  margin: 100px auto;
  background: rgba(255,255,255,0.8);
  font-family: Quicksand;
}
p{
  text-align: center;
}
h1{
  text-align: center;
} .container {
  background-color: #fff;
  border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
      0 10px 10px rgba(0,0,0,0.22);
      position: absolute;

left: 25%;
margin: -35px 0 0 -35px;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
  min-height: 480px;
}
button {
background-color: Transparent;
background-repeat:no-repeat;
border: none;
}
.square {position: absolute;width: 1600px;height: 80px;left: 0px;top: 0px; background-color: #000000;}
.b_signup{position: absolute;left: 1250px;top: 22px;font-family: 'Montserrat', sans-serif;font-style: normal;font-weight:normal;font-size: 30px;line-height: 34px;color: #FFF;font-size: 25px}
		.b_home{position: absolute;left: 1030px;top: 22px;font-family: 'Montserrat', sans-serif;font-style: normal;font-weight: normal;font-size: 30px;line-height: 34px;color: #FFF;font-size: 25px}
		.b_aboutus{position: absolute;left: 880px;top: 22px;font-family: 'Montserrat', sans-serif;font-style: normal;font-weight: bold;font-size: 30px;line-height: 34px;color: #FFF;font-size: 25px}
		.b_contact{position: absolute;left: 1013px;top: 22px;font-family: 'Montserrat', sans-serif;font-style: normal;font-weight: normal;font-size: 30px;line-height: 34px;color: #FFF;font-size: 25px}
		.b_wishlist{position: absolute;left: 1130px;top: 22px;font-family: 'Montserrat', sans-serif;font-style: normal;font-weight: normal;font-size: 30px;line-height: 34px;color: #FFF;font-size: 25px}		
		.b_logout{position: absolute;left: 1250px;top: 22px;font-family: 'Montserrat', sans-serif;font-style: normal;font-weight: normal;font-size: 30px;line-height: 34px;color: #FFF;font-size: 25px}
		.b_login{position: absolute;left: 1150px;top: 22px;font-family: 'Montserrat', sans-serif;font-style: normal;font-weight: normal;font-size: 30px;line-height: 34px;color: #FFF;font-size: 25px}
		.b_signup{position: absolute;left: 1250px;top: 22px;font-family: 'Montserrat', sans-serif;font-style: normal;font-weight:normal;font-size: 30px;line-height: 34px;color: #FFF;font-size: 25px}
    .b_notify_me{background: #000;border-radius: 35px;width: 20%;padding: 10px;color: white;
	</style>
</head>
<?php
	session_start();
			if(isset($_SESSION['login_user'])){
				 
				echo "<a href='logout.php'> <button class='b_logout'>Logout</button> </a>";
			}else{

				echo "<a href='signup.php'> <button class='b_signup'>SignUp</button> </a>";
				echo "<a href='login.php'> <button class='b_login'>Login</button> </a>";
			}
	?>
<body>
	<?php
include 'conn_sql.php';
$FirstName = $email = $password = $cpassword = "";
$nameErr = $emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["FirstName"])) {
    $nameErr = "Name is required";
  } else {
    $tempfirstname = test_input($_POST["FirstName"]);
    $tempemail = test_input($_POST["email"]);

    $sql1 = "select * from Persons where email='$tempemail';";
    $stmt_1 = mysqli_query( $conn, $sql1);
    $count = mysqli_num_rows($stmt_1);  
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$tempfirstname)) {
      $nameErr = "Only letters and white space allowed";
    } else if ($count>0) {
      $nameErr = "User already exists"
 ;   }else{
      $FirstName = test_input($_POST["FirstName"])
;    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $tempemail = test_input($_POST["email"]);

    $sql1 = "select * from Persons where email='$tempemail';";
    $stmt_1 = mysqli_query( $conn, $sql1);
    $count = mysqli_num_rows($stmt_1);  
    
    // check if e-mail address is well-formed
    if (!filter_var($tempemail, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }else if ($count>0) {
      $emailErr = "User already exists";
    }else{
      $email = test_input($_POST["email"]);
    }
  }

  if (empty($_POST["password"])) {
    $emailErr = "password is required";
  }
  if (empty($_POST["email"])) {
    $emailErr = "this field is required";
  }
  if ($_POST["password"] != $_POST["cpassword"]) {
  	$passwordErr = "Password mismatch";
  } else {
  	$password = $_POST["password"];
  	$cpassword = $_POST["cpassword"];
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
?>

		<div class="square" style="z-index: -1"><!-- <img src="aboutus_img.png"> --></div>		
		<div class="background" id="container">

		<h1>Create Account</h1>

<p><span class="error">* required field</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>Full Name<input type="text" name="FirstName" value="<?php echo $FirstName;?>">
        

		<p>Password</p><input type="password" name="password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passwordErr;?></span> 

		Confirm Password<input type="password" name="cpassword" value="<?php echo $cpassword;?>">

		Email<input type="text" name="email" value="<?php echo $email;?>">
  		<span class="error">* <?php echo $emailErr;?></span>  

		<input class="b_notify_me" type="submit" name="submit"><br>

</form>

<?php
// echo "<h2>Your Input:</h2>";
// echo $FirstName;
// echo "<br>";
// echo $email;
// echo "<br>";
// echo $password;
// echo "<br>";
// echo $cpassword;

if(($nameErr and $emailErr and $passwordErr) == ""){
  echo $nameErr.$emailErr.$passwordErr;
  	if(($FirstName and $email and $password and $cpassword) != ""){
      // echo $FirstName.$email.$password;
  		$sql = "INSERT INTO Persons (FullName, email, password) VALUES ('$FirstName', '$email', '$password')";
		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
		  	}
  }
 $conn->close();
?>
<!-- <p>Already Registered?<a href="login.php"> <button>Login</button> </a><br><br>
<a href="homepage2.php"> <button>Homepage</button> </a><br><br> -->
	</div>
</body>
</html>
