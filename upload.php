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
      with other members.<a href="conversations.php">Click here to see your inbox</a></h4>

      <?php

        $form_upload = <<<END
          <form action="upload.php" method="post" enctype="multipart/form-data">
            <h3>Name:</h3>
            <input type="text" name="name">
            <h3>Description:</h3>
            <textarea name="description" style="height:100px;width:250px;"></textarea>
            <h3>Picture:</h3>
            <input type="file" name="image">
            <br><br>
            <input type="submit" name="upload" value="Upload">
          </form>
END;

          echo $form_upload;

          if(isset($_POST['upload'])){
            $image_name = $_FILES['image']['name'];
            $image_type = $_FILES['image']['type'];
            $image_size = $_FILES['image']['size'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $pic = file_get_contents($_FILES['image']['tmp_name']);

            if($image_name == '' || ($_POST['description']) == '' || ($_POST['name']) == '') {
              echo "<script>alert('Please enter the name of your prototype, a description and select an image to upload!')</script>";
              exit(); 
            }else{
              $query = <<<END
                INSERT INTO prototypes(name,description,pic,Userid)
                VALUES ('{$_POST['name']}','{$_POST['description']}','$pic','{$_SESSION['Userid']}')
END;
            $mysqli->query($query);
                  echo "Your prototype has been uploaded and saved in our database!";
                  
                }}

      ?>
    </div>
    <div id="double-right-column">

      <?php
         $query = <<<END
          SELECT * FROM prototypes
          WHERE userid = '{$_SESSION['Userid']}'
END;
          $res = $mysqli->query($query);
          if($res->num_rows > 0){

            while($row = $res->fetch_object()){
              $user_proto_image = $row->pic;
              $user_proto_name = $row->name;
              $user_proto_desc = $row->description;
              echo "<h3>Prototype name:</h3>" . $user_proto_name;
              echo "<h3>Description:</h3>" . $user_proto_desc;
              echo '<img id="prototype_img" src="data:image/jpeg;base64,'.base64_encode($user_proto_image).'"/>';echo "<br><hr>";
            }
          }
      ?>

    </div>
  </div>
<?php echo $footer; ?>
</div>

</body>
</html>
