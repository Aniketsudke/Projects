
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup to iDiscuss</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/forum/partials/_handlesignup.php" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="Email1">Email Address or Username</label>
                        <input type="text" class="form-control" id="Email1" aria-describedby="emailHelp"
                            placeholder="Email Address" name="email" maxlength="50">

                    </div>
                    <div class="form-group">
                        <label for="Password1">Password</label>
                        <input type="password" class="form-control" id="Password1" placeholder="Password"
                            name="password">
                    </div>
                    <div class="form-group">
                        <label for="Password1">Confirm Password</label>
                        <input type="password" class="form-control" id="Password1" placeholder="Confirm Password"
                            name="cpassword">
                        <small id="emailHelp" class="form-text text-muted">Please fill same password.</small>
                    </div>
                    <button type="submit" class="btn btn-dark">Sign Up</button>

                </div>
            </form>
        </div>
    </div>
</div>