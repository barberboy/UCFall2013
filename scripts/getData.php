<?php
require 'connect.php';

function getStudent($con, $UCID) {
	
	$student = mysqli_query($con, 
	"SELECT * 
	FROM volunteer 
	WHERE UC_ID = $UCID");
	
	$studentArray = mysql_fetch_array($student, MYSQL_NUM);
	
	return json_encode($studentArray);
	
}

function getAllStudents($con) {
	
	$allStudents = mysqli_query($con, 
	"SELECT * 
	FROM volunteer");
	
	$studentArray = array();
	
	$index = 0;
	while($row = mysql_fetch_assoc($allStudents)){ //fetchs associative array
		$studentArray[$index] = $row;
		$index ++;
	}
	
	return json_encode($studentArray);
}

function getRequest() {
}

function getRequests() {
}

function getAssignment($con, $requestID, $volunteerID)
{
	$result = mysqli_query($con,"SELECT * FROM assignments");
	while($row = mysqli_fetch_array($result)) {
		if ($requestID == $row['requestID'] && $volunteerID == $row['volunteerID']) {
 		$assignID = $row['assignmentID'];
  		}
	}
	return $assignID;
}

function getAssignments($con){
	$sql="SELECT * FROM assignments"
	$result = mysqli_query($con,$sql);
	echo $result;
	return $result;
}

function getRequestAssignments($ID) {

}

function getRecommended(){

}

//getAssignment('$_POST[volunteerID]','$_POST[requestID]');

?>
