<?php
	include 'template.php';
	echo $header;
?>

<div id="wrapper">
<?php echo $navigation; ?>
	<div id="maincontent">
		<div id="leftcolumn">
			<h2><center>Inbox</center></h2><br>
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
						$query2 = <<<END
							SELECT * FROM users
							WHERE Userid = $select_id
END;
						$res2 = $mysqli->query($query2);
						$row2 = $res2->fetch_object();
							echo "<a href='conversations.php?hash=$hash'>" . $row2->Fname . " " . $row2->Lname . "</a><br><hr>";
						
					}
}
						
				
			?>
		</div>
		<div id="double-right-column">
			<h2>Selected Conversation:</h2>
			<?php
			if(isset($_GET['hash'])){
				$query = <<<END
					SELECT * FROM messages
					WHERE group_hash = {$_GET['hash']}
END;
				$res = $mysqli->query($query);
					while ($row = $res->fetch_object()){
						$query3 = <<<END
						SELECT * FROM users
						WHERE Userid = $row->from_id
END;
				$res3 = $mysqli->query($query3);
				while($row3 = $res3->fetch_object()){
					echo "<b>" . $row3->Fname . " says: </b>" . $row->message . "<br>";
				}
				}

				?>

				<br><br><form method="POST">
				<?php
					if (isset($_POST['message'])) {
						$query = <<<END
						INSERT INTO messages (group_hash,from_id,message)
						VALUES ('{$_GET['hash']}','{$_SESSION['Userid']}','{$_POST['message']}')
END;
					$mysqli->query($query);
					header("Location:conversations.php?hash={$_GET['hash']}");
					}
				?>
					Enter your reply:<br>
					<textarea name="message" rows="6" cols="50"></textarea>
					<br>
					<input type="submit" value="Send reply">
				</form>

				<?php
			}else{
				echo "Select a conversation to the left.";
			}


			?>
		</div>
		
	</div>
</div>
