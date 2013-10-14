<?php
require 'connect.php';

function getStudent($con, $UCID) {
	
	$student = mysqli_query($con, 
	"SELECT * 
	FROM volunteer 
	WHERE UC_ID = $UCID");
	
	$studentArray = mysqli_fetch_array($student, MYSQL_NUM);
	
	return json_encode($studentArray);
	
}

function getAllStudents($con) {
	
	$allStudents = mysqli_query($con, 
	"SELECT * 
	FROM volunteer");
	
	$studentArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($allStudents)){ //fetchs associative array
		$studentArray[$index] = $row;
		$index ++;
	}
	
	return json_encode($studentArray);
}

function getRequest($con, $requestID) {
		
	$request = mysqli_query($con,
             "SELECT * 
             FROM requests
             WHERE requestID = $requestID");
             
	$requestArray = mysqli_fetch_array($request);
	
	return json_encode($requestArray);
    
}

function getRequests($con) {
	
	$requests = mysqli_query($con,
		"SELECT * 
		FROM requests");
		
	$requestsArray = mysqli_fetch_array($requests);
	
	return json_encode($requestsArray)

}
function getExpiredRequests($con) {
 	$request = mysqli_query($con, "SELECT * FROM requests");

	$requestArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($request)){ //fetchs associative array
		if ($row['expirationDate'] < date('Y-m-d')) {
			$requestArray[$index] = $row;
			$index ++;
		}
	}
	return json_encode($requestArray);
}
function getCurrentRequests($con) {
 	$request = mysqli_query($con, "SELECT * FROM requests");
	
	$requestArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($request)){ //fetchs associative array
		if ($row['expirationDate'] >= date('Y-m-d')) {
			$requestArray[$index] = $row;
			$index ++;
		}
	}
	return json_encode($requestArray);
}
function getArchivedRequests($con){
  	$request = mysqli_query($con, "SELECT * FROM requests WHERE archived = 1");
	
	$requestArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($request)){ //fetchs associative array
		$requestArray[$index] = $row;
		$index ++;
	}
	return json_encode($requestArray);
}
function getAssignment($con, $assignID) {
	$result = mysqli_query($con,"SELECT * FROM assignments WHERE assignmentID = $assignID");
	$assignment = mysqli_fetch_array($result);
	return json_encode($assignment);
}
function getAssignments($con){
	$sql="SELECT * FROM assignments"
	$result = mysqli_query($con,$sql);
	//echo $result;

	$assignmnetArray = mysqli_fetch_array($result, MYSQL_NUM);
	return json_encode($assignmnetArray);
		
}
function getRequestAssignments($con, $requestID) {
	$result = mysqli_query($con,"SELECT * FROM assignments WHERE requestID = $requestID");
	
	$assignArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){ //fetchs associative array
		$assignArray[$index] = $row;
		$index ++;
	}
	return json_encode($assignArray);
}
function getStudentAssignments($con, $studentID) {
	$result = mysqli_query($con,"SELECT * FROM assignments WHERE volunteerID = $studentID");
	
	$assignArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){ //fetchs associative array
		$assignArray[$index] = $row;
		$index ++;
	}
	return json_encode($assignArray);
}
function getExpiredAssignments($con) {
	$result = mysqli_query($con,"SELECT * FROM assignments");
	
	$assignArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){ //fetchs associative array
		if ($row['expirationDate'] < date('Y-m-d')) {
			$assignArray[$index] = $row;
			$index ++;
		}
	}
	return json_encode($assignArray);
}
function getCurrentAssignments($con) {
	$result = mysqli_query($con,"SELECT * FROM assignments");
	
	$assignArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){ //fetchs associative array
		if ($row['expirationDate'] >= date('Y-m-d')) {
			$assignArray[$index] = $row;
			$index ++;
		}
	}
	return json_encode($assignArray);
}
function getArchivedAssignments($con) {
	$result = mysqli_query($con,"SELECT * FROM assignments WHERE archived = 1");
	
	$assignArray = array();
	
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){ //fetchs associative array
		$assignArray[$index] = $row;
		$index ++;
	}
	return json_encode($assignArray);
}

function getRecommended(){

}

//getAssignment('$_POST[volunteerID]','$_POST[requestID]');

?>
