<a href="/welcome">back</a>
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

//display each question and there details as well as divide information in to groups to be styled
foreach ($questions as $question){
    echo '<h3 class="adminQuestionTitle">'.$question['title'].'</h3>';
    echo '<div class="adminQuestions">';

    echo '<div>';
    echo '<h5>Question Text:</h5>';
    echo '<p>'.$question['text'].'</p>';
    echo '</div>';

    echo '<div>';
    echo '<h5>Answers:</h5>';
    //echo each answer for that question and if not the correct answer also show a button to set the correct answer
    foreach ($answers as $answer){
        if ($answer['questionId'] == $question['id']){
            if ($answer['id'] == $question['correctAnswer']){
                echo '<p>'.$answer['text'].'</p>';
            }
            else {
                echo '<p>'.$answer['text'].'<a href="/setCorrectAnswer?answerId='.$answer['id'].'&questionId='.$question['id'].'" class="answerSetButtons" role="button">Set</a></p>';
            }
        }
    }
    echo '<form action="addAnswer">';
    echo '<input type="text" name="name" value="Add Answer"></input>';
    echo '<input type="hidden" name="questionId" value="'.$question['id'].'"></input>';
    echo '</form>';
    echo '</div>';

    echo '<div>';
    echo '<h5>Library Area:</h5>';
    //go through all areas and to match the area to the question so it can be displayed
    foreach ($libraryAreas as $area){
        if ($area['id'] == $question['areaId']){
            echo '<p>'.$area['name'].'</p>';
        }
    }
    echo '</div>';

    echo '<a hx-confirm="Are you sure you want to delete?" href="/deleteQuestion?questionId='.$question['id'].'" class="deleteButtons" role="button">Delete</a>';
    echo '</div>';
}

?>