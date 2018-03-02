<?php
/*
 * DATABASE connection script
 * */

// ...

// database Connection variables
define('HOST', 'localhost'); // Database Host name ex. localhost
define('USER', 'root'); // Database User ex. root
define('PASSWORD', 'austria'); // Database User Password  (if password is not set for user then keep it empty )
define('DATABASE', 'user_accounts'); // Database Name

function DB()
{
    static $instance;
    if ($instance === null) {
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE;
        $instance = new PDO($dsn, USER, PASSWORD, $opt);
    }
    return $instance;
}

?>
