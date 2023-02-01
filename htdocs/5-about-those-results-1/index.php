<?php // http://127.0.0.1:8080/5-about-those-results-1/ 
?>

<?php
require 'db/DatabaseHelper.php';

$config = require 'db/config.php';

$db_helper = new DatabaseHelper($config);

$query = <<<QUERY
    SELECT name AS cheese
    FROM cheese 
QUERY;

// ❓❓ What do you suppose $results IS? Take a guess.
$results = $db_helper->run($query);

// let's confirm whether your guess is on-target or not.... 
// die(var_dump($results)); // ⚠️ this readout is a bit misleading



// ❓❓ Let's try a query that just returns ONE result and see what changes.
//   ❓❓ First off, how would be alter our query to just return on result?
//   ❓❓ Next off, how do we actually get the next result from $results?
//       die(var_dump($results->?what method goes here?()));
//   ❓❓ What do we see in our dump? LOOK CAREFULLY!
// ❓❓ What seems odd here? 
// ❓❓ Do you feel this is confusing? How do we grab something more reasonable?
// ❓❓ What will happen if we change our table aliases?


$db_helper->close_connection();

?>

<?php // ⚠️ take 1: using a while (JP's not a big fan, but...) 
?>
<h3>Take 1: using a while</h3>
<ul>
    <?php while ($result = $results->fetch()) : ?>
        <li><?= $result['cheese'] ?> </li>
    <?php endwhile ?>
</ul>



<?php // ⚠️ take 2: use a foreach
?>
<?php // 💀 try working with $results twice in a row! Ruh-roh! 
?>

<!-- <h3>Take 2: using a foreach</h3>
<ul>
    <?php foreach ($results as $result) : ?>
        <li><?= $result['cheese'] ?> </li>
    <?php endforeach ?>
</ul> -->


<?php // ⚠️ gotcha: why doesn' this work?
?>

<!-- <h3>Take 3: using a fetchAll()</h3>
<?php $results_as_array = $results->fetchAll() ?>
<ul>
    <?php foreach ($results as $result) : ?>
        <li><?= $result['cheese'] ?> </li>
    <?php endforeach ?>
</ul> -->
<?php // // ❗❗❗ Don't let JP go to the next bit until he talks about htop 
?>