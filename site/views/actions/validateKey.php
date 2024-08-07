<?php

require_once 'lib/db.php';

consoleLog($_GET);

$key = $_GET['key'];

$db = connectToDB();

$query = 'SELECT `hash` FROM `keys`';
$stmt = $db->prepare($query);
$stmt->execute();
$hashes = $stmt->fetchAll();

foreach($hashes as $hash) {
    $_SESSION['canCreateAccount'] = password_verify($key, $hash['hash']);
}

header('location: adminSignup');

?>