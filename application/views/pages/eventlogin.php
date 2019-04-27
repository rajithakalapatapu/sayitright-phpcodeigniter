<script>
    function delete_event(event_id) {
        window.location.href = "delete_event.php?event_id=".concat(event_id);
    }

    function show_event_add_form() {
        document.getElementById("add_event_form").style.display = "block";
    }
</script>

<div class="content">
    <div class="conferenceslist" id="wrapper">
        <h1> List of Events</h1>
        <table id="conferencedetails" border="transparent" align="center">
            <tr>
                <th class="table_header">Conferences</th>
                <th class="table_header">Description</th>
                <th class="table_header">Date</th>
                <th class="table_header">City</th>
                <th class="table_header">Make changes</th>
            </tr>

            <?php
            $format = "
            <tr>
                <td class=\"table_cell\">%s</td>
                <td class=\"table_cell\">%s</td>
                <td class=\"table_cell\">%s</td>
                <td class=\"table_cell\">%s</td>
                <td class=\"table_cell\">
                    <button id=\"edit_event\">Edit</button>
                    <button id=\"delete_event\" onclick=\"delete_event('%d')\">Delete</button>
                </td>
            </tr>
            ";

            foreach ($current_user_events as $current_user_event) {
                echo sprintf(
                    $format,
                    $current_user_event['event_type'],
                    $current_user_event['event_name'],
                    $current_user_event['event_datetime'],
                    $current_user_event['event_location'],
                    $current_user_event['event_id']
                );
            }

            ?>

        </table>

        <button class="add_event" id="button" onclick="show_event_add_form()">Add a new event</button>

        <?php
            $attributes = array('name' => 'add_event_form');
            echo form_open('eventlogin', $attributes);
        ?>
            <div class="add_event_form_div">
                <input type="text" name="event_name" placeholder="Enter event name" required>
                <span style="error"> <?php echo form_error('event_name'); ?> </span>
            </div>
            <div class="add_event_form_div">
                <input type="date" name="event_date" placeholder="Select event date and time" required>
                <span style="error"> <?php echo form_error('event_date'); ?> </span>
                <input type="time" name="event_time" placeholder="Select event date and time" required>
                <span style="error"> <?php echo form_error('event_time'); ?> </span>
            </div>
            <div class="add_event_form_div">
                <input type="text" name="event_type" placeholder="Enter event type" required>
                <span style="error"> <?php echo form_error('event_type'); ?> </span>
            </div>
            <div class="add_event_form_div">
                <input type="text" name="event_location" placeholder="Enter event location" required>
                <span style="error"> <?php echo form_error('event_location'); ?> </span>
            </div>
            <div class="add_event_form_div">
                <input type="submit" value="Add event">
            </div>
            <div class="add_event_form_div">
<!--                <p> --><?php //echo $db_insert_status; ?><!--    </p>-->
            </div>
        </form>

    </div>
</div>
