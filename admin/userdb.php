<!DOCTYPE html>
<html>

<head>
	<title>Movie Database</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
	<div align="center" class="bg-dark text-light pt-4 pb-4">
		<a href="logout.php"><button style="float: right;" class="btn btn-danger mr-3">LOGOUT</button></a>
		<a href="admindash.php"><button style="float: left;" class="btn btn-success ml-3">
				<< BACK</button></a>
		<h1>WELCOME TO ADMIN DASHBOARD</h1>
	</div>

	<table align="center" border="1" width="90%" style="margin-top: 20px;" class="mb-5">
		<tr style="background-color: black; color: white;" align="center">
			<th width="100">No.</th>
			<th width="150">UserName</th>
			<th width="180">Email</th>
			<th width="150">Password</th>
		</tr>

		<?php

		include('../db_connection.php');

		$query = "SELECT * FROM `users` ";
		$run = mysqli_query($conn, $query);

		if (mysqli_num_rows($run) < 1) {
			echo "<tr><td colspan='5' align='center'>No data found</td><tr>";
		} else {
			$count = 0;
			while ($data = mysqli_fetch_assoc($run)) {
				$count++;
		?>
				<tr align="center">
					<td> <?php echo $count; ?> </td>
					<td> <?php echo $data['username']; ?> </td>
					<td> <?php echo $data['emailid']; ?> </td>
					<td> <?php echo $data['password']; ?> </td>
				</tr>
		<?php
			}
		}
		?>
	</table>

	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>

</html>