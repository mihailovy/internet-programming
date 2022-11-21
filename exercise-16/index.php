<?php
// Стартиране на сесията на PHP, която използваме за да поддържаме
//  потребителя логнат в акаунта му $_SESION[]
session_start();

// Зареждане на конфигурацията на базата данни. Използваме $db
include ("main-config.php");


// Зареждане на контролерите 
include ("controller/user.php");
include ("controller/page.php");

// Зареждане на моделите
include ("model/User_model.php");

// Нов обект от клас User от файл controller/user.php
$uc = new User($db); // Взимаме $db от main-config.php
$pg = new Page($db);

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
    
    // Статични страници
    case 'home':
      $pg->home();
      break;
    case 'about':
      $pg->about();
      break;
    case 'myths':
      $uc->myths();
      break;
    
    // Динамични страници 
    case 'register':
      $uc->register();
      break;
    case 'login':
      $uc->login();
      break;
    case 'logout':
      $uc->logout();
      break;
    case 'edit-user':
      $uc->edit();
      break;
    case 'delete-user':
      $uc->delete();
      break;
      
    // Страници за грешки
    default:
      header("HTTP/1.0 404 Not Found");
      exit (0);  
      break; 
  }
} else {
  $pg->home();  // Стартираме метод home() на User контролера
}

