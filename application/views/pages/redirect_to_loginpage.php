<?php
if ($this->session->user_type == "individual") {
    echo '<script>window.location.href = "individuallogin.php";</script>';
} else if ($this->session->user_type == "event") {
    echo '<script>window.location.href = "eventlogin.php";</script>';
} else if ($this->session->user_type == "business") {
    echo '<script>window.location.href = "businesslogin.php";</script>';
} else {
    echo '<script>window.location.href = "login.php";</script>';
}
