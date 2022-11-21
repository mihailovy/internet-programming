<?php

if ( isset($_POST['register_submit'])) {
  // Регистрационната форма е изпратена към сървъра
  
  // Свързване към база данни   
  $db = new mysqli("localhost", "root", "pass4mysql");
  
  // Избор на конкретна база данни
  mysqli_select_db($db, "bats");
  
  $user = $_POST;
  /* валидация и филтрация на данните
  ...
  */
  
  // Дали такъв потребител вече не съществува?
  // CRUD, операция Read
  $sql = "
    SELECT *
      FROM `users`
      WHERE  `email` = '".$user['email']."'";
  $query = mysqli_query($db, $sql);
  
  // Получавам резултата като асоциативен масив
  $res   = mysqli_fetch_assoc($query);
  
  if (isset($res['id'])) {
    
     // Потребител с този имейл е регистриран
     $message = "Потребител с такъв имейл адрес е вече регистриран в системата.";
    
  } else {
    // Потребител стакъв имейл не съществува, регистрираме го!   
    // CRUD - Create, създаване на нов запис/ред в БД
    $sql = "
      INSERT INTO `users`
          (`id`                , `firstname`             ,`family`            ,
           `email`             , `password`              , `gender`)
        VALUES
          (null                , '".$user['firstname']."', '".$user['family']."',
           '".$user['email']."', '".$user['password'] ."', '".$user['gender']."'
          )";
    mysqli_query($db, $sql);
    $message = "Вие успешно се регистрирахте!";
  }
} else {
  // $message = "Не са полуечени данни за регистрация!";
}
include ("header.php");

include ("footer.php");







