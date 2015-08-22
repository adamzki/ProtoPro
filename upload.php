<?php include'template.php';
  if(!isset($_SESSION['Userid'])){
  header("Location:index.php");
}
  echo $header;
?>


<div id="wrapper">

  <?php

  echo $navigation;
  ?>

  <div id="maincontent">

    <div id="leftcolumn">
<h3>Inbox</h3>
      By pressing the button below, you will access your inbox. From here you can check 
      your conversations with fellow prototypers
<a href="conversations.php"><img src="images/email.jpg" id="catogory_img" /></a>
       
     <h3>Upload your prototype</h3>
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
      with other members. 
      

      

          <form method="post" enctype="multipart/form-data" name="fupload" action="upload.php">
            <h3>Name:</h3>
            <input type="text" name="name">
            <h3>Description:</h3>
            <textarea name="description" style="height:100px;width:250px;"></textarea>
            <h3>Category:</h3>
            <select name="category">
              <?php
                $query = <<<END
                SELECT * FROM categories
END;
                $res = $mysqli->query($query);
                while($row = $res->fetch_object()){
                  echo "<option value='{$row->name}'> $row->name";
                  $cat_id = $row->cat_id;
                }
              ?>
            </select>
            
            <h3>Picture:</h3>
            <input type="file" name="image">
            <br><br>
            <input type="submit" name="upload" value="Upload">
          </form>

<?php
              if(isset($_POST['upload'])){
                $image_name = $_FILES['image']['name'];
                $image_type = $_FILES['image']['type'];
                $image_size = $_FILES['image']['size'];
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $pic = file_get_contents($_FILES['image']['tmp_name']);

              if(isset($image_name)){
                $query2 = <<<END
                INSERT INTO prototypes (name,description,pic,Userid,cat_id)
                VALUES ('{$_POST['name']}', '{$_POST['description']}', '{$pic}', '{$_SESSION['Userid']}', '{$cat_id}')
END;
              $mysqli->query($query2);
              echo "Your prototype has been uploaded and stored in our database!";
              }else{
                echo "Fill out all fields to upload a prototype";
              }
              }
            ?>
    </div>
    <div id="double-right-column">
      <h2><center>My Page</center><h2>
      <?php
  $query = <<<END
      SELECT * FROM prototypes
      WHERE Userid = {$_SESSION['Userid']}
      ORDER BY timestamp DESC
END;
  $res = $mysqli->query($query);
  if($res->num_rows > 0){
    while($row = $res->fetch_object()){
      echo '<div id="category_frame"><a href="specific_prototype.php?protoid=' . $row->protoid . '"><img id="catogory_img" src="data:image/jpeg;base64,'.base64_encode($row->pic).'"><br>';
      echo $row->name . "</a></div>";
    }
  }

?>

    </div>
    <?php include'footer.php';?>
  </div>

</div>

</body>
</html>
