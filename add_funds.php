<?php
   include('conn_sql.php');
   session_start();

   echo "DASHBOARD";
   if(isset($_SESSION['login_user'])){

            echo "<a href='signup.php'> <button class='b_logout'>Logout</button> </a>";
         }else{

            echo "<a href='signup.php'> <button class='b_signup'>SignUp</button> </a>";
            echo "<a href='login.php'> <button class='b_login'>Login</button> </a>";
         }
   ECHO "<br><br><br>";
   echo "YOU INVESTED :"."<br><br>";
   echo "YOUR PROFIT :";
   
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

</style>
</head>

<?php
         
   ?>
<body>
   <div>
         <h1>Add funds</h1>
         <br><br>
         Enter amount you want to add: <input type="number" name="amount"><br><br>
         Payment options: <br>


   </div>
</body>
</html>