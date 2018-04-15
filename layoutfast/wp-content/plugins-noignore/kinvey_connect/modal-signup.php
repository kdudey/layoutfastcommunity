<div class="modal">
    <div class="modal-dialog" id="modal-signup">
        <div class="modal-header">
            <div><img src="<?php echo plugin_dir_url(__FILE__) . "images/svg/layoutfast.svg"?>" alt="layoutFast"></div>
            <div>
                <h3><strong>layout</strong>FAST</h3>
                <p>Register a new user</p>
            </div>
        </div>
        <div class="modal-body modal-content">
            <div id="signupMsg" class="color-red"></div>
            <table class="form full-width">
                <tr>
                    <td><label>Email:</label></td>
                    <td><input type="text" class="full-width" id="signup-email"></td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td><input type="password" class="full-width" id="signup-password"></td>
                </tr>
                <tr>
                    <td><label>Confirm Password:</label></td>
                    <td><input type="password" class="full-width" id="signup-password-confirm"></td>
                </tr>
                <tr>
                    <td><label>First Name:</label></td>
                    <td><input type="text" class="full-width" id="signup-fname"></td>
                </tr>
                <tr>
                    <td><label>Last Name:</label></td>
                    <td><input type="text" class="full-width" id="signup-lname"></td>
                </tr>
                <tr>
                    <td><label>Company:</label></td>
                    <td><input type="text" class="full-width" id="signup-company"></td>
                </tr>
                <tr>
                    <td><label>Age:</label></td>
                    <td>
                        <select class="full-width" id="signup-age">
                            <option>Select One</option>
                            <option value="18-30">18-30</option>
                            <option value="31-45">31-45</option>
                            <option value="46-60">46-60</option>
                            <option value="over-61">61 and above</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Work Field:</label></td>
                    <td>
                        <select class="full-width" id="signup-workfield">
                            <option>Select One</option>
                            <option value="contractor">Contractor</option>
                            <option value="distributor">Distributor</option>
                            <option value="oem">OEM</option>
                            <option value="architect">Architect</option>
                            <option value="consulting-engineer">Consulting Engineer</option>
                            <option value="owner">Owner</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Position:</label></td>
                    <td>
                        <select class="full-width" id="signup-position">
                            <option>Select One</option>
                            <option value="owner">Owner</option>
                            <option value="estimator">Estimator</option>
                            <option value="project-manager">Project Manager</option>
                            <option value="bim-manager">BIM Manager</option>
                            <option value="bim-specialist">BIM Specialist</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Zip Code:</label></td>
                    <td><input type="text" class="full-width" id="signup-zipcode"></td>
                </tr>
                <tr>
                    <td><label>Country:</label></td>
                    <td>
                        <select class="full-width" id="signup-field">
                            <option>Select One</option>
                            <option value="mexico">Mexico</option>
                            <option value="canada">Canada</option>
                            <option value="usa">USA</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Language:</label></td>
                    <td>
                        <select class="full-width" id="signup-language">
                            <option>Select One</option>
                            <option value="english">English</option>
                            <option value="spanish">Spanish</option>
                            <option value="french">French</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="30%">&nbsp;</td>
                    <td width="70%"><span class="small">* required</td>
                </tr>
            </table>
        </div>
        <div class="modal-footer modal-content">
            <div>
                <img src="<?php echo plugin_dir_url(__FILE__) . "images/lio-schneider-green.png"?>">
            </div>
            <div>
                <button class="btn btn-primary btn-full" onclick="signupNewUser()">Create Profile</button>
                <button class="btn btn-tertiary btn-full" onclick="displayLoginModal()">Cancel</button>
            </div>
        </div>
    </div>
</div>
