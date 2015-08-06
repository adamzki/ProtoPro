<?php
	include 'template.php';
	echo $header;

?>
<div id="wrapper">

<?php	echo $navigation; ?>
<div id="maincontent">
	<p>MAINCONTENT</p>
	<div id="leftcolumn">
		<p>LEFTCOLUM</p>
		<?php
			$query = <<<END
				SELECT * FROM users
				WHERE Userid = 1
END;
			$res = $mysqli->query($query);
			if($res->num_rows > 0){
				$row= $res->fetch_object();
				echo $row->Fname . " " . $row->Lname;
				echo "<br>";
				echo $row->Email;
			}
		?>
		<h3><a href="send_msg.php?receiverid=<?php echo $row->Userid; ?>">Send a message to <?php echo $row->Fname; ?></a></h3>
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
        echo $user_proto_name;echo "<br>";
        echo $user_proto_desc;echo "<br>";
        echo '<img src="data:image/jpeg;base64,'.base64_encode($user_proto_image).'" style="height: 300px;width:500px"/>';echo "<br>";
      }
    }
  ?>
 </div>

<?php	echo $footer; ?>

</div>