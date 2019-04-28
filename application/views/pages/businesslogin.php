<script>
    function delete_business(business_id) {
        window.location.href = "businesslogin/delete/".concat(business_id);
    }

    function show_business_add_form() {
        document.getElementById("add_business_form").style.display = "block";
    }
</script>

<div class="content">
    <div class="conferenceslist" id="wrapper">
        <h1> List of Businesses</h1>
        <table id="conferencedetails" border="transparent" align="center">
            <tr>
                <th class="table_header">Business name</th>
                <th class="table_header">Description</th>
                <th class="table_header">City</th>
                <th class="table_header">Business License Number</th>
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
                            <button id=\"edit_business\">Edit</button>
                            <button id=\"delete_business\" onclick=\"delete_business('%d')\">Delete</button>
                            </td>
                        </tr>
                        
                        ";

            foreach ($current_user_businesses as $current_user_business) {
                echo sprintf(
                    $format,
                    $current_user_business['business_name'],
                    $current_user_business['business_description'],
                    $current_user_business['business_address'],
                    $current_user_business['business_license_number'],
                    $current_user_business['business_id']
                );
            }

            ?>

        </table>

        <button class="add_event" id="button" onclick="show_business_add_form()">Add a new business</button>

        <?php
            $attributes = array('name' => 'add_business_form');
            echo form_open('businesslogin', $attributes);
        ?>
            <div class="add_event_form_div">
                <input type="text" name="business_name" placeholder="Enter business name" required>
                <span style="error"> <?php echo form_error('business_name'); ?> </span>
            </div>
            <div class="add_event_form_div">
                <input type="text" name="business_address" placeholder="Select business address" required>
                <span style="error"> <?php echo form_error('business_address'); ?> </span>
            </div>
            <div class="add_event_form_div">
                <input type="text" name="business_description" placeholder="Enter business description" required>
                <span style="error"> <?php echo form_error('business_description'); ?> </span>
            </div>
            <div class="add_event_form_div">
                <input type="text" name="business_license_number" placeholder="Enter business license number" required>
                <span style="error"> <?php echo form_error('business_license_number'); ?> </span>
            </div>
            <div class="add_event_form_div">
                <input type="submit" value="Add business">
            </div>
        </form>

    </div>
</div>
