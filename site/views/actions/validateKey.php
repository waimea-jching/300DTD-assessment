<?php

require_once 'lib/db.php';

$key = $_GET['key'];
consoleLog($key);

$hash = password_hash($key, PASSWORD_DEFAULT);

$db = connectToDB();

$query = 'INSERT INTO keys (hash) VALUES (?)';
$stmt = $db->prepare($query);
$stmt->execute([$hash]);

?>