<?php
if ($this->session->user_type == "individual") {
    echo '<script>window.location.href = "individuallogin";</script>';
} else if ($this->session->user_type == "event") {
    echo '<script>window.location.href = "eventlogin";</script>';
} else if ($this->session->user_type == "business") {
    echo '<script>window.location.href = "businesslogin";</script>';
} else {
    echo '<script>window.location.href = "login";</script>';
}
