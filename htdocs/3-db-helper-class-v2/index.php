<?php // http://127.0.0.1:8080/3-db-helper-class-v2/ 
?>

<?php
require 'db/DatabaseHelper.php';

// ❓❓ What's going on here? I though requires were just a "copy/paste"!
$config = require 'db/config.php';

$db_helper = new DatabaseHelper($config);

$query = <<<QUERY
    SELECT name AS cheese
    FROM cheese 
QUERY;

$results = $db_helper->run($query);

$db_helper->close_connection();

require 'views/index.view.php';
