<div class="content">
    <div class="breadcrumb">
        <img src="<?php echo base_url(); ?>imgsay\home-banner.jpg" alt="Home Page">
        <h6 id="breadcrumbh6">Home --> Contact </h6>
        <h2 id="breadcrumbh4">CONTACT US</h2>
    </div>
    <div class="contactus margin10">
        <?php echo form_open('contactus'); ?>
            <div class="contactusleft">
                <div>
                    <input type="text" name="fname" placeholder="Enter your name" >
                    <span id="fnameErr" class="error"> *  <?php echo form_error('fname'); ?> </span>
                </div>
                <div>
                    <input type="text" name="lname" placeholder="Enter last name" >
                    <span id="lnameErr" class="error"> *  <?php echo form_error('lname'); ?> </span>
                </div>
                <div>
                    <input type="phone" name="phone" placeholder="Telephone" >
                    <span id="phoneErr" class="error"> * <?php echo form_error('phone'); ?> </span>
                </div>
            </div>
            <div class="contactusright">
                <div>
                    <textarea rows="4" cols="50" name="Message" placeholder="Enter Message" ></textarea>
                    <span id="MessageErr" class="error"> * <?php echo form_error('Message'); ?>  </span>
                </div>
                <button class="contactussend" id="button">SEND MESSAGE</button>
            </div>
        </form>
        <div class="successful_form_submit">
            <?php
            if (isset($status)) {
                echo $status;
            }
            ?>
        </div>
    </div>
</div>
