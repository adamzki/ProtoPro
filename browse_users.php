<?php
	include 'template.php';
	echo $header;

?>
<div id="wrapper">

<?php	echo $navigation; ?>
<div id="maincontent">
	<h2><center>Members</center></h2>
	<div id="leftcolumn">
		<p>Here are the registered Protopro:ers</p>
		<?php
			$query = <<<END
				SELECT * FROM users
END;
			$res = $mysqli->query($query);
			if($res->num_rows > 0){
				while($row = $res->fetch_object()){
					$temp_user_id = $row->Userid;
					echo "<a href='view_user.php?receiverid=$temp_user_id'>" . $row->Fname . " " . $row->Lname . "</a>";
					echo "<br><hr>";
				}
			}
		?>
		
	</div>
<div id="double-right-column">

 </div>
</div>