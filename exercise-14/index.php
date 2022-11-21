<?php
session_start();

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
    case 'home':
      include ("view/home.php");
      break;
    case 'about':
      include ("view/about.php");
      break;
    case 'myths':
      include ("view/myths-and-legends.php");
      break;
    case 'register':
      include ("view/register.php");
      break;
    case 'login':
      include ("view/login.php");
      break;
    default:
      header("HTTP/1.0 404 Not Found");
      exit (0);  
      break; 
  }
} else {
  include ("view/home.php");
}

