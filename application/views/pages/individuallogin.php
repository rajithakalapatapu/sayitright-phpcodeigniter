<div class="content" id="wrapper">
    <div class="cardgrid">
        <div class="onecard bluecard">
            <div class="summary_card_icon">
                <img src="<?php echo base_url();?>/imgsay/globe-americas-solid-white.png" class="summary_icon">
            </div>
            <div class="summary_card_text">
                <h2 class="individuallogintext"> <?php echo $my_conferences_count + $my_events_count; ?> </h2>
                <h4 class="individuallogintext"> activities performed </h4>
            </div>
            <div class="summary_card_label">
                <p class="label"> Total Made </p>
            </div>
        </div>
        <div class="onecard greencard">
            <div class="summary_card_icon">
                <img src="<?php echo base_url();?>/imgsay/users-solid-white.png" class="summary_icon">
            </div>
            <div class="summary_card_text">
                <h2 class="individuallogintext"> <?php echo $my_conferences_count; ?> </h2>
                <h4 class="individuallogintext"> activities performed </h4>
            </div>
            <div class="summary_card_label">
                <p class="label"> Conferences </p>
            </div>
        </div>
        <div class="onecard yellowcard">
            <div class="summary_card_icon">
                <img src="<?php echo base_url();?>/imgsay/star-solid-white.png" class="summary_icon">
            </div>
            <div class="summary_card_text">
                <h2 class="individuallogintext"> <?php echo $my_events_count; ?> </h2>
                <h4 class="individuallogintext"> activities performed </h4>
            </div>
            <div class="summary_card_label">
                <p class="label"> Events </p>
            </div>
        </div>
        <div class="onecard greycard">
            <div class="summary_card_icon">
                <img src="<?php echo base_url();?>/imgsay/trophy-solid-white.png" class="summary_icon">
            </div>
            <div class="summary_card_text">
                <h2 class="individuallogintext"> <?php echo $all_conferences_count+$all_events_count-$my_conferences_count-$my_events_count; ?> </h2>
                <h4 class="individuallogintext"> activities to carry out </h4>
            </div>
            <div class="summary_card_label">
                <p class="label"> Activities </p>
            </div>
        </div>
        <div class="emptycard">
        </div>
        <div class="emptycard">
        </div>
        <div class="emptycard">
        </div>
        <div class="emptycard">
        </div>

        <?php

        foreach($all_events as $row) {
            $each_event = "
                    <div class=\"onecard bluecard\">
                        <div class=\"white_text bold_text blue_header\"> %s</div>
                        <div class=\"white_text bold_text\"> %s </div>
                        <div class=\"white_text card_content\">
                            <p> %s </p>
                        </div>
                    </div>
                ";
            echo sprintf($each_event, $row['event_type'], $row['event_name'], $row['event_datetime'] . "\t" . $row['event_location']);
        }

        foreach($all_conferences as $row) {
            $each_conference = "
                    <div class=\"onecard greencard\">
                        <div class=\"white_text bold_text grey_header\"> %s </div>
                        <div class=\"white_text bold_text\"> %s</div>
                        <div class=\"white_text card_content\">
                            <p> %s </p>
                        </div>
                    </div>
                ";
            echo sprintf($each_conference, $row['conference_type'], $row['conference_name'], $row['conference_datetime'] . "\t" . $row['conference_location']);
        }
        ?>

        <div class="onecard bluecard">
            <div class="white_text bold_text blue_header">Header</div>
            <div class="white_text bold_text">Primary Card title</div>
            <div class="white_text card_content">
                <p> Some quick example text to build
                    on the card title and make up
                    the bulk of the card's content </p>
            </div>
        </div>
        <div class="onecard greycard">
            <div class="white_text bold_text black_header">Header</div>
            <div class="white_text bold_text">Secondary Card title</div>
            <div class="white_text card_content">
                <p> Some quick example text to build
                    on the card title and make up
                    the bulk of the card's content </p>
            </div>
        </div>
        <div class="onecard greencard">
            <div class="white_text bold_text grey_header">Header</div>
            <div class="white_text bold_text">Success Card title</div>
            <div class="white_text card_content">
                <p> Some quick example text to build
                    on the card title and make up
                    the bulk of the card's content </p>
            </div>
        </div>
        <div class="onecard redcard">
            <div class="white_text bold_text grey_header">Header</div>
            <div class="white_text bold_text">Danger Card title</div>
            <div class="white_text card_content">
                <p> Some quick example text to build
                    on the card title and make up
                    the bulk of the card's content </p>
            </div>
        </div>
        <div class="onecard yellowcard">
            <div class="white_text bold_text grey_header">Header</div>
            <div class="white_text bold_text">Warning Card title</div>
            <div class="white_text card_content">
                <p> Some quick example text to build
                    on the card title and make up
                    the bulk of the card's content </p>
            </div>
        </div>
        <div class="onecard cyancard">
            <div class="white_text bold_text grey_header">Header</div>
            <div class="white_text bold_text">Info Card title</div>
            <div class="white_text card_content">
                <p> Some quick example text to build
                    on the card title and make up
                    the bulk of the card's content </p>
            </div>
        </div>
        <div class="onecard whitecard">
            <div class="black_text bold_text grey_header grey_background">Header</div>
            <div class="black_text bold_text">Light Card title</div>
            <div class="black_text card_content">
                <p> Some quick example text to build
                    on the card title and make up
                    the bulk of the card's content </p>
            </div>
        </div>
        <div class="onecard blackcard">
            <div class="white_text bold_text grey_header">Header</div>
            <div class="white_text bold_text">Dark Card title</div>
            <div class="white_text card_content">
                <p> Some quick example text to build
                    on the card title and make up
                    the bulk of the card's content </p>
            </div>
        </div>
    </div>
</div>
