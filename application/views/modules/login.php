
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
        <div class="row">
            <div class="col-sm-5">
                <div class="basic-login">
                    <?php echo form_open('login/validate_login'); ?>
                        <div class="form-group">
                            <label for="username"><i class="icon-user"><b>User Name</b></i> </label>
                            <input class="form-control" type="text" placeholder="Username" name="username" />
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="icon-password"><b>Password</b></i> </label>
                            <input class="form-control" type="password" name="password" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-blue pull-right">Login</button>
                        </div>
                        <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-1 social-login">
                <p>You can use your Facebook or Twitter for login</p>
                <div class="social-login-buttons">
                    <a href="#" class="btn-facebook-login">Use Facebook</a>
                    <a href="#" class="btn-twitter-login">Use Twitter</a>
                </div>
            </div>
        </div>
    </div>
</div>

