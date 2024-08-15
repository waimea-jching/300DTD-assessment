<?php
require_once 'lib/db.php';

$db = connectToDB();

$questionId = $_GET['questionId'];

$query = 'DELETE FROM questions WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$questionId]);
$answers = $stmt->fetch();

header('location: adminPanel');
?>