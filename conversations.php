<?php
	include 'template.php';
	echo $header;
?>

<div id="wrapper">
<?php echo $navigation; ?>
	<div id="maincontent">
		<div id="leftcolumn">
			<h3>Active conversations</h3><br>
			<?php
				$query = <<<END
					SELECT * FROM message_group
					WHERE user_one = {$_SESSION['Userid']} OR user_two = {$_SESSION['Userid']}
END;
				$res = $mysqli->query($query);
				if($res->num_rows > 0){
					while ($row = $res->fetch_object()) {
						$hash = $row->hash;
						$user_one = $row->user_one;
						$user_two = $row->user_two;

						if($user_one == $_SESSION['Userid']){
							$select_id = $user_two;
						}else{
							$select_id = $user_one;
						}
						$query = <<<END
							SELECT Fname, Lname FROM users
							WHERE Userid = $select_id
END;
						$res = $mysqli->query($query);
						if($res->num_rows > 0){
							while ($row = $res->fetch_object()){
								echo "<a href='conversations.php?hash=$hash'>" . $row->Fname . " " . $row->Lname . "</a>";
							}
						}
					}
				}
			?>
		</div>
		<div id="double-right-column">
			<h3>DOUBLE-RIGHT-COLUM</h3>
			<?php
			if(isset($_GET['hash'])){
				$query = <<<END
					SELECT * FROM messages
					WHERE group_hash = {$_GET['hash']}
END;
				$res = $mysqli->query($query);
					while ($row = $res->fetch_object()){
					echo $row->message;
				}
			}else{
				echo "Select a conversation to the left.";
			}
			?>
		</div>
	</div>
	<?php echo $footer; ?>
</div>