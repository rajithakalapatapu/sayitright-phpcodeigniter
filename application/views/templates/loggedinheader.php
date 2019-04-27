<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href = "<?php echo base_url(); ?>css/sayitright.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Rajdhani' rel='stylesheet'>
    <title><?php echo $title ;?></title>
</head>

<body id="wrapper">
<nav>
    <div class="nav_left">
        <a href="<?php echo base_url(); ?>index.php/home">
            <img src="<?php echo base_url(); ?>imgsay/logo.png">
        </a>
    </div>
    <div class="nav_right">
        <ul>
            <li><a href="<?php echo base_url(); ?>index.php/eventlogin" class="activetab">Home</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/conferences">Conferences</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/events">Events</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/myconferences">My Conferences</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/myevents">My Events</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/usersettings">Settings</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/logout">Logout</a></li>
        </ul>
    </div>
</nav>
