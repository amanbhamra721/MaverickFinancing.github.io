<?php
   include('conn_sql.php');
   session_start();
?>
<!doctype html>
<html>
<head>
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<meta charset="utf-8">
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
body
{
  background-image: url("dashboard_background.jpg");
  background-size: 100% 100%;
  color: white;
  overflow: hidden
}
.bgimg {
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
.container{position: relative;
  width: 300px;
  height: 200px;
}
.block {
   background-color: black;
   opacity: 0.5;
}
.text {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.b_login{position: absolute;left: 1150px;top: 22px;font-family: 'Montserrat', sans-serif;font-style: normal;font-weight: normal;font-size: 30px;line-height: 34px;color: black;font-size: 25px}
      .b_signup{position: absolute;left: 1250px;top: 22px;font-family: 'Montserrat', sans-serif;font-style: normal;font-weight:normal;font-size: 30px;line-height: 34px;color: black;font-size: 25px}
      .square {padding: 50px; margin: 150px; text-align: center; background: rgba(0, 0, 0, .5)    /*  40% opaque green */}
</style>
</head>
<body>

    <?php
   if(isset($_SESSION['login_user'])){

            echo "<a href='signup.php'> <button class='b_logout'>Logout</button> </a>";
         }else{

            echo "<a href='signup.php'> <button class='b_signup'>SignUp</button> </a>";
            echo "<a href='login.php'> <button class='b_login'>Login</button> </a>";
         }
?>
   <div class="square">
<h1 class="w3-jumbo w3-animate-top">DASHBOARD</h1>;
<hr class="w3-border-grey" style="margin:auto;width:40%">

   <br><br><br>
   <h2>YOU INVESTED :</h2>
   <h2>YOUR PROFIT :</h2>
 
<div>
<a href='add_funds.php'> <button>INVEST</button> </a>
<a href='login.php'> <button>WITHDRAW</button> </a>
   </div>
    </div>
</body>
</html>
