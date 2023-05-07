<?php 
$connect = mysqli_connect("localhost","root","","dangkimonhoc");
$mamh = $_GET['mamh'];
$sql = "DELETE FROM monhoc WHERE mamh='$mamh'";

if (mysqli_query($connect, $sql))
{
	header('location:HienThiDSMonHoc.php');
}
else {
	echo "Xóa không thành!". $sql . "<br>" . $connect->error;
}
mysqli_close($connect);
 ?>