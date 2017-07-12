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

if (isset($_POST['data'])) {
	$search = $_POST['data'].'%';
	$sql ="SELECT * FROM accmistakes WHERE date LIKE '".$search."'AND mis_id =1";
	$result =mysqli_query($conn,$sql);
	$data =mysqli_num_rows($result);
	$sqli ="SELECT * FROM accmistakes WHERE date LIKE '".$search."'AND mis_id =3";
	$results =mysqli_query($conn,$sqli);
	$datas =mysqli_num_rows($results);

	$sqlii ="SELECT * FROM accmistakes WHERE date LIKE '".$search."'AND mis_id =2";
	$resultss =mysqli_query($conn,$sqlii);
	$datass =mysqli_num_rows($resultss);

	$array =array();
	$array['data'] =$data;
	$array['data2'] =$datas;
	$array['data3'] =$datass;
	echo json_encode($array);
	
}
if (isset($_POST['HR'])) {
	$search = $_POST['HR'].'%';
	$sql ="SELECT * FROM hrmistakes WHERE date LIKE '".$search."'AND mis_id =1";
	$result =mysqli_query($conn,$sql);
	$data =mysqli_num_rows($result);
	$sqls ="SELECT * FROM hrmistakes WHERE date LIKE '".$search."'AND mis_id =2";
	$results =mysqli_query($conn,$sqls);
	$datas =mysqli_num_rows($results);
	$sqlss ="SELECT * FROM hrmistakes WHERE date LIKE '".$search."'AND mis_id =3";
	$resultss=mysqli_query($conn,$sqlss);
	$datass =mysqli_num_rows($resultss);
	$array =array();
	$array['data'] =$data;
	$array['datas']=$datas;
	$array['datass']=$datass;
	
	echo json_encode($array);

}
if (isset($_POST['IT'])) {
	$search = $_POST['IT'].'%';
	$sql ="SELECT * FROM itmistakes WHERE date LIKE '".$search."' ";
	$result =mysqli_query($conn,$sql);
	$data =mysqli_num_rows($result);
	echo $data;
}
if (isset($_POST['EMAIL'])) {
	$search = $_POST['EMAIL'];
	if ($search=='มกราคม') {
		$data =1;
	}elseif ($search=='กุมภาพันธ์') {
		$data =2;
	}elseif($search=='มีนาคม'){
           	$data =3;
           }elseif($search=='เมษายน'){
           	$data =4;
           }elseif($search=='พฤษภาคม'){
           	$data =5;
           }elseif($search=='มิถุนายน'){
           	$data =6;
           }elseif($search=='กรกฎาคม'){
           	$data =7;
           }elseif($search=='สิงหาคม'){
           	$data =8;
           }elseif($search=='กันยายน'){
           	$data =9;
           }elseif($search=='ตุลาคม'){
           	$data =10;
           }elseif($search=='พฤศจิกายน'){
           	$data =11;
           }elseif($search=='ธันวาคม'){
           	$data =12;
           }


	$jeab ="SELECT * FROM sendemails WHERE month_id LIKE '".$data."' AND who =11 ";
	$result =mysqli_query($conn,$jeab);
	$data_jeab =mysqli_num_rows($result);
	

	$meaw ="SELECT * FROM sendemails WHERE month_id LIKE '".$data."' AND who =12";
	$result =mysqli_query($conn,$meaw);
	$data_meaw =mysqli_num_rows($result);
	;

	$ink ="SELECT * FROM sendemails WHERE month_id LIKE '".$data."' AND who =13";
	$result =mysqli_query($conn,$ink);
	$data_ink =mysqli_num_rows($result);

	$sum ="SELECT * FROM sendemails WHERE month_id LIKE '".$data."' ";
	$result =mysqli_query($conn,$sum);
	$data_sum =mysqli_num_rows($result);

	$array =array();
	$array['jeab'] =$data_jeab;
	$array['meaw']=$data_meaw;
	$array['ink']=$data_ink;
	$array['sum']=$data_sum;
	
	echo json_encode($array);
}
if (isset($_POST['BKK'])) {
	$search = $_POST['BKK'].'%';
	$tuapai ="SELECT * FROM outbkkmistakes WHERE date LIKE '".$search."' AND mis_id =1 ";
	$result =mysqli_query($conn,$tuapai);
	$data_tuapai =mysqli_num_rows($result);

	$payroll ="SELECT * FROM outbkkmistakes WHERE date LIKE '".$search."' AND mis_id =2 ";
	$result =mysqli_query($conn,$payroll);
	$data_payroll =mysqli_num_rows($result);

	$fu ="SELECT * FROM outbkkmistakes WHERE date LIKE '".$search."' AND user_id =17 ";
	$result =mysqli_query($conn,$fu);
	$data_fu =mysqli_num_rows($result);

	$pleng ="SELECT * FROM outbkkmistakes WHERE date LIKE '".$search."' AND user_id =15 ";
	$result =mysqli_query($conn,$pleng);
	$data_pleng =mysqli_num_rows($result);


	$may ="SELECT * FROM outbkkmistakes WHERE date LIKE '".$search."' AND user_id =14 ";
	$result =mysqli_query($conn,$may);
	$data_may =mysqli_num_rows($result);


	$lookpad ="SELECT * FROM outbkkmistakes WHERE date LIKE '".$search."' AND user_id =16 ";
	$result =mysqli_query($conn,$lookpad);
	$data_lookpad =mysqli_num_rows($result);
	$array =array();
	$array['tuapai'] =$data_tuapai;
	$array['payroll']=$data_payroll;
	$array['fu']=$data_fu;
	$array['pleng']=$data_pleng;
	$array['may']=$data_may;
	$array['lookpad']=$data_lookpad;
	echo json_encode($array);
	

}	

?>