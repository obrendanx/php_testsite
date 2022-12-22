<?php
// Allow debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define a constant to permit each file we "require" to execute
// For security, required PHP files should "die" if SAFE_TO_RUN is not defined
define('SAFE_TO_RUN', true);

// TODO: Change these values to configure the application
$database_table = "user"; // name of database table to read/write
$app_title = 'phptestsite - home';

// Setup flags and other variables used in the application
$url = $_SERVER["PHP_SELF"]; // URL of this page for forms to POST to
$task = ''; // task to carry out in response to form submission
// Data from data entry form
$data = []; // key/value data from form submission


// Define _e and _x functions
require 'admin/helpers.php';
// Output head of page
require 'admin/head.php';
?>

<nav>

    <ul>
        <li><a href="/pages/loginform.php">Login</a></li>
    </ul>

</nav>

</body>

</html>