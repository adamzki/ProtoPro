<?php
include('login_check.php');

//$_SESSION = array();
//session_destroy();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProtoPro Community Site</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryEffects.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_effectAppearFade(targetElement, duration, from, to, toggle)
{
	Spry.Effect.DoFade(targetElement, {duration: duration, from: from, to: to, toggle: toggle});
}
</script>

<script src="slideshow/lightbox/jquery-1.7.2.min.js"></script>
<script src="slideshow/lightbox/lightbox.js"></script>

<link href="slideshow/lightbox/lightbox.css" rel="stylesheet" type="text/css" />


</head>



<body>


<div id="wrapper">

<div id="header"><a href="index.html"><img src="images/logo.png" /></a>


<div id="loginmain">
  <a href="#" target="_blank">Forgot password?</a>
    <form name="login" actions="login_check.php" method="post">
      <input type="text" name="Email" placeholder="Email" />
      <input type="text" name="Password" placeholder="Password" />
      <input type="submit" name="submit_login" value="Login" />
    </form>
</div>


</div>

<div id="maincontent">

<div id="top_image"></div>


<div id="leftcolumn">
  <h2>Welcome</h2>
  <p>This site works as a community where you can upload, share, display and discuss your prototypes</p>
  <p>Join us today, membership is free</p>
</div>



<div id="middlecolumn">
  <h2>Sign up!</h2>
  <a href="www.google.se" rel="lightbox[kristian]" title="car prototype"><p>sign up</p></a>
  <form name="new_user" actions="new_user.php" method="post">
    <input type="text" name="Fname" placeholder="First Name" />
    <input type="text" name="Lname" placeholder="Last Name" />
    <input type="text" name="Email" placeholder="Email" />
    <input type="text" name="Password2" placeholder="Password" />
    <br>
    <input type="submit" name="submit_reg" value="Sign up!" /> 
  </form>
</div>


<div id="rightcolumn">
  <h2>Prototype examples </h2>
  
  
  
  <a href="slideshow/lightbox/images/car.jpg" rel="lightbox[kristian]" title="car prototype"><img src="slideshow/lightbox/images/tn_test.jpg" width="72" height="72" /></a> 

<a href="slideshow/lightbox/images/image-2.jpg" rel="lightbox[kristian]" title="picture Two"><img src="slideshow/lightbox/images/thumb-2.jpg" width="72" height="72" /></a>

<a href="slideshow/lightbox/images/image-3.jpg" rel="lightbox[kristian]" title="picture Three"><img src="slideshow/lightbox/images/thumb-3.jpg" width="72" height="72" /></a>
  
<a href="slideshow/lightbox/images/car.jpg" rel="lightbox[kristian]" title="car prototype"><img src="slideshow/lightbox/images/tn_test.jpg" width="72" height="72" /></a> 

<a href="slideshow/lightbox/images/image-2.jpg" rel="lightbox[kristian]" title="picture Two"><img src="slideshow/lightbox/images/thumb-2.jpg" width="72" height="72" /></a>

<a href="slideshow/lightbox/images/image-3.jpg" rel="lightbox[kristian]" title="picture Three"><img src="slideshow/lightbox/images/thumb-3.jpg" width="72" height="72" /></a>
  
  
  
  
</div>

<div id="footer"><a href="#" target="_blank">Terms and conditions</a> | <a href="#">Contact</a> | This site is copyrighted. All rights reserved 2014.</div>


</div></div>



</body>
</html>
