<?php

$connect = mysqli_connect("localhost","root","","dangkimonhoc");
$mssv = $_GET['mssv'];

if (isset($_POST['sua'])) 
{
$mssv = trim($_POST['mssv']);
$hoten = trim($_POST['hoten']);
$gioitinh = trim($_POST['gioitinh']);
$ngaysinh = trim($_POST['ngaysinh']);
$sql = "UPDATE sinhvien SET  hoten= '$hoten', gioitinh= '$gioitinh', ngaysinh= '$ngaysinh' WHERE mssv = $mssv";
if (mysqli_query($connect,$sql))
{
    echo '<script>alert("Sua Thành Công")</script>';
    header("refresh:0;url=HienThiDSSinhVien.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;   
}
$connect->close();
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Sua</title>
</head>
<body>
	<form action="" method="post">
		<table border="1" align="center">
			<tr align="center">
				<td colspan="2">Sua</td>
			</tr>	
			
			<tr>
				<td>MSSV :</td>
				<td><input type="text" id="mssv" name="mssv"></td>
			</tr>
			<tr>
				<td>Họ và tên :</td>
				<td><input type="text" id="hoten" name="hoten"></td>
			</tr>
			<tr>
				<td>Giới tính :</td>
				<td><input type="radio" name="gioitinh" value="Nam">Nam<input type="radio" name="gioitinh" value="Nu">Nu</td>
			</tr>
			<tr>
				<td>Ngày sinh :</td>
				<td><input type="date" id="ngaysinh" name="ngaysinh"></td>
			</tr>
			
			<tr>
				<td colspan="2" align="center"><input type="submit" name="sua" value="Sua"></td>
			</tr>

		</table>
		
	</form>
</body>
</html>