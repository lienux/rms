<div class="card-body" id="form-login" style="background-color:rgba(192,192,192,0.8);">
    <div id="loader-login" class="text-center"></div>
    <form>
        <div class="form-group">
            <label class="mb-1" for="inputEmailAddress">
                Email
            </label>
            <input type="email" class="form-control py-4" name="txtUser" type="email" placeholder="Enter email address" />
        </div>
        <div class="form-group">
            <label class="mb-1" for="inputPassword">
                Password
            </label>
            <input type="password" class="form-control py-4" name="txtPasswd" placeholder="Enter password" />
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
            </div>
            <div class="custom-control">
                <a class="small" href="#" onclick="forget_passwd();">Forgot Password?</a>
            </div>
        </div>
        <!-- <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"> -->
        <div class="form-group text-right mb-0">
            <a class="btn btn-primary" href="#" id="login">Login</a>
        	<a class="btn btn-secondary" href="#" onclick="forget_passwd();" id="register">Register</a>
        </div>
    </form>
</div>
<div class="card-footer text-center" style="background-color:rgba(192,192,192);">
    <div class="small">v1.0</div>
</div>