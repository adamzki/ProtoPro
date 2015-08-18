<?php include'template.php'; 
echo $header;
echo $navigation;
?>

<div id="maincontent">
  <div id="leftcolumn">
    <h3>Latest added topics!</h3>
  </div>
  <div id="double-right-column">
    <h3>Categories</h3>
    
    <?php
      $query = <<<END
      SELECT * FROM fcategories
END;
      $res = $mysqli->query($query);
      if($res->num_rows > 0){
        while($row = $res->fetch_object()){
          echo "<a href='ftopics.php?fcat_id={$row->fcat_id}'><h4>" . $row->name . "</h4><br></a>";
          echo $row->description . "<hr>";
        }
      }
    ?>
    
  </div>
</div>

