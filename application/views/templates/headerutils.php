<?php

function get_home_link_for_logged_in_user()
{
//    session_start();
    if ($_SESSION["user_type"] == "individual") {
        $home_page_name = "individuallogin";
    } else if ($_SESSION["user_type"] == "event") {
        $home_page_name = "eventlogin";
    } else if ($_SESSION["user_type"] == "business") {
        $home_page_name = "businesslogin";
    } else {
        $home_page_name = "login";
    }

    "<li><a href=\"%sindividuallogin\">Home</a></li>";
    $home_link = "<li><a href=\"%sindex.php/%s\">Home</a></li>";
    echo sprintf($home_link, base_url(), $home_page_name);
}

function go_to_home_page_for_logged_in_user()
{
    session_start();
    if ($_SESSION["user_type"] == "individual") {
        $home_link = "<script>window.location.href = \"individuallogin.php\";</script>";
    } else if ($_SESSION["user_type"] == "event") {
        $home_link = "<script>window.location.href = \"eventlogin.php\";</script>";
    } else if ($_SESSION["user_type"] == "business") {
        $home_link = "<script>window.location.href = \"businesslogin.php\";</script>";
    } else {
        $home_link = "<script>window.location.href = \"login.php\";</script>";
    }

    return $home_link;
}

?>
