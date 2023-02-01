<?php // http://127.0.0.1:8080/7-further-cleanup
?>

<?php

require 'db/DatabaseHelper.php';

$config = require 'db/config.php';

$db_helper = new DatabaseHelper($config);

// ❓❓ How could we find all out all out-of-stock cheeses of a 
//       given classification at a given store?
// ⚠️ Definitely build the query first, with example data, in your db tool!
// SELECT ch.name AS cheese, cl.name AS type
// FROM cheese ch INNER JOIN classification cl 
// ON ch.classification_id = cl.id
// INNER JOIN inventory inv
// ON ch.id = inv.cheese_id
// INNER JOIN store st
// ON st.id = inv.store_id
// WHERE cl.name ="fresh" AND st.name = "Banff" and inv.stock_level = 0


$cheese_type = $_GET['cheese_type'];
$store_name = $_GET['store_name'];

// ⚠️ This works...but readability sucks.
// ❓❓ What can we do about that?
$query = <<<QUERY
    SELECT ch.name AS cheese, cl.name AS type
    FROM cheese ch INNER JOIN classification cl  
    ON ch.classification_id = cl.id
    INNER JOIN inventory inv
    ON ch.id = inv.cheese_id
    INNER JOIN store st
    ON st.id = inv.store_id
    WHERE cl.name = :cheese_type AND st.name = :store_name and inv.stock_level = 0
QUERY;

$results = $db_helper->run($query, [
    ":cheese_type" => $cheese_type,
    ":store_name" => $store_name
]);

$db_helper->close_connection();

// try http://127.0.0.1:8080/7-further-cleanup/?cheese_type=fresh&store_name=Banff
// try http://127.0.0.1:8080/7-further-cleanup/?cheese_type=soft&store_name=edmonton

require 'views/index.view.php';
