<?php
	include 'template.php';
	echo $header;

?>
<div id="wrapper">

<?php	echo $navigation; ?>
<div id="maincontent">
	<div id="leftcolumn">
		<h3>This member goes by...</h3>
		<?php
			$query = <<<END
				SELECT * FROM users
				WHERE userid = {$_GET['receiverid']}
END;
			$res = $mysqli->query($query);
			if($res->num_rows > 0){
				$row = $res->fetch_object();
					echo "Name: " . $row->Fname . " " . $row->Lname . "<br><hr>";
					echo "Email: " . $row->Email . "<br><hr>";
					echo "<a href='send_msg.php?receiverid=$row->Userid'>Send " . $row->Fname . " " . $row->Lname . " a message!</a>";
			}
		?>

		
	</div>
<div id="double-right-column">

<?php
         $query = <<<END
          SELECT * FROM prototypes
          WHERE userid = '{$_GET['receiverid']}'
END;
          $res = $mysqli->query($query);
          if($res->num_rows > 0){

            while($row = $res->fetch_object()){
              $user_proto_image = $row->pic;
              $user_proto_name = $row->name;
              $user_proto_desc = $row->description;
              echo "<h3>Prototype name:</h3>" . $user_proto_name;
              echo "<h3>Description:</h3>" . $user_proto_desc;
              echo '<img id="protortype_img" src="' . $row->pic . '"><br>';
            }
          }
      ?>
 </div>



</div>
