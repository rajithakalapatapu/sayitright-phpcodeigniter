<script>
    function confirm_event(event_id, individual_id) {
        window.location.href = "events/confirm_event_participation/" + event_id + "/" + individual_id;
    }
</script>

<div class="content">
    <div class="conferenceslist" id="wrapper">
        <h1> List of Conferences</h1>
        <table id="conferencedetails" border="transparent" align="center">
            <tr>
                <th class="table_header">Conferences</th>
                <th class="table_header">Description</th>
                <th class="table_header">Date</th>
                <th class="table_header">Location</th>
                <th class="table_header">Confirm</th>
            </tr>

            <?php

            $format = "
            <tr>
                <td class=\"table_cell\">%s</td>
                <td class=\"table_cell\">%s</td>
                <td class=\"table_cell\">%s</td>
                <td class=\"table_cell\">%s</td>
                <td class=\"table_cell\">
                    <button id=\"delete_event\" onclick=\"confirm_event('%d', '%d')\">Confirm</button>
                </td>
            </tr>
            ";

            foreach ($all_events as $event) {
                echo sprintf(
                    $format,
                    $event['event_type'],
                    $event['event_name'],
                    $event['event_datetime'],
                    $event['event_location'],
                    $event['event_id'],
                    $event['user_id']
                );
            }
            ?>

        </table>
    </div>
</div>
