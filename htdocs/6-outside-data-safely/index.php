<?php // http://127.0.0.1:8080/6-outside-data-safely/ 
?>

<?php

require 'db/DatabaseHelper.php';

$config = require 'db/config.php';

$db_helper = new DatabaseHelper($config);


$ch_type_id = $_GET['type'] ?? 1;
$query = <<<QUERY
    SELECT ch.name as cheese, cl.name as type
    FROM cheese ch inner join classification cl 
    ON ch.classification_id = cl.id
    WHERE cl.id = :cheese_id 
QUERY;

// try http://127.0.0.1:8080/6-outside-data-safely
// try http://127.0.0.1:8080/6-outside-data-safely/?type=1
// try http://127.0.0.1:8080/6-outside-data-safely/?type=2 
// try http://127.0.0.1:8080/6-outside-data-safely/?type=5 
// try http://127.0.0.1:8080/6-outside-data-safely/?type=6 ⚠️
// try http://127.0.0.1:8080/6-outside-data-safely/?type=blorp 💀➡️😁
// try http://127.0.0.1:8080/6-outside-data-safely/?type=1%20or%201=1 💀➡️😁
// try http://127.0.0.1:8080/6-outside-data-safely/?type=1;drop+table+cheese 💀💀💀 ➡️😁😁😁


$results = $db_helper->run($query, [":cheese_id" => $ch_type_id]);
// $results = $db_helper->run($query, [":cheese_id" => 1]);  // BTW, this works, Diego. 😎

$db_helper->close_connection();

require 'views/index.view.php';
