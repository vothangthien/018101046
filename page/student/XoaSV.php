<?php 
$connect = mysqli_connect("localhost","root","","dangkimonhoc");
$mssv = $_GET['mssv'];
$sql = "DELETE FROM sinhvien WHERE mssv='$mssv'";

if (mysqli_query($connect, $sql))
{
	echo '<script>alert("Bạn có muốn xóa sinh viên này không")</script>';
	header('location:HienThiDSSinhVien.php');
}
else {
	echo "Xóa không thành!". $sql . "<br>" . $connect->error;
}
mysqli_close($connect);
 ?>