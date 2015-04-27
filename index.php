<?php
include'template.php';
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
  <div id="header"><a href="index.php"><img src="images/logo.png" /></a>
    <div id="loginmain">
      <a href="#" target="_blank">Forgot password?</a>
        <form name="login" actions="index.php" method="post">
          <input type="text" name="Email" placeholder="Email" />
          <input type="password" name="Password" placeholder="Password" />
          <input type="submit" name="submit_login" value="Login" />
        </form>
        <?php

if (isset($_POST['Email'])) {
  $query = <<<END
  SELECT Email, Password, Fname, Userid FROM users
  WHERE Email = '{$_POST['Email']}'
  AND Password = '{$_POST['Password']}'
END;
$res = $mysqli->query($query);
  if ($res->num_rows > 0) {
    $row = $res->fetch_object();
    $_SESSION["Fname"] = $row->Fname;
    $_SESSION["Userid"] = $row->Userid;
    header("Location:login.php");
  }else{
    echo "Fel användarnamn eller lösenord.";
  }
}
?>
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
       </div>

     <div id="rightcolumn">
      <h2>Prototype examples </h2>
        <a href="slideshow/lightbox/images/frontone.jpg" rel="lightbox[kristian]" title="Building"><img src="slideshow/lightbox/images/frontone.jpg" width="72" height="72" /></a> 
        <a href="slideshow/lightbox/images/fronttwo.jpg" rel="lightbox[kristian]" title="Iron man"><img src="slideshow/lightbox/images/fronttwo.jpg" width="72" height="72" /></a>
        <a href="slideshow/lightbox/images/frontthree.jpg" rel="lightbox[kristian]" title="Starship"><img src="slideshow/lightbox/images/frontthree.jpg" width="72" height="72" /></a>
        <a href="slideshow/lightbox/images/frontfour.jpg" rel="lightbox[kristian]" title="Startrooper"><img src="slideshow/lightbox/images/frontfour.jpg" width="72" height="72" /></a> 
        <a href="slideshow/lightbox/images/frontfive.jpg" rel="lightbox[kristian]" title="Car"><img src="slideshow/lightbox/images/frontfive.jpg" width="72" height="72" /></a>
        <a href="slideshow/lightbox/images/frontsix.jpg" rel="lightbox[kristian]" title="Mobile home"><img src="slideshow/lightbox/images/frontsix.jpg" width="72" height="72" /></a>
     </div>

<?php include'footer.php';?>
    </div>
  </body>
</html>




