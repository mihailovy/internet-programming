<?php

function cacheWrite($url, $data)
{
    $filename = rawurlencode($url).".json"; 
    file_put_contents($filename, $data); 
}

function cacheRead($url, $modify = "")
{
    $filename = rawurlencode($url).".json"; 
    $data = file_get_contents($filename);
}

// Свързване към база данни   
$db = new mysqli("localhost", "root", "");

// Избор на конкретна база данни
mysqli_select_db($db, "test");

if (isset($_GET['c'])) {
    if ( $_GET['c'] == "read"){
		// Does cache exist?
		if (file_exists(rawurlencode("c=read"))) {
			$json = cacheRead("c=read");
		} else {
			$query = mysqli_query($db, "SELECT * FROM `user`");
	        $user = [];
	        while($res = mysqli_fetch_assoc($query)) {
	            $user[] = $res;
	        };
	        $json = json_encode($user);
	        cacheWrite("c=read", $json);
		}
        echo($json);
        
    }
    if ( $_GET['c'] == "create"){
        $name   = $_GET['name']; 
        $family = $_GET['family'];
        $email  = $_GET['email'];
        $query = mysqli_query($db, "
          INSERT INTO `user`
                (`id`,`name`, `family`,`email`)
            VALUES
                (null, '$name', '$family', '$email') ");
        echo( json_encode("success"));

    }
    if ( $_GET['c'] == "delete"){
        $id   = $_GET['id']; 
        $query = mysqli_query($db, "
          DELETE FROM `user`
            WHERE `id` = $id");
        echo( json_encode("success"));
    }
}

