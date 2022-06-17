<?php

// Configuration
if (is_file('config.php')) {
    require_once('config.php');
}

require_once __DIR__ . '/helper/connection_database.php';
require_once __DIR__ . '/helper/installation.php';

echo 'welcome php file';