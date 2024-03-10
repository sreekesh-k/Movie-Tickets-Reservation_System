<?php
include('../db_connection.php');

$movieid = $_GET['movieid'];

$query = "SELECT * FROM `movies` WHERE `movieid` = $movieid";
$run = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Update Movie Details</title>
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
		<a href="logout.php"><button style="float: right;" class="btn btn-danger mr-3">LOGOUT</button></a>
		<a href="admindash.php"><button style="float: left;" class="btn btn-success ml-3">
				<< BACK</button></a>
		<h1>WELCOME TO ADMIN DASHBOARD</h1>
	</div>

	<div class="text-light abc">
		<div class="text-center mt-5 pt-5">
			<h1>UPDATE MOVIE DETAILS</h1>
		</div>

		<table align="center" style="margin-top: 50px; margin-right: 400px;" cellpadding="3">
			<form action="updatemovie2.php" method="post" enctype="multipart/form-data">
				<tr>
					<td>Movie ID</td>
					<td>
						<input type="text" name="movieid" value="<?php echo $data['movieid']; ?>" disabled>
					</td>
				</tr>
				<tr>
					<td>Movie Title</td>
					<td>
						<input type="text" name="title" value="<?php echo $data['title']; ?>" required>
					</td>
				</tr>
				<tr>
					<td>Release Date</td>
					<td>
						<input type="date" name="r_date" value="<?php echo $data['r_date']; ?>" required>
					</td>
				</tr>
				<tr>
					<td>Image URL</td>
					<td>
						<input type="text" name="image_url" value="<?php echo $data['image_url']; ?>" required>
					</td>
				</tr>
				<tr>
					<td>Runtime (in hours)</td>
					<td>
						<input type="number" name="runtime" value="<?php echo $data['runtime']; ?>" step="0.01" required>
					</td>
				</tr>
				<tr>
					<td>IMDB Rating</td>
					<td>
						<input type="number" name="imdb_rating" value="<?php echo $data['imdb_rating']; ?>" step="0.1" required>
					</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
						<textarea name="description" required><?php echo $data['description']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td>Certificate</td>
					<td>
						<input type="text" name="certificate" value="<?php echo $data['certificate']; ?>" maxlength="5" required>
					</td>
				</tr>
				<tr>
					<td>Metascore</td>
					<td>
						<input type="number" name="metascore" value="<?php echo $data['metascore']; ?>" step="0.1" required>
					</td>
				</tr>
				<tr>
					<td>Votes</td>
					<td>
						<input type="number" name="votes" value="<?php echo $data['votes']; ?>" required>
					</td>
				</tr>
				<tr>
					<td>Language</td>
					<td>
						<input type="text" name="language" value="<?php echo $data['language']; ?>" maxlength="20" required>
					</td>
				</tr>
				<tr>
					<td>Genre</td>
					<td>
						<input type="text" name="genre" value="<?php echo $data['genre']; ?>" maxlength="10" required>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="submit" name="submit" value="UPDATE" class="btn btn-success" style="margin-right: 75px; width: 150px;">
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