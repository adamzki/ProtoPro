<?php include'template.php'; 
echo $header;
echo $navigation;
?>

<div id="maincontent">
  <div id="leftcolumn">
    <h3>Create a thread!</h3>
    <form method="post">
      <?php
      if(isset($_POST['description'])){
      $query = <<<END
      INSERT INTO ftopics (cat_id,description,userid, name)
      VALUES ('{$_GET['fcat_id']}', '{$_POST['description']}','{$_SESSION['Userid']}','{$_POST['name']}')
END;
      $mysqli->query($query);
      

      }
      ?>
      <input type="text" placeholder="Name of your thread here!" name="name"><br>
      <textarea name="description" rows="10" cols="35" placeholder="And the description here!"></textarea><br>
      <input type="submit" value="Create!">
    </form>
  </div>
  <div id="double-right-column">
    <h3>Topics in 
      <?php 
      $query = <<<END
      SELECT name FROM fcategories
      WHERE fcat_id = {$_GET['fcat_id']}
END;
      $res = $mysqli->query($query);
      if ($res->num_rows > 0) {
        $row = $res->fetch_object();
        echo $row->name;
      }
      ?></h3>
    
    <?php
      $query = <<<END
      SELECT * FROM ftopics
      WHERE cat_id = {$_GET['fcat_id']}
END;
      $res = $mysqli->query($query);
      if($res->num_rows > 0){
        while($row = $res->fetch_object()){
          echo "<a href='fthread.php?thread_id={$row->topic_id}'><h4>" . $row->name . "</h4><br></a>";
          $query2 = <<<END
          SELECT * FROM users
          WHERE Userid = $row->userid;
END;
          $res2 = $mysqli->query($query2);
          $row2 = $res2->fetch_object();
          echo "By: " . $row2->Fname . " " . $row2->Lname . " Created: " . $row->timestamp;
        }
      }
    ?>
    
  </div>
</div>

