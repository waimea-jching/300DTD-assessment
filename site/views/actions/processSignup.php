<?php

$fore = $_GET['fore'];
$sur = $_GET['sur'];
$user = $_GET['user'];
$pass = $_GET['pass'];

$hash = password_hash($pass, PASSWORD_DEFAULT);
consoleLog($hash, 'Hashed Password');

$db = connectToDB();

$query = 'INSERT INTO adminLogins (forename, surname, username, hash) VALUES (?, ?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$fore, $sur, $user, $hash]);
$userData = $stmt->fetch();

?>