
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Sign Up</h1>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="container">


        <div class="panel alert-danger"><?php echo validation_errors(); echo $this->error_message; ?></div>
         <div class="row">
            <div class="col-sm-5">
                <div class="basic-login">
                    <?php echo form_open('signup/validate_form'); ?>
                        <div class="form-group">
                            <label for="first_name"><i class="icon-lock"></i> <b>First Name</b></label>
                            <input class="form-control" id="first_name" type="text" placeholder="First Name" value="<?php echo set_value('first_name'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name"><i class="icon-lock"></i> <b>Last Name</b></label>
                            <input class="form-control" id="last_name" type="text" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="register-username"><i class="icon-user"></i> <b>User Name</b></label>
                            <input class="form-control" id="register-username" type="text" placeholder="User Name" value="<?php echo set_value('username'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="register-email"><i class="icon-user"></i> <b>Email</b></label>
                            <input class="form-control" id="register-email" type="text" placeholder="Email" value="<?php echo set_value('email'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="register-password"><i class="icon-lock"></i> <b>Password</b></label>
                            <input class="form-control" id="register-password" type="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="register-password2"><i class="icon-lock"></i> <b>Re-enter Password</b></label>
                            <input class="form-control" id="register-password2" type="password" placeholder="Re-enter Password" value="<?php echo set_value('passconf'); ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn pull-right" name="register">Register</button>
                            <div class="clearfix"></div>
                        </div>

                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-1 social-login">
                <p>You can use your Facebook or Twitter for registration</p>
                <div class="social-login-buttons">
                    <a href="#" class="btn-facebook-login">Use Facebook</a>
                    <a href="#" class="btn-twitter-login">Use Twitter</a>
                </div>
            </div>
        </div>

    </div>
</div>
