<?php 
$connect = mysqli_connect("localhost","root","","dangkimonhoc");
$mamh = $_GET['mamh'];
$msgv = $_GET['msgv'];
$sql = "DELETE FROM monhoc_giangvien WHERE mamh='$mamh' AND msgv='$msgv'";

if (mysqli_query($connect, $sql))
{
	header('location:HienThiDSMHGV.php');
}
else {
	echo "Xóa không thành!". $sql . "<br>" . $connect->error;
}
mysqli_close($connect);
 ?>