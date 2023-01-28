<?php
$ShowAlert = false;
$ShowError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include '_dbconnect.php'; 
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cpassowrd = $_POST["cpassword"];

  $user_exists = "SELECT * FROM `users` WHERE user_email = '$email'";
  $result = mysqli_query($conn, $user_exists);  
  $count_user = mysqli_num_rows($result);
  if($count_user >0 ){
    $ShowError = "Username Already Exists";
  }
  else{
    if(($password == $cpassowrd) ){
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` ( `user_email`, `user_password`, `user_created`) VALUES ('$email', '$hash', current_timestamp());";
      $result = mysqli_query($conn, $sql);
      if($result){
        $ShowAlert = true;
        header("Location: /forum/index.php?signupsuccess=true");
        exit();
      }
    }
    else{
      $ShowError = "Your Password is not Match";
    }
  }
  header("Location: /forum/index.php?signupsuccess=false&error=$ShowError");
}

?>