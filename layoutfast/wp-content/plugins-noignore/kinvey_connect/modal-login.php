<div class="modal">
    <div class="modal-dialog" id="modal-login">
        <div class="modal-header">
            <div><img src="<?php echo plugin_dir_url(__FILE__) . "images/svg/layoutfast.svg"?>" alt="layoutFast"></div>
            <div>
                <h3><strong>layout</strong>FAST</h3>
                <p>Enter your credentials</p>
            </div>
        </div>
        <div class="modal-body modal-content">
            <table class="form full-width">
                <tr>
                    <td><label>Email:</label></td>
                    <td colspan="2"><input type="text" class="full-width" id="login-email"></td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td colspan="2"><input type="password" class="full-width" id="login-password"></td>
                </tr>
                <tr>
                    <td width="30%">&nbsp;</td>
                    <td width="35%"><span class="small"><input type="checkbox" id="login-keeploggedin"> Keep me signed in</span></td>
                    <td width="35%"><span class="small"><a href="javascript:void(0);" onclick="displayForgotPasswordModal()">Forgot your password?</a></span></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer modal-content">
            <div>
                <img src="<?php echo plugin_dir_url(__FILE__) . "images/lio-schneider-green.png"?>">
            </div>
            <div>
                <button class="btn btn-primary btn-full" onclick="displaySignupModal()">Register</button>
                <button class="btn btn-secondary btn-full" onclick="loginKinvey()">Login</button>
            </div>
        </div>
    </div>
</div>
