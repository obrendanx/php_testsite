<?php
// TT284 CRUD APP (ITERATION A)
// INSERT ROW TO DATABASE TABLE
// "require" this file to save the data in $data to a row in the database table

// For security, required PHP files should "die" if SAFE_TO_RUN is not defined
if (!defined('SAFE_TO_RUN')) {
    // Prevent direct execution - show a warning instead
    die(basename(__FILE__)  . ' cannot be executed directly!');
}
?>

<div class="report file">
    Executing: <?php _e(basename(__FILE__)) ?>
</div>

<div class="report">
    Saving data from $data array to row in database table
</div>

<?php
// TODO: Change SQL according to the columns you expect
// Create new row
$sql = "INSERT INTO $database_table (username, password, email) VALUES (?,?,?)";
?>

<pre class="report">
$sql == <?php _e($sql) ?>
</pre>

<?php
// Prepare statement using SQL command
if (!($stmt = $database->prepare($sql))) {
    die("Error preparing statement ($sql): $database->error");
}

// TODO: Change bind_param() calls according to the columns you expect
// Bind parameters for INSERT statement ('s' for each column)
if (!$stmt->bind_param('sss', $data['username'], $data['password'], $data['email'])) {
    die("Error binding statement ($sql): $stmt->error");
}

// Execute statement and count inerted rows
if ($stmt->execute()) {
    $rows = $stmt->affected_rows;
} else {
    die("Error executing statement ($sql): $stmt->error");
}

if ($rows == 0) {
    die("No row was inserted ($sql)");
}
?>

<div class="report message always">
    Server message: Completed saving data to row in database table
</div>
