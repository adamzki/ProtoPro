<?php 
  include'template.php';
  echo $header;
  ?>

<div id="wrapper">

<?php echo $navigation; ?>

<div id="maincontent">
  <div id="leftcolumn">     
     <h2>Information:</h2>
    <br><br>
    <br><br>
    <?php
      $query = <<<END
      SELECT * FROM prototypes
      WHERE protoid = {$_GET['protoid']}
END;
    $res = $mysqli->query($query);
    if($res->num_rows > 0){
      while($row = $res->fetch_object()){
        echo "<b>Name: </b>" . $row->name . "<br><br>";
        echo "<b>Description: </b>" . $row->description;
        $pic = '<img id="prototype_img" src="' . $row->pic . '"><br>';
        $query = <<<END
        SELECT * FROM users
        WHERE Userid = $row->Userid
END;
        $res = $mysqli->query($query);
        if($res->num_rows > 0){
          while($row = $res->fetch_object()){
          echo "<br><br><b>Owner: </b><a href='view_user.php?receiverid={$row->Userid}'>" . $row->Fname . " " . $row->Lname . "</a>";
          $check_id = $row->Userid;
        }
        }
      }
    }

    if($_SESSION['Userid'] == $check_id){
      /*<form method="post">
        $query2 = <<<END
          DELETE FROM prototypes
          WHERE protoid = {$_GET['protoid']}
END;
        $mysqli->query($query2);
        
        <br><br>Click here to delete your prototype!
        <input type="submit" value="Delete">
      </form>*/
      echo "<br><br>This where delete will show if you own the prototype (not working yet)!";
       } ?>
          
</center></div>

<div id="double-right-column">
  <h2> Pictures</h2>
  <?php
  echo $pic;
  $query = <<<END
  SELECT * FROM comments
  WHERE protoid = {$_GET['protoid']}
END;
  $res = $mysqli->query($query);
  if ($res->num_rows > 0) {
    while ($row = $res->fetch_object()) {
      $query2 = <<<END
      SELECT Fname, Lname FROM users
      WHERE Userid = $row->userid
END;
      $res2 = $mysqli->query($query2);
       if($res2->num_rows > 0){
        while($row2 = $res2->fetch_object()) {
          echo $row2->Fname . " " . $row2->Lname . " says: <br>";
        }
      }
      echo "<i>" . $row->comment . "</i><br><br><hr>";
    }
  }
  ?>
  <form method="post" name="comment_form">
    <?php
    if(isset($_POST['comment'])){
      $query = <<<END
      INSERT INTO comments(protoid,userid,comment)
      VALUES ('{$_GET['protoid']}','{$_SESSION['Userid']}','{$_POST['comment']}')

END;
      $mysqli->query($query);
      // header("Location:specific_prototype.php?protoid={$_GET['protoid']}");
        }
        ?>
        <textarea name="comment" cols="60" rows="5"></textarea><br><br>
        <input type="submit" value="Submit">
      </form>

    </div>
    </div>
  </body>
</html>


