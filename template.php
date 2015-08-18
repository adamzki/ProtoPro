<?php

$mysqli = new mysqli("localhost", "root", "", "protopro");

session_name('Webbshop');
session_start();

/* --------------- header för inloggad användare --------------- */
$header = <<<END
	<div id="wrapper">


		<div id="header2"><center>
  			<a href="index.html"><img src="images/logo.png" width="225" height="50" border="0" /></a>
		</center></div>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
  		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  		<title>ProtoPro: Share your ideas!</title>
  		<link href="css/style.css" rel="stylesheet" type="text/css" />
		</head>
END;
 /* --------------- header för ej inloggad användare --------------- */
$header2 = <<<END
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>ProtoPro Community Site</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		</head>
		<div id="wrapper">
			<div id="header"><a href="index.php"><img src="images/logo.png" /></a>
				<div id="loginmain">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br> sed do eiusmod tempor.</p>
				</div>
			</div>
END;
/* --------------- används endast när användare är inloggad --------------- */
$navigation = <<<END
<div id="navbar"><table width="900" border="0" cellspacing="0" cellpadding="0">
	<tr>
    <td width="301" align="center"><h2><a href="upload.php">My Page</a></h2></td>
    <td width="296" align="center"><h2><a href="prototypes.php">Prototypes</a></h2></td>
    <td width="303" align="center"><h2><a href="forum.php">Forum</a></h2></td>


END;
if (isset($_SESSION['Userid'])) {
	$navigation .= <<<END
	<td width="300" align="center"><h2><a href="logout.php">Logout</a></h2></td>
END;
}
else
{
	$navigation .= '<td width="300" align="center"><h2><a href="index.php">Login</a></h2></td>';
}
$navigation .= '</tr></table></div>';

/* --------------- footer finns på varje sida --------------- */
$footer = <<<END
				<div id="footer"><a href="#" target="_blank">Terms and conditions</a> | <a href="#">Contact</a> | This site is copyrighted. All rights reserved 2014.</div>
END;
?>