<?php // http://127.0.0.1:8080/2-db-helper-class/ 
?>

<?php

// ❓❓ Do we need to capitalize things this way?
// ❓❓ Where should this actually go?
class DatabaseHelper
{
    // ❓❓ What's this called again?
    public $connection;

    // ❓❓ And this? What's its job?
    public function __construct()
    {
        $dsn = "mysql:host=127.0.0.1;port=3306;dbname=cheese_db;charset=utf8mb4";
        try {
            $this->connection = new PDO($dsn, "root", "mariadb");
        } catch (PDOException $e) {
            die("DB problem. Belly up I go.");
        }
    }

    public function close_connection()
    {
        // ❓❓ When do we need to use $this-> ?
        $this->connection = null;
    }

    public function run($sql)
    {
        $statement = $this->connection->prepare($sql);

        $statement->execute();

        return $statement;
    }
}

?>


<?php
// ❓❓ What benefit(s) does the helper provide?
// ❓❓ What problems does the current form of the Helper have?
$db_helper = new DatabaseHelper();

$query = <<<QUERY
    SELECT name AS cheese
    FROM cheese 
QUERY;

$results = $db_helper->run($query);

$db_helper->close_connection();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cheese</title>
</head>

<body>
    <ul>
        <?php foreach ($results as $result) : ?>
            <li><?= $result['cheese'] ?> </li>
        <?php endforeach ?>
    </ul>
</body>

</html>