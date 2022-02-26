<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">
                <h2 class="card-text">Create Account</h2>
            <p class="card-text">Please Fill out This form to register with us</p>
            </div>
        
            <div class="card-body">
                <form id="registerForm" method="post" action="javascript:void(0)" autocomplete="off">
                <div class="success"></div>
                    <div id="name-group" class="form-group">
                        <label for="name">Name<sub>*</sub></label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg" value="">
                    </div>

                    <div id="email-group" class="form-group">
                        <label for="email">Email<sub>*</sub></label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" value="">
                    </div>
                    
                    <div id="password-group" class="form-group">
                        <label for="password">Password<sub>*</sub></label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" value="">
                    </div>

                    <div id="confirm-password-group" class="form-group">
                        <label for="confirm_password">Confirm Password<sub>*</sub></label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg" value="">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-success btn-block pull-left" value="Resgister">
                            </div>
                            <div class="col">
                                <a href="<?php echo URLROOT ;?>/users/login" class="btn btn-light btn-block pull-right">Already have account? Login </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>