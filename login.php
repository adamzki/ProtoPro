<?php
	include'template.php';

?>


<div id="wrapper">

<?php
	echo $header2;
	
?>

<div id="maincontent">
	<div id="leftcolumn">
		<h2>New to ProtoPro? Register below!</h2>
		<form name="new_user" actions="index.php" method="post">
        <input type="text" name="Fname" placeholder="First Name">
        <input type="text" name="Lname" placeholder="Last Name">
        <input type="text" name="Email" placeholder="Email">
        <input type="text" name="Password" placeholder="Password">
        <br>
        <input type="submit" name="submit_reg" value="Sign up!" /> 
       	</form>
       	<?php

$mysqli = new mysqli("localhost", "root", "", "protopro");

if(isset($_POST['Email']) && ($_POST['Fname']) && ($_POST['Lname']) && ($_POST['Password']))  
{
  $query = <<<END
  INSERT INTO users(Fname,Lname,Email,Password)
  VALUES ('{$_POST['Fname']}','{$_POST['Lname']}','{$_POST['Email']}','{$_POST['Password']}')
END;
$mysqli->query($query);
header('Location:prototypes.php');
}else{
	echo "Fill out all of the fields";
}

?>
	</div>
	<div id="middlecolumn">
		<h2>Lorum ipsum!</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
		in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
		sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	</div>
		<div id="rightcolumn">
		<h2>Lorum ipsum!</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
		in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
		sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	</div>
</div>

<?php
	echo $footer;
?>
</div>