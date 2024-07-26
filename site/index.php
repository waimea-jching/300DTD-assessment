<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';
require_once 'lib/router.php';


//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'PHP Routing with HTMX';
const SITE_OWNER = 'Waimea College';


//-------------------------------------------------------------
// Initialise the router
$router = new Router(['debug' => true]);


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/', 'pages/welcome.php', 'layouts/welcome_layout.php');
$router->route(GET, PAGE, '/intro', 'pages/introduction.php');
$router->route(GET, PAGE, '/adminLogin', 'pages/adminLogin.php');


//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
