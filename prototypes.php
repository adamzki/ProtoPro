<?php 
  include'template.php';
  echo $header;
  ?>

<div id="wrapper">

<?php echo $navigation; ?>

<div id="maincontent">
  <div id="leftcolumn">     
     <h2>Latest prototypes</h2>
    <br><br>
    <br><br>
    <?php
      $query = <<<END
      SELECT * FROM prototypes
      ORDER BY timestamp DESC
END;
      $res = $mysqli->query($query);
      if($res->num_rows > 0){
        for ($i=0; $i < 3; $i++) { 
         $row = $res->fetch_object();
         echo '<div id="category_frame_latest"><a href="specific_prototype.php?protoid=' . $row->protoid . '"><img id="catogory_img" src="data:image/jpeg;base64,'.base64_encode($row->pic).'"><br>';
         echo $row->name . "<br></a></div>";
       
        }
        
      }
    ?>
          
</center></div>

<div id="double-right-column">
  <h2>Categories</h2>

<?php
  $query = <<<END
  SELECT * FROM Categories
END;
  
  $res = $mysqli->query($query);
  if($res->num_rows > 0){
    while($row = $res->fetch_object()){
      echo '<div id="category_frame_latest"><a href="cat_prototypes.php?cat_id=' . $row->cat_id . '"><img id="catogory_img" src="data:image/jpeg;base64,'.base64_encode($row->pic).'"><br>';
      echo $row->name . "</a></div>";
    }
  }

?>
      <a href="browse_users.php"><img src="images/pseudo_user_avatar.png" id="catogory_img" /><br>
        Browse users
      </a>
      </div>

</div>
<div id="footer"><a href="#" target="_blank">Terms and conditions</a> | <a href="#">Contact</a> | This site is copyrighted. All rights reserved 2014.</div>

</body>
</html>


