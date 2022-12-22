<?php
// TT284 CRUD APP (ITERATION A)
// SEARCH/SORT FORM
// "require" this file to output a form to search/sort the database table

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
    Generating a HTML search/sort form to match the columns in the database table
</div>
<?php

// Process search/sort form data
if ($task == 'search') {
    // Search for any field containing the search value submitted (if any)
    // To avoid SQL injection, this value will be bound using a prepared statement
    if (!empty($data['search'])) {
        $search = $data['search'];
    }

    // Sort using the order value submitted (if any)
    // To avoid SQL injection, do not use the value directly
    if (!empty($data['sort'])) {
        if ($data['sort'] == 'username') {
            $sort = 'username';
        }
        if ($data['sort'] == 'password') {
            $sort = 'password';
        }
        if ($data['sort'] == 'email') {
            $sort = 'email';
        }
    }

    // Sort using the order value submitted (if any)
    // To avoid SQL injection, do not use the value directly
    if (!empty($data['order'])) {
        if ($data['order'] == 'DESC') {
            $order = 'DESC';
        }
    }
}

?>
<input id="show_search" type="checkbox" class="collapser" />
<label for="show_search">
    Show/Hide: Search form
</label>
<form method="POST" action="<?php _e($url); ?>">

    <p>
        <label for="search">Search for:</label>
        <input type="text" name="search" value="<?php _e($search) ?>" />
    </p>

    <p>
        <label for="sort">Sort by:</label>
        <select name="sort" id="sort">
            <option value="id">id</option>
            <option value="username">firstname</option>
            <option value="password">lastname</option>
            <option value="email">email</option>
        </select>
        <label>
            <input type="radio" name="order" value="ASC" />
            Ascending
        </label>
        <label>
            <input type="radio" name="order" value="DESC" />
            Descending
        </label>
    </p>

    <p>
        <label for="search">Submit:</label>
        <input type="submit" id="search" name="task" value="search" />
    </p>

</form>

<div class="report">
    Completed generating a HTML search/sort form to match the columns in the database table
</div>