<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';
require_once 'lib/router.php';


//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'The Librarys Mystery';
const SITE_OWNER = 'Waimea College';


//-------------------------------------------------------------
// Setup a session
session_name('session');
session_start();

$userName   = $_SESSION['admin']['name']     ?? 'Student';
$isLoggedIn = $_SESSION['admin']['loggedIn'] ?? false;


//-------------------------------------------------------------
// Initialise the router
$router = new Router(['debug' => true]);


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/', 'pages/welcome.php', 'layouts/welcome_layout.php');
$router->route(GET, PAGE, '/welcome', 'pages/welcome.php', 'layouts/welcome_layout.php');
$router->route(GET, PAGE, '/intro', 'pages/introduction.php', 'layouts/hero.php');
$router->route(GET, PAGE, '/adminLogin', 'pages/adminLogin.php', 'layouts/hero.php');
$router->route(GET, PAGE, '/adminSignup', 'pages/adminSignup.php', 'layouts/hero.php');
$router->route(GET, PAGE, '/login', 'actions/processLogin.php');
$router->route(GET, PAGE, '/validateKey', 'actions/validateKey.php');
$router->route(GET, PAGE, '/signup', 'actions/processSignup.php');
$router->route(GET, PAGE, '/logout', 'actions/logout.php');

//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
