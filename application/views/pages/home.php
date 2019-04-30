<div class="bkgnd">

    <div class="content">
        <div class="homepagegrid">
            <div class="homepageleft">
                <img src="<?php echo base_url(); ?>imgsay/iphone.png">
            </div>
            <div class="homepageright">
                <h1> For good </h1>
                <h1> communication </h1>
                <h1>
                    <p class="red"> Say it Right </p> is
                </h1>
                <h1> a tool that </h1>
                <h1> you should use </h1>
                <h6> You can see our video tutorial of use with just pressing this button </h6>
                <div class="homepageright_playbutton">
                    <a href="#" class="round-button">
                        <i class="fa fa-play fa-2x">
                        </i>
                    </a>
                </div>
                <div class="homepageright_playtext">
                    <h5> WATCH THE VIDEO </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footerleft">
            <h2 id="footerh2"> Subscribe Our Newsletter </h2>
            <h6 id="footerh6"> We won't send any kind of spam </h6>
        </div>
        <div class="footerright">
            <?php echo form_open('home'); ?>
                <input type="email" name="subscribe_email" id="footertextarea"
                       placeholder="Enter email address" required></input>
                <?php
                if (isset($status)) {
                    echo $status;
                }
                ?>
                <input type="submit" id="footersubscribe" text="Subscribe">
            </form>
        </div>
    </div>

</div>
