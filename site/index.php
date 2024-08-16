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
$router->route(GET, PAGE, '/adminLogin', 'pages/adminLogin.php', 'layouts/hero.php');
$router->route(GET, PAGE, '/adminSignup', 'pages/adminSignup.php', 'layouts/hero.php');
$router->route(GET, PAGE, '/adminPanel', 'pages/adminPanel.php', 'layouts/adminPanel_layout.php');
$router->route(GET, PAGE, '/login', 'actions/processLogin.php');
$router->route(GET, PAGE, '/validateKey', 'actions/validateKey.php');
$router->route(GET, PAGE, '/signup', 'actions/processSignup.php');
$router->route(GET, PAGE, '/logout', 'actions/logout.php');
$router->route(GET, PAGE, '/libraryMap', 'pages/libraryMap.php', 'layouts/libraryMap_layout.php');
$router->route(GET, HTMX, '/areaDesc', 'components/areaDesc.php');
$router->route(GET, HTMX, '/descriptionBoxText', 'components/descriptionBoxText.html');
$router->route(GET, PAGE, '/questions', 'pages/questions.php', 'layouts/questions_layout.php');
$router->route(GET, PAGE, '/deleteQuestion', 'actions/deleteQuestion.php');
$router->route(GET, PAGE, '/createQuestion', 'pages/createQuestion.php', 'layouts/hero.php');
$router->route(GET, PAGE, '/processQuestion', 'actions/processQuestion.php');
$router->route(GET, PAGE, '/addAnswer', 'actions/addAnswer.php');
$router->route(GET, PAGE, '/setCorrectAnswer', 'actions/setCorrectAnswer.php');
$router->route(GET, PAGE, '/checkAnswer', 'actions/checkAnswer.php');
$router->route(GET, PAGE, '/completed', 'pages/completed.php', 'layouts/hero.php');

//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
