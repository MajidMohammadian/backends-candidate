<?php

// Configuration
if (is_file('config.php')) {
    require_once('config.php');
}

require_once __DIR__ . '/helper/connection_database.php';
require_once __DIR__ . '/helper/installation.php';
require_once __DIR__ . '/helper/loader.php';
require_once __DIR__ . '/helper/helper.php';

session_start();

$q = (isset($_GET['q'])) ? $_GET['q'] : null;

switch($q) {
    case 'upload':
        echo controller('Upload');
        break;
    default:
        echo controller('Home');
}
