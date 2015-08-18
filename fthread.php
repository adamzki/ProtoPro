<?php include'template.php'; 
echo $header;
echo $navigation;
?>

<div id="maincontent">
  <div id="leftcolumn">
    <h3>Submit a reply</h3>
    <form method="post" name="freply">
      <?php
      if(isset($_POST['submit'])){
        $query = <<<END
        INSERT INTO freplies(topic_id,userid,text)
        VALUES ('{$_GET['thread_id']}','{$_SESSION['Userid']}','{$_POST['message']}')
END;
        $mysqli->query($query);

      }
      ?>
      <textarea name="message" cols="30" rows="10"></textarea><br>
      <input type="submit" value="Submit" name="submit">
    </form>
  </div>
  <div id="double-right-column">
    <h3>Replies for 
      <?php
      $query = <<<END
      SELECT * FROM ftopics
      WHERE topic_id = {$_GET['thread_id']}
END;
      $res = $mysqli->query($query);
      if($res->num_rows > 0){
        $row = $res->fetch_object();
        echo $row->name;
        $thread_description = $row->description;
      }
      ?></h3>
    
    <?php
      echo $thread_description . "<br><h4>Replies: </h4>";
      $query = <<<END
      SELECT * FROM freplies
      WHERE topic_id = {$_GET['thread_id']}
END;
      $res = $mysqli->query($query);
      if($res->num_rows > 0){
        while($row = $res->fetch_object()){
          $query2 = <<<END
          SELECT * FROM users
          WHERE Userid = {$row->userid};
END;
          $res2 = $mysqli->query($query2);
          while($row2 = $res2->fetch_object()){
            echo "From: <b>" . $row2->Fname . " " . $row2->Lname . "</b><br>  ";
            echo $row->text . "<br>" . $row->timestamp . "<br>";
            if($row2->Userid == $_SESSION['Userid']) {
              $reply_id = $row->reply_id;
              echo "<a href='delete_comment.php?reply_id={$row->reply_id}'>Delete this comment</a><hr>";
            }else{
              echo "<hr>";
            }
          }
        }
      }
    ?>
    
  </div>
</div>

