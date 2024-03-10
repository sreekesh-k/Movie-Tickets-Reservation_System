<?php

include('../db_connection.php');

$uid = $_GET['userid'];
$query = "DELETE FROM `users` WHERE `userid` = '$uid'";

$run = mysqli_query($conn, $query);

if ($run == true) {
?>

	<script type="text/javascript">
		alert("User Deleted Successfully!");
		window.open('userdb.php', '_self');
	</script>

<?php
}

?>