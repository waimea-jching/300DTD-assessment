<h1>ADMIN CREATION</h1>

<?php 
    //Set variables in the session
    $userError = $_SESSION['adminSignup']['username']['error'] ?? '';  

    $allowed = $_SESSION['canCreateAccount'] ?? false;

    if (!$allowed) header('location: welcome');
?>

<form action="signup" id="adminLoginForm">
    <?php echo '<p class="error">'.$userError.'</p>'; ?>
    <input type="text" name='user' value='username...'>
    <input type="text" name='pass' value='password...'>

    <input type="text" name='fore' value='forename...'>
    <input type="text" name='sur' value='surname...'>

    <input type="submit" value="Create">
</form>