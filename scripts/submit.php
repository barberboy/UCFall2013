<?php
require 'connect.php';

function addRequest($con, $firstName, $lastName, $street, $city, $state, $zip, $email, $phone, $category, $description) {
	$sql ="INSERT INTO requests (firstName, lastName, street, city, state, zip, email, phone, category, description)
				VALUES ('$firstName', '$lastName', '$street', '$city', '$state', '$zip', '$email', '$phone', '$category', '$description')";
	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	//echo "1 record added\n";
	//echo "submit the data\n";
}
function addStudent($con, $firstName, $lastName, $ucID, $email, $phone, $password) {
	$sql ="INSERT INTO volunteer (firstName, lastName, ucID, email, phone, password)
				VALUES ('$firstName', '$lastName', '$ucID', '$email', '$phone', '$password')";
	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
}
function addAssignment() {
  //it doesn't work yet
}
function archive() {

}
function removeRequest() {

}
function archiveRequest() {

}
function unArchiveRequest() {

}

$con = connect();
addRequest($con, "Nathan", "Bland", "3800 s. 48th str.", "Lincoln", "NE", 68506, "nathan.bland@gmail.com", 7203417006, 1, "Basic request for category one work, no idea what that is yet.");
disconnect($con);
?>
