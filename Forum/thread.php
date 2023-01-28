<?php include 'partials/_dbconnect.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Discuss</title>
</head>

<body>
    <?php include 'partials/_header.php'; 
    include 'partials/_dbconnect.php'; 

    ?>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `thread` WHERE thread_id = '$id'";
            $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        $name = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        $sql2 = "SELECT user_email FROM `users` WHERE user_srno = '$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_email'];
    }
    ?>
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            $showAlert = false;
            $th_comment =  $_POST['comments'];
        $th_comment = str_replace("<", "&lt;", $th_comment);
        $th_comment = str_replace(">", "&gt;", $th_comment);
            $sno =  $_POST['sno'];
            $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `commnet_by`, `thread_time`) VALUES ( '$th_comment', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                if($showAlert){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Comment added succesfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                }
            }
        }
    ?>



    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $name; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <p><b>Posted by - <?php echo $posted_by; ?></b></p>

        </div>
    </div>
    
    <div class="container my-4">
        <h1>Post comment</h1>
        <?php
        if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
    echo '<form action="'. $_SERVER["REQUEST_URI"] .'" method="post">
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Type your comment</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comments"></textarea>
        <input type="hidden" name="sno" value = "'.$_SESSION["user_sno"].'">
    </div>
    <button type="submit" class="btn btn-dark">Post Comment</button>
</form>';}
else{
    echo '<div class = "container"><p class= "lead">You are not Login.</p></div>';
}

    ?>
    <div class="container my-4">
        <h2>Discussion</h2>        
        <?php
        $noResult = true;
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
                    $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $id = $row['comment_id'];
                $comments = $row['comment_content'];
                $comment_user_id = $row['commnet_by'];
                $sql2 = "SELECT user_email FROM `users` WHERE user_srno = '$comment_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo '<div class="media my-3">
                    <img src="img/img_user.png" class="mr-3" width = "54 px"  alt="userprofile">
                    <div class="media-body">
                      <p class="font-weight-bold my-0"> '.$row2['user_email'].' </p>  
                    '.$comments.'
                    </div>
                </div>';
            }
            if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <ph1 class="display-4">No Question</p>
              <p class="lead">Be the First person to ask a question.</p>
            </div>
          </div>';
            }
        
        ?>
    </div>

    </div>

    </div>

    <?php include 'partials/_footer.php'; ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>