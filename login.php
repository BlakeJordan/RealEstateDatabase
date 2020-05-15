<?php
   include("config.php");
   session_start();
   echo "<h1>Buyer has been successfully added0.</h1>";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT userid FROM Users WHERE userid = '$myusername' and password= '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);
		echo "<h1>Buyer has been successfully added.</h1>";
      if($count == 1) {
         echo "<h1>Buyer has been successfully added2.</h1>";
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: home.html");
      }else {
         echo "<h1>Buyer has been successfully added3.</h1>";
         $error = "Your Email or Password is invalid";
      }
      echo "<h1>Buyer has been successfully added4.</h1>";
   }
?>
