<?php
   include('conn_sql.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   echo "This is Session".$user_check;
   
   $ses_sql = mysqli_query($conn,"select email from Persons where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   // if($row != null){
   $login_session = $row['email'];
   // } else { $login_session = ""; }
   
   // if(!isset($_SESSION['login_user'])){      //there is a problem with !isset, the first time login_user wont have any value and thus return false, thus opening the signup page each time
      // header("location:homepage2.php");
      // die();
   // }
?> 