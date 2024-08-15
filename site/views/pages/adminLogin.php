<h1>ADMIN ACCESS</h1>

<?php
    $_SESSION['canCreateAccount'] = false;
    $error = $_SESSION['adminLogin']['error'] ?? false;
?>

<form action="login" id="adminLoginForm">
    <?php
        if ($error != false){
            echo '<p class="error">'.$error.'</p>';
        }
    ?>
    <input type="text" name='username' value='username...'>
    <input type="text" name='pass' value='password...'>

    <input type="submit" value="Login">
</form>

<form action="validateKey" id="validateKeyInputForm">
    <input type="text" name='key' value='Creation Key...'>
    <input type="submit" value="Create">
</form>