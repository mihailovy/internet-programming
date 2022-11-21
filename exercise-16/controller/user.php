<?php

class User {
  
  // Properties
  private $db = null;
  
  // methods 
  function __construct($db)
  {
    $this->db = $db;
  }
  
  // Динамични  страници
  
  function login()
  {
    // Създаваме нов обект от клас User_model
    $u       = new User_model($this->db);
    // Стартираме метод login()
    $message = $u->login();
    include ("view/user/login.php");
  }
  
  function logout()
  {
    unset ($_SESSION['user']); // Сесията се унищожава
    header("Location: index.php");
  }
  
  function register()
  {
    $u       = new User_model($this->db);
    $message = $u->create();
    include ("view/user/register.php");
  }
  
  function edit()
  {
    $u      = new User_model($this->db);
    $result = $u->update();
    $user   = $result['user'];
    $message= $result['message'];
    include ("view/user/edit-user.php");
  }
  
  function delete()
  {
    $u       = new User_model($this->db);
    $u->delete();
    include ("view/user/delete-user.php");
  }
  
}
