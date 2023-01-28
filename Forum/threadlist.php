<?php include 'partials/_dbconnect.php'; ?>
<?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE category_id = '$id'";
            $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>
 
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Thread List</title>
</head>

<body>
<?php include 'partials/_header.php'; ?>
<?php
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            $showAlert = false;
            $th_title = $_POST['title'];
            $th_desc =  $_POST['desc'];

            $th_title = str_replace("<", "&lt;", $th_title);
            $th_title = str_replace(">", "&gt;", $th_title);
            $th_desc = str_replace("<", "&lt;", $th_desc);
            $th_desc = str_replace(">", "&gt;", $th_desc);

            $sno =  $_POST['sno'];
            $sql = "INSERT INTO `thread` (`thread_title`,`thread_desc`,`thread_cat_id`,`thread_user_id`,`timestamp`) VALUES ('$th_title','$th_desc','$id','$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
    if ($result) {
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Question has been asked.
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
            <h1 class="display-4">Welcome to <?php echo $catname; ?></h1>
            <p class="lead"><?php echo $catdesc; ?></p>

        </div>
    </div>

    <!-- Ask Question Section -->
    <?php
    // session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo ' <div class="container">
    <h1>Ask a Question</h1>
    <form  action="'.$_SERVER["REQUEST_URI"].'" method = "post">
        <div class="form-group">
            <label for="exampleInputEmail1">Problem Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Type titile as short as possible.</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Elaborate the Problem</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
            <input type="hidden" name="sno" value = "'.$_SESSION["user_sno"].'">
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>';}
else{
        echo '<div class = "container"><p class= "lead">You are not Login.</p></div>';
}

    ?>
   
    <div class="container my-4">
        <h1>Browse Questions</h1>
        <!-- php contain -->
        <?php
        $noResult = true;
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `thread` WHERE thread_cat_id = $id";
                    $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $thread_user_id = $row['thread_user_id'];
                $sql2 = "SELECT user_email FROM `users` WHERE user_srno = '$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo '<div class="media my-3">
                    <img src="img/img_user.png" class="mr-3" width = "54 px"  alt="userprofile">
                    <div class="media-body">
                        <h5 class="mt-0"><a class = "text-dark" href = "thread.php?threadid='.$id.'">'.$title.'</a></h5>
                        <p class ="text-secondary">By <b>'.$row2['user_email'].'</b></p>
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