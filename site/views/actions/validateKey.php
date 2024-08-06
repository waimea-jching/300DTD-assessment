<?php

    $creationkey = $_GET['key'] ?? '';

    $db = connectToDB();
    // Try to find a user account with the given username
    $query = 'SELECT * FROM keys';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $keys = $stmt->fetch();

    if ($keys) {

        foreach ($keys as $key){
            if ($creationkey ==)
        }



        if () {
            $_SESSION['user']['name'] = 'Jimmy User';
            $_SESSION['user']['loggedIn'] = true;
    
            header('HX-Redirect: ' . SITE_BASE . '/dashboard');
        }
        else {
            echo '<h2>Account or password not recognised</h2>';
        }
    }

?>