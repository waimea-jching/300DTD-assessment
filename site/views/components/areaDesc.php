<?php
    require_once 'lib/db.php';

    $id = $_GET['areaId'];

    $db = connectToDB();

    $query = 'SELECT `desc` FROM libraryAreas WHERE id = ?';
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $areaDesc = $stmt->fetch();

    if (isset($areaDesc)){
        echo $areaDesc['desc'];
    }
?>