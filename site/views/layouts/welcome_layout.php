<!DOCTYPE html>
<html lang="en">

    <?php 
        require '_head.php'; 
        $loggedIn = $_SESSION['admin']['loggedIn'] ?? false;
        $fore = $_SESSION['admin']['forename'] ?? '';
        $sur = $_SESSION['admin']['surname'] ?? '';
        $name = $fore . ' ' . $sur;
    ?>

    <body>

        <header id="welcomeHeader"> 
            <?php
                if (!$loggedIn) {
                    echo '<a href="/adminLogin" role="button">Admin Login</a>';
                }
                else {
                    echo '<h4>ADMIN: ' . $name . '</h4>';

                    echo '<div>';
                    echo '<a href="/adminPanel" role="button">Admin Panel</a>';
                    echo '<a href="/logout" role="button">Logout</a>';
                    echo '</div>';
                }
            ?>
        </header>

        <main class="hero">

            <?php require $pageContent; ?>
        
        </main>
            
    </body>

</html>

