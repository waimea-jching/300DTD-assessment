<!DOCTYPE html>
<html lang="en">

    <?php require '_head.php'; ?>

    <body>

        <header>
            <h1>ADMIN ACCESS</h1>

            <form action="validateKey" id="creation-key-form">
                <input type="text" name='key' value='creation key...'>
            </form>
        </header>

        <main class="hero">

            <?php require $pageContent; ?>
        
        </main>
            
    </body>

</html>

