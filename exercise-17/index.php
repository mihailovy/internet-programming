<?php
// Стартиране на сесията на PHP, която използваме за да поддържаме
//  потребителя логнат в акаунта му $_SESION[]
session_start();

// Зареждане на конфигурацията на базата данни. Използваме $db
include ("main-config.php");

if (isset($_GET['c'])) {
  $controller = $_GET['c']; // стринг с името на контролера
} else {
  $controller = "page";
}
if (isset($_GET['a'])) {
  $action = $_GET['a']; // стринг с името на екшъна
} else {
  $action = "home";
}

// Зареждане само на конкретен контролер
if (is_file("controller/".$controller.".php")) {
  
  // Зареждаме само кода на контролера, който ни е необходим
  include ("controller/".$controller.".php");
  
  // Правим първата буква главна
  $controllerName = ucfirst($controller); 
  
  // Създаваме обект, с който ще работим само за конретния контролер
  $controllerObj  = new $controllerName($db);
  
  // Взимаме списък с методите (екшъните) на класа (контролера)
  $methods = get_class_methods($controllerObj);
  
  // проверяваме в класа има ли метод с такова име $action
  if (in_array( $action, $methods) ) {
    // Да, има, тогава стартираме метода
    $controllerObj->{$action}();
    exit (0);
  }
  
}
header("HTTP/1.0 404 Not Found");
exit (0);

