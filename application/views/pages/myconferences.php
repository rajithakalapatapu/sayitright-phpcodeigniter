<script>
    function unconfirm_conference(conference_id, individual_id) {
        window.location.href = "myconferences/unconfirm_conference_participation/" + conference_id + "/" + individual_id;
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
                    <button id=\"delete_event\" onclick=\"unconfirm_conference('%d', '%d')\">Unconfirm</button>
                </td>
            </tr>
            ";

            foreach ($all_myconferences as $conference) {
                echo sprintf(
                    $format,
                    $conference['conference_type'],
                    $conference['conference_name'],
                    $conference['conference_datetime'],
                    $conference['conference_location'],
                    $conference['conference_id'],
                    $conference['user_id']
                );
            }
            ?>

        </table>
    </div>
</div>
