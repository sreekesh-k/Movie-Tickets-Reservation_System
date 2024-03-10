<?php
include('../db_connection.php');

$movieid = $_POST['movieid'];
$title = $_POST['title'];
$r_date = $_POST['r_date'];
$image_url = $_POST['image_url'];
$runtime = $_POST['runtime'];
$imdb_rating = $_POST['imdb_rating'];
$description = $_POST['description'];
$certificate = $_POST['certificate'];
$metascore = $_POST['metascore'];
$votes = $_POST['votes'];
$language = $_POST['language'];
$genre = $_POST['genre'];

$query = "UPDATE `movies` SET `title`='$title', `r_date`='$r_date', `image_url`='$image_url', `runtime`='$runtime', `imdb_rating`='$imdb_rating', `description`='$description', `certificate`='$certificate', `metascore`='$metascore', `votes`='$votes', `language`='$language', `genre`='$genre' WHERE `movieid` = '$movieid'";

$run = mysqli_query($conn, $query);


if ($run == true) {
?>
	<script type="text/javascript">
		alert("Data updated Successfully!");
		window.open('updatemovie1.php?movieid=<?php echo $movieid; ?>', '_self');
	</script>
<?php
}
?>