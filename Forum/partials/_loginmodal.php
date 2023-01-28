<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to iDiscuss</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form action ="/forum/partials/_handlelogin.php" method = "post">
            <div class="modal-body">
                
                    <div class="form-group">
                        <label for="Email1">Email address or Username</label>
                        <input type="text" class="form-control" id="Email1" aria-describedby="emailHelp" name = "email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name ="password">
                    </div>
                    <button type="submit" class="btn btn-dark">Login</button>
                
            </div>
        </form>
            
        </div>
    </div>
</div>