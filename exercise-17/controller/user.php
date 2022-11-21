<?php

class User {
  
  // Properties
  private $db = null;
  private $User_Model  = null;
  
  // methods 
  function __construct($db)
  {
    $this->db = $db;
    
    // Зареждане на моделите
    include ("model/User_model.php"); 
    
    // Създаваме нов обект от клас User_model
    $this->User_Model = new User_model($this->db);
  }
  
  // Динамични  страници
  
  function login()
  {
    // Стартираме метод login()
    $message =  $this->User_Model->login();
    include ("view/user/login.php");
  }
  
  function logout()
  {
    unset ($_SESSION['user']); // Сесията се унищожава
    header("Location: index.php");
  }
  
  function register()
  {
    $message =  $this->User_Model->create();
    include ("view/user/register.php");
  }
  
  function edit()
  {
    $result = $this->User_Model->update();
    $user   = $result['user'];
    $message= $result['message'];
    include ("view/user/edit-user.php");
  }
  
  function delete()
  {
    $this->User_Model->delete();
    include ("view/user/delete-user.php");
  }
  
}
