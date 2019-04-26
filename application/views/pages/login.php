<div class="content">
    <div class="breadcrumb">
        <img src="<?php echo base_url(); ?>imgsay\home-banner.jpg" alt="Home Page">
        <h6 id="breadcrumbh6">Home --> LOGIN </h6>
        <h2 id="breadcrumbh4">LOGIN</h2>
    </div>
    <div class="login margin10">
        <?php echo form_open('login'); ?>
            <div class="loginform">
                <div align="left">
                    <input type="text" id="email" name="email" placeholder="Enter email" required>
                    <span id="fnameErr" class="error"> *  <?php echo form_error('email'); ?> </span>
                </div>
                <div align="left">
                    <input type="password" id="password" name="password" placeholder="Enter password" required>
                    <span id="fnameErr" class="error"> *  <?php echo form_error('password'); ?> </span>
                </div>
                <div align="right">
                    <button class="loginsend" id="button">SEND</button>
                </div>
            </div>
        </form>
    </div>
</div>
