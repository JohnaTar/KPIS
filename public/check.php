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

if (isset($_POST['user_id'])) {

	$sql ="DELETE FROM users WHERE id='".$_POST['user_id']."'";
	$res =mysqli_query($conn,$sql);
	if ($res) {
		echo "ลบข้อมูลเรียบร้อย";
	}else{
		echo "ไม่สามารถลบข้อมูลได้";
	}
	
}
?>