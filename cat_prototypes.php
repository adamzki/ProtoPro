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
      WHERE cat_id = {$_GET['cat_id']}
      ORDER BY timestamp DESC
END;
      $res = $mysqli->query($query);
      if($res->num_rows > 0){
        for ($i=0; $i < 3; $i++) { 
          while($row = $res->fetch_object()){
            echo '<div id="category_frame"><a href="specific_prototype.php?protoid=' . $row->protoid . '"><img id="catogory_img" src="' . $row->pic . '"><br>';
            echo $row->name . "<br></a></div>";
          }
        }
      }
     

    ?>
          
</center></div>

<div id="double-right-column">
  <h2>Prototypes in <?php  $query = <<<END
      SELECT name FROM categories
      WHERE cat_id = {$_GET['cat_id']}
END;
      $res = $mysqli->query($query);
      if($res->num_rows > 0){
        while($row = $res->fetch_object()){
      echo $row->name;
    } 
    }  ?></h2>

<?php
  $query = <<<END
      SELECT * FROM prototypes
      WHERE cat_id = {$_GET['cat_id']}
      ORDER BY timestamp DESC
END;
  $res = $mysqli->query($query);
  if($res->num_rows > 0){
    while($row = $res->fetch_object()){
      echo '<div id="category_frame"><a href="specific_prototype.php?protoid=' . $row->protoid . '"><img id="catogory_img" src="' . $row->pic . '"><br>';
      echo $row->name . "</a></div>";
    }
  }

?>
      </div>
</body>
</html>


