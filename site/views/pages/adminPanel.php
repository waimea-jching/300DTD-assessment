<h1>Library Questions</h1>

<a href="/createQuestion" role="button">Create Question</a>

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

foreach ($questions as $question){
    echo '<h4>'.$question['title'].'</h4>';
    echo '<div>';

    echo '<div>';
    echo '<h5>Question Text:</h5>';
    echo '<p>'.$question['text'].'</p>';
    echo '</div>';

    echo '<div>';
    echo '<h5>Answers:</h5>';
    foreach ($answers as $answer){
        if ($answer['questionId'] == $question['id']){
            echo '<p>'.$answer['text'].'<a href="/setCorrectAnswer?answerId='.$answer['id'].'&questionId='.$question['id'].'" role="button">Set</a></p>';
        }
    }
    echo '<form action="addAnswer">';
    echo '<input type="text" name="name" value="Add Answer"></input>';
    echo '<input type="hidden" name="questionId" value="'.$question['id'].'"></input>';
    echo '</form>';
    echo '</div>';

    echo '<div>';
    echo '<h5>Library Area:</h5>';
    foreach ($libraryAreas as $area){
        if ($area['id'] == $question['areaId']){
            echo '<p>'.$area['name'].'</p>';
        }
    }
    echo '</div>';

    echo '<a href="/deleteQuestion?questionId='.$question['id'].'" role="button">Delete</a>';
    echo '</div>';
}

?>