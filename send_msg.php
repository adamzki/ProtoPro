<?php
	include 'template.php';
	echo $header;

?>
<div id="wrapper">

<?php	echo $navigation; ?>
<div id="maincontent">
	<h2><center>Send message</center></h2>
	<div id="leftcolumn">
		<img src="images/letter.png" id="catogory_img" /></a>
		<?php
			$query = <<<END
				SELECT * FROM users
				WHERE Userid = {$_GET['receiverid']}
END;
			$res = $mysqli->query($query);
			if($res->num_rows > 0){
				$row= $res->fetch_object();
				echo "<h3>Message to: " . $row->Fname . " " . $row->Lname . "</h3>";
				$receiver = $row->Userid;
				$ran_num = rand();
			}
		?>
		
	</div>
<div id="double-right-column">
	<form method="post">
		Enter Message : <br>
		<textarea name="message" rows="7" cols="60" placeholder="test"></textarea>
		<br>
		<input type="submit" name="send" value="Send Message">
	</form>
	<?php
			if (isset($_POST['message'])) {
				$query = <<<END
					SELECT hash FROM message_group
					WHERE (user_one = {$_SESSION['Userid']} AND user_two = $receiver) OR (user_one = $receiver AND user_two = {$_SESSION['Userid']})
END;
				$res = $mysqli->query($query);
				if ($res->num_rows > 0) {
					$row = $res->fetch_object();
					echo "Conversation already started";
				}else{
					$query = <<<END
						INSERT INTO message_group(user_one,user_two,hash)
						VALUES ('{$_SESSION['Userid']}', '$receiver', '$ran_num')
					
END;
					$mysqli->query($query);

					$query = <<<END
						INSERT INTO messages(group_hash,from_id,message)
						VALUES ('$ran_num', '{$_SESSION['Userid']}', '{$_POST['message']}')
END;
					$mysqli->query($query);
					echo "Conversation started!";
				}
			}
		?>

  
 </div>
</div>