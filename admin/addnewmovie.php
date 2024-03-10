<!DOCTYPE html>
<html>

<head>
	<title>Add new Movie</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		.abc {
			border-radius: 50px;
			padding-bottom: 50px;
			margin-left: 50px;
			margin-right: 50px;
			background-color: #24262dd9;
		}
	</style>

</head>

<body>
	<div align="center" class="bg-dark text-light pt-4 pb-4">
		<a href="admin/logout.php"><button style="float: right;" class="btn btn-danger mr-3">LOGOUT</button></a>
		<a href="admindash.php"><button style="float: left;" class="btn btn-success ml-3">
				<< BACK</button></a>
		<h1>WELCOME TO ADMIN DASHBOARD</h1>
	</div>


	<div class="text-light abc">
		<div class="text-center mt-5 pt-5">
			<h1>ADD NEW Movie</h1>
		</div>

		<table align="center" style="margin-top: 50px; margin-right: 400px;" cellpadding="3">
			<form action="" method="post" enctype="multipart/form-data">
				<tr>
					<td>Movie Name</td>
					<td>
						<input type="text" name="title" required>
					</td>
				</tr>
				<tr>
					<td>Release Date</td>
					<td>
						<input type="date" name="r_date" required>
					</td>
				</tr>
				<tr>
					<td>Image Url</td>
					<td>
						<input type="text" name="image_url" required>
					</td>
				</tr>
				<tr>
					<td>Runtime</td>
					<td>
						<input type="number" step="0.01" name="runtime" required>
					</td>
				</tr>
				<tr>
					<td>IMDB Rating</td>
					<td>
						<input type="number" step="0.1" name="imdb_rating" required>
					</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
						<textarea cols="22" name="description" required></textarea>
					</td>
				</tr>
				<tr>
					<td>Certificate</td>
					<td>
						<input type="text" name="certificate" required>
					</td>
				</tr>
				<tr>
					<td>Metascore</td>
					<td>
						<input type="number" step="0.1" name="metascore" required>
					</td>
				</tr>
				<tr>
					<td>Votes</td>
					<td>
						<input type="number" name="votes" required>
					</td>
				</tr>
				<tr>
					<td>Language</td>
					<td>
						<input type="text" name="language" required>
					</td>
				</tr>
				<tr>
					<td>Genre</td>
					<td>
						<input type="text" name="genre" required>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="submit" name="submit" value="ADD" class="btn btn-success" style="margin-right: 75px; width: 150px;">
					</td>
				</tr>
			</form>

		</table>
	</div>


	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>

</html>

<?php

include('../db_connection.php');

if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$r_date = $_POST['r_date'];
	$image_url = $_POST['image_url']; // Assuming you'll save the image URL directly
	$runtime = $_POST['runtime'];
	$imdb_rating = $_POST['imdb_rating'];
	$description = $_POST['description'];
	$certificate = $_POST['certificate'];
	$metascore = $_POST['metascore'];
	$votes = $_POST['votes'];
	$language = $_POST['language'];
	$genre = $_POST['genre'];

	// Insert the data into the movie table
	$query = "INSERT INTO movies (title, r_date, image_url, runtime, imdb_rating, description, certificate, metascore, votes, language, genre) 
              VALUES ('$title', '$r_date', '$image_url', $runtime, $imdb_rating, '$description', '$certificate', $metascore, $votes, '$language', '$genre')";

	$run = mysqli_query($conn, $query);

	if ($run == true) {
?>

		<script type="text/javascript">
			alert("Movie Added Successfully!");
		</script>

<?php
	}
}

?>