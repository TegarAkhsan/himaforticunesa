<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Maintenance mode
if (file_exists($maintenance = __DIR__.'/../himaforticunesa/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Composer autoload
require __DIR__.'/../himaforticunesa/vendor/autoload.php';

// Bootstrap Laravel
(require_once __DIR__.'/../himaforticunesa/bootstrap/app.php')
    ->handleRequest(Request::capture());
