<?php
require_once 'lib/db.php';

$user = $_GET['username'];
$pass = $_GET['pass'];

$db = connectToDB();

$query = 'SELECT * FROM adminLogins WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

consoleLog($userData);

$hash = password_hash($pass, PASSWORD_DEFAULT);
consoleLog($hash);

if ($userData){
    if (password_verify($hash, $userData['hash'])){
        $_SESSION['admin']['loggedIn'] = true;
        $_SESSION['admin']['forename'] = $userData['forename'];
        $_SESSION['admin']['surname'] = $userData['surname'];

        header('location: intro');
    }
}

?>