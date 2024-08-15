<?php
require_once 'lib/db.php';

$answerId = $_GET['answerId'];
$questionId = $_GET['questionId'];

$db = connectToDB();

$query = 'UPDATE questions SET correctAnswer = ? WHERE id = ? VALUES(?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$answerId, $questionId]);
$userData = $stmt->fetch();

header('location: adminPanel');
?>