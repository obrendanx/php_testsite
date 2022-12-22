<?php
// Allow debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define a constant to permit each file we "require" to execute
// For security, required PHP files should "die" if SAFE_TO_RUN is not defined
define('SAFE_TO_RUN', true);

// TODO: Change these values to configure the application
$database_table = "user"; // name of database table to read/write
$app_title = 'phptestsite';
$js_file = "admin.js"; // name of JavaScript file to load

// Setup flags and other variables used in the application
$url = $_SERVER["PHP_SELF"]; // URL of this page for forms to POST to
$task = ''; // task to carry out in response to form submission
// Search criteria used by search form and data table
$search = ''; // value to search for
$sort = 'id'; // column to sort by
$order = 'ASC'; // order to sort by
// Data from data entry form
$data = []; // key/value data from form submission


// Define _e and _x functions
require 'helpers.php';
// Output head of page
require 'head.php';
?>

<h1>
    <?php _e($app_title); ?>
</h1>

<input id="show_reports" type="checkbox" class="collapser" />
<label for="show_reports">
    Show/Hide: Script execution reports
</label>
<div class="report file">
    Executing: connect.php and credentials.php
</div>

<?php
// Connect to the database
require "connect.php";
?>

<div class="report">
    Connected to database: <?php _e($database_name) ?>
</div>

<div class="report">
    In a real application, we should also authenticate the user before we
    authorise viewing or changing data!
</div>

<?php
// Read the submitted form data into $data
require 'read-post.php';

// Read $task from submitted form data
if (!empty($data['task'])) {
    $task = $data['task'];
}
?>

<pre>
$task == <?php var_export($task) ?>
</pre>

<?php
// Now we have the submitted form data, carry out any tasks

// Task is to save submitted form data to a row in the database table...
if ($task == 'save') {
    // So insert the row
    require "insert-row.php";
}

// Now we have carried out tasks, output HTML forms and tables

// Output a form to search or sort with
// This also processes search criteria used by the data table
require "search-form.php";

// Output a table of rows in the database table matching search criteria (if any)
require "data-table.php";

// Output a form to enter data
require "data-form.php";
?>

<div class="report">
    Task completed!
</div>

</body>

</html>
