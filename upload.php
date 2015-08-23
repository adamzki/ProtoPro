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
       
<br><h3>Members</h3>
       By pressing the icon below, you will access other members of this site. From here you can contact fellow prototypers, and see 
       their prototypes.</br>

 <a href="browse_users.php"><img src="images/pseudo_user_avatar.png" id="catogory_img" /></a>

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
                $cat_id = 0;

                $query = <<<END
                SELECT * FROM categories
END;
                $res = $mysqli->query($query);
                for ($i=1; $i < 5; $i++) { 
                $row = $res->fetch_object();

                  echo "<option value='{$row->name}'> $row->name";
                  echo "<input type='hidden' name='cat_id' value='$cat_id+$i'>";
                  
                    
                  
                  }
                
              ?>
            </select>
            
            <h3>Picture:</h3>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br><br>
            <input type="submit" name="upload" value="Upload">
          </form>

<?php
  $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        $image_name = $_FILES['image']['name'];
        
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 200000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $image_tmp_name = basename( $_FILES["fileToUpload"]["name"]);
      $query = <<<END
      SELECT * FROM categories
      WHERE cat_id = 
END;
      $query = <<<END
      INSERT INTO prototypes(name,description,Userid,cat_id,pic)
      VALUES ('{$_POST['name']}','{$_POST['description']}','{$_SESSION['Userid']}','{$_POST['cat_id']}','uploads/{$image_tmp_name}')
END;
      $mysqli->query($query);
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
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
      echo '<div id="category_frame"><a href="specific_prototype.php?protoid=' . $row->protoid . '"><img id="catogory_img" src="' . $row->pic . '"><br>';
      echo $row->name . "</a></div>";
    }
  }

?>
      </a>
    </div>
    <?php include'footer.php';?>
  </div>

</div>

</body>
</html>
