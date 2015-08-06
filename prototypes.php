<?php 
  include'template.php';
  echo $header;
  ?>

<div id="wrapper">

<?php echo $navigation; ?>

<div id="maincontent">
  <div id="leftcolumn">
    <h3>Welcome, <?php echo $_SESSION['Fname'] ?>!</h3>
      <center> 
          <p><a href="browse_users.php"><img src="images/pseudo_user_avatar.png" width="72" height="72" class="padtop12" /><br />
         Browse prototypes by users</p></a>
          <p><img src="images/tn_boat.jpg" width="72" height="72" class="padtop12" /><br />
         Water</p>
          <p>&nbsp;</p>
      </center>
         <p>Welcome to our prototyping community!</p>
         <p>Please choose the category where you <br />
           would like to upload your prototype <br />
           simply by clicking on the icon of your<br />
           choice</p>
   <p><img src="images/button-signout.jpg" width="115" height="28" /></p>
</div>

<div id="middlecolumn">
  <center><h3>&nbsp;</h3></center>
    <center>
      <p><img src="images/webwords.jpg" width="72" height="72" class="padtop12" /><br />
        Webdesign</p>
      <p><img src="images/4961518-939611-dimensional-cube-made-of-ones-and-zeros-isolated-on-white.jpg" width="72" height="72" class="padtop12" /><br />
        software
      </p><img src="images/tn_building.jpg" width="72" height="72" class="padtop12" /><br />
      Buildings
    </center>
</div>

<div id="rightcolumn">
  <center>
    <h3>&nbsp;</h3>
      <p><img src="images/4620589-silver-machine-gear-isolated-on-white-background.jpg" width="72" height="72" class="padtop12" /><br />
        Machines</p>
      <p><img src="images/bil.jpg" width="72" height="72" class="padtop12" /> <br />
        Cars</p>
      <p><img src="images/17789061-vector-illustration-of-blue-glossy-icon.jpg" width="72" height="72" class="padtop12" /><br />
        Others</center>
  </div>


<div id="footer"><a href="#" target="_blank">Terms and conditions</a> | <a href="#">Contact</a> | This site is copyrighted. All rights reserved 2014.</div>

</body>
</html>


