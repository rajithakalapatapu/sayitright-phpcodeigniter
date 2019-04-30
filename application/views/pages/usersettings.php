<div class="content">
    <div class="settings margin10">
        <div class="settings_left">
            <div>
                <img src="<?php echo base_url()?>/imgsay/user.jpg">
                <button class="settings_image_button" id="button">CHANGE IMAGE</button>
            </div>
        </div>
        <div class="settings_right">
            <h3 class="settingsh4"> Welcome to your profile </h3>
            <?php echo form_open('usersettings/update'); ?>
                <div class="shipping_one_line">
                    <div>
                        <input type="text" id="fname" name="fname" placeholder=<?php echo $fname; ?>>
                        <span class="error"> *  <?php echo form_error('fname'); ?> </span>
                    </div>
                    <div>
                        <input type="text" id="lname" name="lname" placeholder=<?php echo $lname; ?>>
                        <span class="error"> *  <?php echo form_error('lname'); ?> </span>
                    </div>
                </div>
                <div>
                    <input type="text" id="work" name="work" placeholder=<?php echo $work; ?>>
                    <span class="error"> *  <?php echo form_error('work'); ?> </span>
                </div>
                <div>
                    <input type="text" id="school" name="school" placeholder=<?php echo $school; ?>>
                    <span class="error"> *  <?php echo form_error('school'); ?> </span>
                </div>
                <div>
                    <input type="email" id="email" name="email" placeholder=<?php echo $email; ?>>
                    <span class="error"> *  <?php echo form_error('email'); ?> </span>
                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder=<?php echo $password; ?>>
                    <span class="error"> *  <?php echo form_error('password'); ?> </span>
                </div>
                <p> Change Password </p>
                <button class="settingsbutton" id="button">SAVE CHANGES</button>
            </form>
        </div>
        <div>
            <p> <?php echo $status; ?> </p>
        </div>

    </div>
</div>
