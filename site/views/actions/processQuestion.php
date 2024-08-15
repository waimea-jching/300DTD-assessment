<?php

require_once 'lib/db.php';

$title = $_GET['title'];
$desc = $_GET['desc'];
$area = $_GET['area'];

$areaId = 0;

$db = connectToDB();

$query = 'SELECT * FROM libraryAreas';
$stmt = $db->prepare($query);
$stmt->execute();
$libraryAreas = $stmt->fetchAll();

foreach ($libraryAreas as $_area){
    if ($area == $_area['name']){
        $areaId = $_area['id'];
    }
}

$query = 'INSERT INTO questions (areaId, title, `text`) VALUES (?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$areaId, $title, $desc]);
$userData = $stmt->fetch();
header('location: adminPanel');

?>