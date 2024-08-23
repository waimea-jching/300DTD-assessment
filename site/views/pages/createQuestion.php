<h1>Question Creation</h1>

<?php
require_once 'lib/db.php';

$db = connectToDB();

$query = 'SELECT * FROM libraryAreas';
$stmt = $db->prepare($query);
$stmt->execute();
$libraryAreas = $stmt->fetchAll();
?>

<form action="processQuestion" id="questionCreationForm">
    <label for="title">Title</label>
    <input type="text" name='title'>

    <label for="desc">Description</label>
    <textarea id= "desc" name="desc"></textarea>

    <?php
    echo '<label for="area">Library Area</label>';
    echo '<select name="area">';
    foreach ($libraryAreas as $area){
        echo '<option>'.$area['name'].'</option>';
    }
    echo '</select>';
    ?>

    <input type="submit" value="Create">
</form>