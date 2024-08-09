<!DOCTYPE html>
<html lang="en">

    <?php 
        require '_head.php'; 
        $loggedIn = $_SESSION['admin']['loggedIn'] ?? false;
    ?>

    <body>

        <header id="welcome-header"> 
            <?php
                if (!$loggedIn) echo '<a href="/adminLogin" role="button">ADMIN</a>';
                else echo '<a href="/logout" role="button">LOGOUT</a>';
            ?>
        </header>

        <main class="hero">

            <?php require $pageContent; ?>
        
        </main>
            
    </body>

</html>

