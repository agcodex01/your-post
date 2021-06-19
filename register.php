<?php
include_once './auth_header.php';

if (isset($_POST['user_btn_submit'])) {

    $request = new  UserRequest($_POST);

    $userCount = User::checkEmailDuplicate($connection, $request->email);

    if ($userCount == 0) {
        $user =  User::create($connection, $request);

        Auth::setUser($user);

        echo "<script> window.location.replace('./dashboard.php')</script>";
        
    } else {
        $_SESSION['hasError'] = true;
    }
}
?>
<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <?php if (isset($_SESSION['hasError'])) { ?>
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        Email alreday exists.
                                    </div>
                                </div>
                            <?php } ?>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="firstname">First Name</label>
                                        <input id="firstname" type="text" class="form-control" name="firstname" required autofocus>
                                        <div class="invalid-feedback">
                                            The field firstname is required.
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="last_name">Last Name</label>
                                        <input id="last_name" type="text" class="form-control" name="lastname" required>
                                        <div class="invalid-feedback">
                                            The field lastname is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                    <div class="invalid-feedback">
                                        The field email is required.
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        <div class="invalid-feedback">
                                            The field password is required.
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password-confirm" required>
                                        <div class="invalid-feedback">
                                            The field password should match.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                        <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="user_btn_submit">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-4 text-muted text-center">
                            Already Registered? <a href="./index.php">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include './auth_footer.php';
