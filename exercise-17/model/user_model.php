<?php

class User_model {
  
  // Properties
  private $db = null;
  
  // Methods
  function __construct($db)
  {
    $this->db = $db;
  }
  
  // begin: create user
  function create()
  {
    $message = "";
    
    if ( isset($_POST['register_submit'])) {
      // Регистрационната форма е изпратена към сървъра
      
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
      $query = mysqli_query($this->db, $sql);
      
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
        mysqli_query($this->db, $sql);
        $message = "Вие успешно се регистрирахте!";
      }
    } else {
      // $message = "Не са полуечени данни за регистрация!";
    }
    return $message;
  }
  // end: create user
  
  
  // begin: read user
  function login()
  {
    $message = "";
    
    if (isset($_POST['login_submit']) ) {
      // Потребителят е изпратил данни за логин към сървъра
      
      
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
      $query = mysqli_query($this->db, $sql);
      
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
      //
    }
    return $message;
  }
  // end: read user
  
  // begin: update user
  function update()
  {
    $message = "";
    $userId  = $_SESSION['user']['id'];
    
    if (isset($_POST['useredit_submit']) ) {
      
      // За разлика от $user, тук са редактираните от потребителя данни:
      $userEdit = $_POST;
      
      /* валидация и филтрация на данните
      ...
      */
      // CRUD - Update, промяна на запис/ред в БД
      if (   !empty($userEdit['password']) 
         and !empty($userEdit['passwordRepeat'])
         and $userEdit['password'] == $userEdit['passwordRepeat']) {
        $sql    = "
        UPDATE `users`
          SET `firstname` = '".$userEdit['firstname']."',
              `family`    = '".$userEdit['family']   ."',
              `email`     = '".$userEdit['email']    ."',
              `gender`    = '".$userEdit['gender']   ."',
              `password`  = '".$userEdit['password'] ."'
          WHERE  `id` = $userId";
        $message = "Вие успешно променихте данните във Вашия профил и зададохте нова парола.";
      } else {
        $sql    = "
        UPDATE `users`
          SET `firstname` = '".$userEdit['firstname']."',
              `family`    = '".$userEdit['family']   ."',
              `email`     = '".$userEdit['email']    ."',
              `gender`    = '".$userEdit['gender']   ."'
          WHERE  `id` = $userId";
        $message = "Вие успешно променихте данните във Вашия профил.";
      }
      $query   = mysqli_query($this->db, $sql);
    }
    
    $sql    = "
      SELECT *
        FROM `users`
        WHERE  `id` = $userId";
    $query = mysqli_query($this->db, $sql);
    
    // Получавам резултата като асоциативен масив от базата данни
    $user  = mysqli_fetch_assoc($query);
    
    return array('user' => $user, 'message' => $message);
    
    // end: update user
  }
  
  // Begin: delete user
  function delete()
  {
    $userId = $_SESSION['user']['id'];
    if (   isset($_POST['userdelete_submit']) 
       and !empty($_POST['password']) 
       and !empty($_POST['passwordRepeat'])
       and $_POST['password'] == $_POST['passwordRepeat']
       and $_POST['password'] == $_SESSION['user']['password']) {
      // CRUD - Delete, изтриване на запис/ред в БД
      $sql = "
        DELETE FROM `users`
          WHERE `id` = $userId";
      mysqli_query($this->db, $sql);
      
      // Унищожаване на сесията и логаут
      unset($_SESSION['user']);
      header("Location:index.php");
    }
  }
}
// end: delete user
