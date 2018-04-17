<div class="modal">
    <div class="modal-dialog" id="modal-forgotpassword">
        <div class="modal-header">
            <div><img src="<?php echo plugin_dir_url(__FILE__) . "images/svg/layoutfast.svg"?>" alt="layoutFast"></div>
            <div>
                <h3><strong>layout</strong>FAST</h3>
                <p>Enter your email address</p>
            </div>
        </div>
        <div class="modal-body modal-content">
            <table class="form full-width">
                <tr>
                    <td width="30%"><label>Email:</label></td>
                    <td width="70%"><input type="text" class="full-width" id="forgotpass-email"></td>
                </tr>
                <tr>
                    <td colspan="2"><span class="color-yellow" id="forgotPasswordMsg"><span></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer modal-content">
            <div>
                <img src="<?php echo plugin_dir_url(__FILE__) . "images/lio-schneider-green.png"?>">
            </div>
            <div>
                <button class="btn btn-primary btn-full" onclick="resetKinveyPassword()">Reset Password</button>
                <button class="btn btn-tertiary btn-full" onclick="displayLoginModal()">Cancel</button>
            </div>
        </div>
    </div>
</div>
