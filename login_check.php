<?php

$mysqli = new mysqli("localhost", "root", "", "protopro");

if (isset($_POST['Email'])) {
	$query = <<<END
	SELECT Email, Password, Fname, Userid FROM users
	WHERE Email = '{$_POST['Email']}'
	AND Password = '{$_POST['Password']}'
END;
$res = $mysqli->query($query);
	if ($res->num_rows > 0) {
		$row = $res->fetch_object();
		$_SESSION["Fname"] = $row->Email;
		$_SESSION["Userid"] = $row->id;
		header("Location:login.php");
	}else{
		echo "Fel användarnamn eller lösenord.";
	}
}

?>