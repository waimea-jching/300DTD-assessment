<?php
require_once 'lib/db.php';

$db = connectToDB();

$query = 'SELECT * FROM questions';
$stmt = $db->prepare($query);
$stmt->execute();
$questions = $stmt->fetchAll();

$query = 'SELECT * FROM answers';
$stmt = $db->prepare($query);
$stmt->execute();
$answers = $stmt->fetchAll();

$query = 'SELECT * FROM libraryAreas';
$stmt = $db->prepare($query);
$stmt->execute();
$libraryAreas = $stmt->fetchAll();

$_SESSION['game']['questionCount'] = count($questions);
$currentQuestion = $_SESSION['game']['currentQuestion'];

echo '<div id="questions">';
echo '<div>';
echo '<h3>Question: '.($currentQuestion + 1).'</h3>';

foreach ($libraryAreas as $area){
    if ($area['id'] == $questions[$currentQuestion]['areaId']){
        echo '<img src="images/library_maps/'.$area['name'].'.png" alt="library map">';
    }
}

echo '<h3>'.$questions[$currentQuestion]['title'].'</h3>';
echo '<p>'.$questions[$currentQuestion]['text'].'</p>';
echo '</div>';

echo '<div id="answerBox">';
if ($_SESSION['game']['error']['wrongAnswer'] == true){
    echo '<p class="error">Wrong Answer</p>';
}
foreach ($answers as $answer){
    if ($answer['questionId'] == $questions[$currentQuestion]['id']){
        echo '<a href="/checkAnswer?answerId='.$answer['id'].'&questionId='.$questions[$currentQuestion]['id'].'" role="button">'.$answer['text'].'</a>';
    }
}
echo '</div>';
echo '</div>';
?>