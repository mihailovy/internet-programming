<?php

// Свързване към база данни   
$db = new mysqli("localhost", "root", "pass4mysql");

// Избор на конкретна база данни
mysqli_select_db($db, "bats");
