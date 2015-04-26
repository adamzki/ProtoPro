<?php

session_name('Webbshop');
session_start();

$navigation = <<<END
<div id="navbar"><table width="900" border="0" cellspacing="0" cellpadding="0">
	<tr>
    <td width="301" align="center"><h2><a href="#">Upload</a></h2></td>
    <td width="296" align="center"><h2><a href="login.php">Home</a></h2></td>
    <td width="303" align="center"><h2><a href="forum.php">Forum</a></h2></td>


END;
if (isset($_SESSION['Userid'])) {
	$navigation .= <<<END
	<td width="300" align="center"><h2><a href="logout.php">Logout</a></h2></td>
	Inloggad som {$_SESSION['Fname']}
END;
}
else
{
	$navigation .= ' <a href="login.php">Logga in</a> |';
}
$navigation .= '</tr></table></div>';



$mysqli = new mysqli("localhost", "root", "", "protopro");

?>