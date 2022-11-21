<?php

class Page {
  
  // Properties
  private $db = null;
  
  // methods 
  function __construct($db)
  {
    $this->db = $db;
  }

  // Зареждане
  function load ($filename)
  {
    include ($filename);
  }

  // Зареждане на страница
  function home()
  {
    $this->load("view/static/home.php");
  }

  function about()
  {
    $this->load("view/static/about.php");
  }
  
  function myths()
  {
    $this->load("view/static/myths-and-legends.php");
  }

}
