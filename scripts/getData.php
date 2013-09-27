<?php
require 'connect.php';
function getAssignments($con){
	$sql="SELECT * FROM assignments"
	$result = mysqli_query($con,$sql);
	echo $result;
	return $result;
}

?>
