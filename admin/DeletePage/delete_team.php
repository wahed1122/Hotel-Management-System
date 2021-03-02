<?php 
	session_start();
	include('../db.php');
?>

<?php 
	//get id from manage galary page 
	$delete_id = $_GET['id'];
	//sql query 
	$sql = "DELETE FROM `team` WHERE `team_id`='$delete_id'";
	//execute the query
	$result = mysqli_query($con,$sql);
	if ($result) {
		echo '<script>alert("Delete team successfully") </script>' ;
        echo "<script>window.open('../manage_team.php','_self')</script>";
	}
?>