
<div class="content">
    <div class="breadcrumb">
        <img src="<?php echo base_url(); ?>imgsay\home-banner.jpg" alt="Home Page">
        <h6 id="breadcrumbh6">Home --> Contact </h6>
        <h2 id="breadcrumbh4">CONTACT US</h2>
    </div>
    <div class="contactus margin10">
        <form name="contactus_form" method="POST" onsubmit="return submit_contactus_form();"
              action="">
            <div class="contactusleft">
                <div>
                    <input type="text" name="fname" placeholder="Enter your name" required>
<!--                    <span id="fnameErr" class="error"> *  --><?php //echo $first_name_validation_result["validation_failure_message"]; ?><!--</span>-->
                </div>
                <div>
                    <input type="text" name="lname" placeholder="Enter last name" required>
<!--                    <span id="lnameErr" class="error"> * --><?php //echo $last_name_validation_result["validation_failure_message"]; ?><!--</span>-->
                </div>
                <div>
                    <input type="phone" name="phone" placeholder="Telephone" required>
<!--                    <span id="phoneErr" class="error"> * --><?php //echo $phone_validation_result["validation_failure_message"]; ?><!--</span>-->
                </div>
            </div>
            <div class="contactusright">
                <div>
                    <textarea rows="4" cols="50" name="Message" placeholder="Enter Message" required></textarea>
<!--                    <span id="MessageErr" class="error"> * --><?php //echo $message_validation_result["validation_failure_message"]; ?><!--</span>-->
                </div>
                <!--                <input id="contactus_button" type=""text">-->
                <button class="contactussend" id="button">SEND MESSAGE</button>
            </div>
        </form>
<!--        <div class="successful_form_submit"> --><?php //echo $db_insert_status; ?><!-- </div>-->
    </div>
</div>
