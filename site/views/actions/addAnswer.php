<?php
require_once 'lib/db.php';

$name = $_GET['name'];
$questionId = $_GET['questionId'];

$db = connectToDB();

$query = 'INSERT INTO answers (`text`, questionId) VALUES (?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$name, $questionId]);
$userData = $stmt->fetch();

header('location: adminPanel');
?>