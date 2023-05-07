<?php 
$connect = mysqli_connect("localhost","root","","dangkimonhoc");
$msgv = $_GET['msgv'];
$sql = "DELETE FROM sinhvien WHERE mssv='$msgv'";

if (mysqli_query($connect, $sql))
{
	header('location:HienThiDSGiangVien.php');
}
else {
	echo "Xóa không thành!". $sql . "<br>" . $connect->error;
}
mysqli_close($connect);
 ?>