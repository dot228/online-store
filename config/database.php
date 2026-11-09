<?php
define('DATABASE_HOST', 'localhost');
define('DATABASE_LOGIN', 'root');
define('DATABASE_PASSWORD', '');
define('DATABASE_BASENAME', 'internetstore');

require_once 'core/DB.php';

$db = new \core\DB(DATABASE_HOST, DATABASE_LOGIN, DATABASE_PASSWORD, DATABASE_BASENAME);
?>