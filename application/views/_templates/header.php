<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Application</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/list.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/960.css" />
    <!-- in case you wonder: That's the cool-kids-protocol-free way to load jQuery -->
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/application.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.tools.min.js"></script>


</head>
<body>

    <div class="debug-helper-box">
        DEBUG HELPER: you are in the view: <?php echo $filename; ?>
    </div>

    <div class='title-box'>
        <a href="<?php echo URL; ?>">My Application</a>
    </div>

    <div class="header">
        <div class="header_left_box">
        <ul id="menu">
            <li <?php if ($this->checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>index/index">Index</a>
            </li>
           


            <?php if (Session::get('user_logged_in') == true):?>
                <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/showprofile">My Account</a>                    
                </li>
				<li <?php if ($this->checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>dashboard/index">My Dashboard</a>                    
                </li>
				
            <?php endif; ?>

            <!-- for not logged in users -->
            <?php if (Session::get('user_logged_in') == false){?>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/index">Login</a>
                </li>
                
            <?php } else {  ?>
			
				<li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/logout">Logout</a>
                </li>
				
				
				<?php } ?>
              
			
			
			
			
			
			
			
			
        </ul>
        </div>

        <?php if (Session::get('user_logged_in') == true): ?>
            <div class="header_right_box">
                <div class="namebox">
                    Hello <?php echo Session::get('user_name'); ?> !
                </div>
                
            </div>
        <?php endif; ?>

        <div class="clear-both"></div>
    </div>
