<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num){
            while($row = mysqli_fetch_assoc($result)){
                if(password_verify($password , $row['user_password'])){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_sno'] = $row['user_srno'];
                    $_SESSION['username'] = $email;    
                }
                header("Location: /forum/index.php");
            }
            
        }
        header("Location: /forum/index.php");
        }
    ?>