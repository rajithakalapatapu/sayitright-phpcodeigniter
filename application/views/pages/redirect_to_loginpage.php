<?php
if ($this->session->user_type == "individual") {
    echo '<script>window.location.href = "individuallogin.php";</script>';
} else {
    echo '<script>window.location.href = "login.php";</script>';
}
