<?php
$servername = "localhost";
$username = "root";
$password = "445566";
$dbname ="KPIs";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['who_delete'])) {

	var_dump($_POST['delete_id']);
	{{ Auth::user()->name }}
	/*$sql ="SELECT name FROM users WHERE id='".$_POST['delete_user']."' ";
	$result =mysqli_query($conn,$sql);
	if ($result) {
		$row =mysqli_fetch_array($result,MYSQLI_ASSOC);
		$data= $row['name'];*/

	}

	

	/*$sql ="DELETE FROM users WHERE id='".$_POST['user_id']."'";
	$res =mysqli_query($conn,$sql);
	if ($res) {
		echo "ลบข้อมูลเรียบร้อย";
	}else{
		echo "ไม่สามารถลบข้อมูลได้";
	}*/
	

?>