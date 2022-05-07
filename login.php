<?php      
    include 'conn_sql.php';  
    session_start();
    $email = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($conn, $email);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select * from Persons where email = '$email' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        

        if($count == 1){  
            $_SESSION['login_user'] = $email;

            // include this line to redirect ot other page after login
            header("Location:dashboard.php");
            echo "<h1><center> Login successful </center></h1>";  
        } 
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
            echo $_SESSION['login_user'];
            if(!isset($_SESSION['login_user'])){
                header("location:dashboard.php");
            }
        }
        }  
      
?>  

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
  margin: 50px auto;
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
	
		<div class="square" style="z-index: -1"><!-- <img src="aboutus_img.png"> --></div>		
		<div class="background" id="container">

		<h1>Login</h1>
    <form action = "" method = "post">
      <br><br>
      UserName  :<input type = "text" name = "email" value="<?php echo $email;?>"><br /><br />
        Password  :<input type = "password" name = "password" value="<?php echo $password;?>"><br/><br />
        <input class="b_notify_me" type = "submit" value = " Submit "/><br /><br />
    </form>  

	</div>
</body>
</html>
