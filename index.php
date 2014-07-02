<?php

require 'application/config/config.php';
require 'application/config/autoload.php';
require 'application/config/appschema.php';


//FOR THIRD PARTY LIBRARIES
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

$app = new Application();




