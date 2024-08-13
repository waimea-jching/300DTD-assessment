<?php
require_once 'lib/db.php';

$fore = $_GET['fore'];
$sur = $_GET['sur'];
$user = $_GET['user'];
$pass = $_GET['pass'];

$db = connectToDB();

$query = 'SELECT * FROM adminLogins';
$stmt = $db->prepare($query);
$stmt->execute([]);
$usersData = $stmt->fetchAll();

$userExists = false;
foreach ($usersData as $userData){
    if ($user == $userData['username']){
        $userExists = true;
    }
}

if($userExists) {
    $_SESSION['adminSignup']['username']['error'] = 'Username Taken!! try another one';
    header('location: adminSignup');
}
else {
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $db = connectToDB();

    $query = 'INSERT INTO adminLogins (forename, surname, username, hash) VALUES (?, ?, ?, ?)';
    $stmt = $db->prepare($query);
    $stmt->execute([$fore, $sur, $user, $hash]);
    $userData = $stmt->fetch();

    $_SESSION['adminSignup']['username']['error'] = '';

    $_SESSION['admin']['loggedIn'] = true;
    $_SESSION['admin']['forename'] = $fore;
    $_SESSION['admin']['surname'] = $sur;
    $_SESSION['canCreateAccount'] = false;

    header('location: welcome');
}

?>