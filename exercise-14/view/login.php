<?php

if (isset($_POST['login_submit']) ) {
  // Потребителят е изпратил данни за логин към сървъра
  
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
    // Има такъв потребител
    
    // Дали е задал правилна парола?
    if ($user['password'] == $res['password']) {
        
        // Потребителят може да бъде логнат
        $message = "Вие успешно влязохте в системата";
        
        // Ще запишен потребителските данни в сесията на PHP
        $_SESSION['user'] = $res;
        
    } else {
        $message = "Неправилно зададен имейл адрес или парола";
    }
  } else {
    // Няма такъв потребител
     $message = "Неправилно зададен имейл адрес или парола";
  }
  
} else {

}

include ("header.php");

include ("footer.php");
