<?php
/**
 * giokalm
 * File: Database Configuration
 */
$whitelist = array(
    '127.0.0.1',
    '::1'
);
if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    // database Connection variables
    define('HOST', 'localhost'); // Database host name ex. localhost
    define('USER', 'root'); // Database user. ex. root ( if your on local server)
    define('PASSWORD', ''); // user password  (if password is not set for user then keep it empty )
    define('DATABASE', 'db1'); // Database Database name
}
else
{
    // database Connection variables
    define('HOST', 'localhost'); // Database host name ex. localhost
    define('USER', 'id7587350_admin'); // Database user. ex. root ( if your on local server)
    define('PASSWORD', 'admin'); // user password  (if password is not set for user then keep it empty )
    define('DATABASE', 'id7587350_stage_db'); // Database Database name
}
function DB()
{
    try 
    {
        $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
        return $db;
    } 
    catch (PDOException $e) 
    {
        return "Error!: " . $e->getMessage();
        die();
    }
}
?>