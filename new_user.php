<?php

$mysqli = new mysqli("localhost", "root", "", "protopro");

if(isset($_POST['Email']))	
{
	$query = <<<END
	INSERT INTO users(Fname,Lname,Email,Password)
	VALUES ('{$_POST['Fname']}','{$_POST['Lname']}','{$_POST['Email']}','{$_POST['Password2']}')
END;
$mysqli->query($query);
header('Location:forum.html');
}

?>