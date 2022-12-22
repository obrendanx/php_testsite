<?php
// Allow debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define a constant to permit each file we "require" to execute
// For security, required PHP files should "die" if SAFE_TO_RUN is not defined
define('SAFE_TO_RUN', true);

// TODO: Change this value to configure the application
$database_table = "user"; // name of database table to read/write

// Define _e and _x functions
require 'helpers.php';
?>

<link rel="stylesheet" href="style.css" />
<h1>Using SQL INSERT</h1>

<?php
// Connect to the database
require "connect.php";
?>

<div class="report">
    Connected to database: <?php _e($database_name) ?>
</div>

<?php
// Define some data to add to the database table
// TODO: Change these values to insert a different row
$data = [
    'username'=> 'admin',
    'password'=> 'admin',
    'email'=> 'Suzi.Smith@example.com',
];

// Insert data in $data to a new row in the database table
require "insert-row.php";

// Output a table of rows in the database table
require "data-table.php";
?>
