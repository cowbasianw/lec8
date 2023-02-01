<?php // http://127.0.0.1:8080/1-first-attempt/ 
?>

<?php

// ❓❓ What was this for again?
$dsn = "mysql:host=127.0.0.1;port=3306;dbname=cheese_db;charset=utf8mb4";

// ❓❓ Why the try-catch?
try {
    // ❓❓ What's this guy's job in life?  
    $pdo = new PDO($dsn, "root", "mariadb");
} catch (PDOException $e) {
    // ❓❓ What does die do again?   
    die($e->getMessage()); // // ❓❓ What info does this provide?
}

// ❓❓ Why use a heredoc?
$query = <<<QUERY
    SELECT name AS cheese
    FROM cheese 
QUERY;

// ❓❓ What does that arrow mean?
$results = $pdo->query($query);

// ❓❓ Why are we doing this?
$pdo = null;


// ❓❓ What are the 4 general steps going on here?
// ❓❓ What's our end goal of all this code?

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cheese</title>
</head>

<body>
    <ul>
        <? // ❓❓ what's going on here? 
        ?>
        <?php foreach ($results as $result) : ?>
            <li><?= $result['cheese'] ?> </li>
        <?php endforeach ?>
    </ul>
</body>

</html>