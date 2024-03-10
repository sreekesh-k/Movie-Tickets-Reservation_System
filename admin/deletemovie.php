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

	<table align="center" style="margin-top: 20px">
		<form action="" method="post">
			<tr>
				<th>Enter movie Name</th>
				<td>
					<input type="text" name="title" placeholder="Enter Movie Name" required>
				</td>
				<td>
					</tfoot><input type="Submit" name="submit" value="Search" class="btn btn-primary">
				</td>
			</tr>
		</form>
	</table>

	<table align="center" border="1" width="85%" style="margin-top: 20px;">
		<tr style="background-color: black; color: white;" align="center">
			<th>No.</th>
			<th>Image</th>
			<th>Title</th>
			<th>Release Date</th>
			<th>Description</th>
			<th>Runtime</th>
			<th>IMDB Rating</th>
			<th>Certificate</th>
			<th>Metascore</th>
			<th>Votes</th>
			<th>Language</th>
			<th>Genre</th>
			<th>Delete</th>
		</tr>
		<?php

		if (isset($_POST['submit'])) {

			include('../db_connection.php');

			$title = $_POST['title'];

			$query = "SELECT * FROM movies WHERE `title` LIKE '%$title%'";
			$run = mysqli_query($conn, $query);

			if (mysqli_num_rows($run) < 1) {
				echo "<tr><td colspan='6' align='center'>No data found</td><tr>";
			} else {
				$count = 0;
				while ($data = mysqli_fetch_assoc($run)) {
					$count++;
		?>
					<tr align="center">
						<td><?php echo $count; ?></td>
						<td><img src="<?php echo $data['image_url']; ?>" style="max-width:200px;max-height:300px;"></td>
						<td><?php echo $data['title']; ?></td>
						<td><?php echo $data['r_date']; ?></td>
						<td><?php echo $data['description']; ?></td>
						<td><?php echo $data['runtime']; ?></td>
						<td><?php echo $data['imdb_rating']; ?></td>
						<td><?php echo $data['certificate']; ?></td>
						<td><?php echo $data['metascore']; ?></td>
						<td><?php echo $data['votes']; ?></td>
						<td><?php echo $data['language']; ?></td>
						<td><?php echo $data['genre']; ?></td>
						<td><a href="deletemovie1.php?movieid=<?php echo $data['movieid']; ?>">Delete</a></td>
					</tr>
		<?php
				}
			}
		}
		?>
	</table>





	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>

</html>