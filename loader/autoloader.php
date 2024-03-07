
<?php


// define db connection
define('dbhost', 'localhost');
define('dbuser', 'enzerhub');
define('dbpass', 'enzerhub');
define('dbname', 'car');

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/../core/' .$class. '.php';
    require $path;
});