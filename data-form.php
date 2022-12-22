<?php
// "require" this file to output a form to add or edit data

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
    Generating a HTML form to match the columns in the database table
</div>

<?php
// If adding, show the form by default
if ($task == 'add') {
    $checked = 'checked';
} else {
    $checked = '';
}
?>

<input <?php _e($checked) ?> id="show_form" type="checkbox" class="collapser" />
<label for="show_form">
    Show/Hide: Data entry form
</label>
<form method="POST" action="<?php _e($url); ?>" onsubmit="return validateForm()">

    <!-- TODO: Change these inputs according to the columns you expect -->

    <p>
        <label for="username">First name:</label>
        <input
            type="text"
            id="username"
            name="username"
            onchange="validate(event.target)"
        />
        <span id="feedback_username" class="invalid"></span>
    </p>

    <p>
        <label for="password">Last name:</label>
        <input
            type="text"
            id="password"
            name="password"
            onchange="validate(event.target)"
        />
        <span id="feedback_password" class="invalid"></span>
    </p>

    <p>
        <label for="email">Email:</label>
        <input
            type="text"
            id="email"
            name="email"
            onchange="validate(event.target)"
        />
        <span id="feedback_email" class="invalid"></span>
    </p>

    <p>
        <label for="save">Submit:</label>
        <input type="submit" id="save" name="task" value="save" />
        <a class="cancel" href="<?php _e($url) ?>">cancel</a>
    </p>
</form>

<div class="report">
    Completed generating a HTML form to match the columns in the database table
</div>