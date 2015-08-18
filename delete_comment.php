<?php

include('template.php');

if(isset($_GET['reply_id']) && isset($_SESSION['Userid']))
{
	$query = <<<END
	DELETE FROM freplies
	WHERE reply_id = {$_GET['reply_id']}
END;
$mysqli->query($query);
header("Location:forum.php");
}

?>

?>