<?php

require_once 'config/database.php';
require_once 'core/Core.php';
require_once 'core/Controller.php';
require_once 'core/DB.php';
require_once 'core/Template.php';

spl_autoload_register(function($className) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require_once $classPath . '.php';
});

session_start();

$core = \core\Core::getInstance();
$core->Initialize();
$core->Run();
$core->Done();
