<div class="content">
    <div class="breadcrumb">
        <img src="<?php echo base_url(); ?>imgsay\home-banner.jpg" alt="Home Page">
        <h6 id="breadcrumbh6">Home --> SIGN UP</h6>
        <h2 id="breadcrumbh4">SIGN UP</h2>
    </div>
    <div class="signup margin10">

        <div class="signupform" id="signupform">
            <div>
                <h2> Select the type of user</h2>
            </div>
            <div class="signupgrid" id="signupgrid">
                <div>
                    <p class="individualsend" onclick="individualsignup()">INDIVIDUAL</p>
                </div>
                <div>
                    <p class="eventsend" onclick="eventsignup()">EVENT</p>
                </div>
                <div>
                    <p class="businesssend" onclick="businesssignup()">BUSINESS</p>
                </div>
            </div>
            <div>
                <p>
                    <?php
                    if (isset($status)) {
                        echo $status;
                    }
                    ?>
                </p>
                <p>
                    <?php
                    if (isset($redirect_link)) {
                        echo $redirect_link;
                    }
                    ?>
                </p>
            </div>
            <?php echo form_open('signup/signup_individual') ?>
                <div class="individualsignupform" id="individualsignupform" style="display: none">
                    <h3> Welcome to the individual registration</h3><br>
                    <div>
                        <input type="text" id="ind_fname" name="ind_fname" placeholder="Enter your name" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('ind_fname'); ?> </span>
                    </div>
                    <div>
                        <input type="text" id="ind_lname" name="ind_lname" placeholder="Enter last name" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('ind_lname'); ?> </span>
                    </div>
                    <div>
                        <input type="text" id="ind_work" name="ind_work" placeholder="Enter place of work" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('ind_work'); ?> </span>
                    </div>
                    <div>
                        <input type="text" id="ind_school" name="ind_school" placeholder="Enter school" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('ind_school'); ?> </span>
                    </div>
                    <div>
                        <input type="email" id="ind_email" name="ind_email" placeholder="Enter email" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('ind_email'); ?> </span>
                    </div>
                    <div>
                        <input type="password" id="ind_password" name="ind_password" placeholder="Enter password" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('ind_password'); ?> </span>
                    </div>
                    <input type="text" id="ind_form" name="ind_form" placeholder="" style="display:none">
                    <input type="submit" value="SEND" class="signupsend">
                </div>
            </form>
            <?php echo form_open('signup/signup_event') ?>
                <div class="eventsignupform" id="eventsignupform" style="display: none">
                    <h3> Welcome to the event log</h3><br>
                    <div>
                        <input type="text" id="event_fname" name="event_fname" placeholder="Enter your name" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('event_fname'); ?> </span>
                    </div>
                    <div>
                        <input type="text" id="event_lname" name="event_lname" placeholder="Enter last name" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('event_lname'); ?> </span>
                    </div>
                    <div>
                        <input type="email" id="event_email" name="event_email" placeholder="Enter email" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('event_email'); ?> </span>
                    </div>
                    <div>
                        <input type="password" id="event_password" name="event_password" placeholder="Enter password" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('event_password'); ?> </span>
                    </div>
                    <input type="text" id="event_form" name="event_form" placeholder="" style="display:none">
                    <input type="submit" value="SEND" class="signupsend">
                </div>
            </form>
            <?php echo form_open('signup/signup_business') ?>
                <div class="businesssignupform" id="businesssignupform" style="display: none">
                    <h3> Welcome to business records</h3><br>
                    <div class="radiobuttons">
                        <h5> type of Business: </h5>
                        <input type="radio" id="businesstype" name="businesstype" value="University"> University
                        <input type="radio" id="businesstype" name="businesstype" value="Company"> Company
                    </div>
                    <div>
                        <input type="text" id="busi_lname" name="busi_lname" placeholder="Enter last name" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('busi_lname'); ?> </span>
                    </div>
                    <div>
                        <input type="email" id="busi_email" name="busi_email" placeholder="Enter email" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('busi_email'); ?> </span>
                    </div>
                    <div>
                        <input type="password" id="busi_password" name="busi_password" placeholder="Enter password" required>
                        <span id="fnameErr" class="error"> *  <?php echo form_error('busi_password'); ?> </span>
                    </div>
                    <input type="text" id="busi_form" name="busi_form" placeholder="" style="display:none">
                    <input type="submit" value="SEND" class="signupsend">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function set_form_element_to_value(element_id, value) {
        document.getElementById(element_id).value = value;
    }

    function individualsignup() {
        document.getElementById("individualsignupform").style.display = "block";
        document.getElementById("eventsignupform").style.display = "none";
        document.getElementById("businesssignupform").style.display = "none";
        set_form_element_to_value("ind_form", "individual");
        set_form_element_to_value("event_form", "");
        set_form_element_to_value("busi_form", "");

    }

    function eventsignup() {
        document.getElementById("individualsignupform").style.display = "none";
        document.getElementById("eventsignupform").style.display = "block";
        document.getElementById("businesssignupform").style.display = "none";
        set_form_element_to_value("ind_form", "");
        set_form_element_to_value("event_form", "event");
        set_form_element_to_value("busi_form", "");
    }

    function businesssignup() {
        document.getElementById("individualsignupform").style.display = "none";
        document.getElementById("eventsignupform").style.display = "none";
        document.getElementById("businesssignupform").style.display = "block";
        set_form_element_to_value("ind_form", "");
        set_form_element_to_value("event_form", "");
        set_form_element_to_value("busi_form", "business");
    }
</script>
