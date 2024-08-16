<?php
require_once 'lib/db.php';

$answerId = $_GET['answerId'];
$questionId = $_GET['questionId'];

$db = connectToDB();

$query = 'SELECT * FROM questions WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$questionId]);
$question = $stmt->fetch();

$query = 'SELECT * FROM questions';
$stmt = $db->prepare($query);
$stmt->execute();
$questions = $stmt->fetchAll();

if ($answerId == $question['correctAnswer']){
    $_SESSION['game']['currentQuestion'] ++;
    $_SESSION['game']['error']['wrongAnswer'] = false;
}
else {
    $_SESSION['game']['error']['wrongAnswer'] = true;
}


if ($_SESSION['game']['currentQuestion'] == count($questions)){
    header('location: completed');
}
else{
    header('location: questions');
}
?>