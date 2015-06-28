<?php include'template.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProtoPro Category Page</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

</script>
</head>

<body onload="MM_preloadImages('images/button-signout.jpg')">

<div id="wrapper">


<div id="header2"><center>
  <a href="index.html"><img src="images/logo.png" width="225" height="50" border="0" /></a>
</center></div>



<?php
echo $navigation;
?>

<div id="maincontent">
  
  
 


<div id="leftcolumn">
  
  Here you will see your prototypes and can upload new ones.
  By pressing the upload button below
  you are about to share your design
  with the rest of this community<br>
  <br>
  Other members will be able to look at 
  and comment your prototype when clicking
  on the icon of your uploaded design. <br>
  <br>
  You will also be able to interact
  with other members.</h4>
  
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <h3>File:</h3>
    <input type="file" name="image">
    <br><br>
    <input type="submit" value="Upload">
  </form>

 </div>



<div id="double-right-column">
  <topleft>
  <p><img src="images/tn_boat.jpg" width="72" height="72" class="floatleft" />WATER<br />
    <br />
    Prototypes in thsi category are objects such as boats, submarines, underwater drones and so on. </p>
<p>&nbsp; </p>
  <p>&nbsp;</p>
 
 <center>
 <p>test</p>
 </center>
 
 
 
 
</div></div></div>
</body>
</html>
