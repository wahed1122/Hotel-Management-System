<?php 
	session_start();
	include('../db.php');
?>

<?php 
	//get id from manage galary page 
	$delete_id = $_GET['id'];
	//sql query 
	$sql = "DELETE FROM `galary` WHERE `galary_id`='$delete_id'";
	//execute the query
	$result = mysqli_query($con,$sql);
	if ($result) {
		echo '<script>alert("Galary Image Successfully Delete") </script>' ;
        echo "<script>window.open('../manage_galary.php','_self')</script>";
	}
?>