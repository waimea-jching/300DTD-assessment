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
// Initialise the router
$router = new Router(['debug' => true]);


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/', 'pages/welcome.php', 'layouts/welcome_layout.php');
$router->route(GET, PAGE, '/intro', 'pages/introduction.php', 'layouts/hero.php');
$router->route(GET, PAGE, '/adminLogin', 'pages/adminLogin.php', 'layouts/admin_layout.php');
$router->route(GET, PAGE, '/validateKey', 'actions/validate-key.php');


//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
