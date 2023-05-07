<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
$connect = mysqli_connect("localhost","root","","dangkimonhoc");
if (isset($_POST['Quaylai']))
{
	header("refresh:0;url=HienThiDSSinhVien.php");
}
if (isset($_POST['them'])) 
{
$mamh = trim($_POST['mamh']);
$msgv = trim($_POST['msgv']);

$sql="SELECT * FROM monhoc_giangvien WHERE mamh= '$mamh' and msgv = '$msgv'";
$sql1 = "INSERT INTO monhoc_giangvien (mamh, msgv) VALUES ('$mamh', '$msgv')";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result)>0)
{
	echo "Tài khoản này đã tồn tại!". $sql . "<br>" . $connect->error;
	exit;
}
else if ($mamh =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}	
else if ($msgv =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}			
else
{
	if (mysqli_query($connect,$sql1))
	{
        echo '<script>alert("Thêm Thành Công")</script>';
        header("refresh:0;url=HienThiDSSinhVien.php");
        exit();
    } else {
        echo "Error: " . $sql1 . "<br>" . $connect->error;   
	}
}
$connect->close();
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Thêm Môn Học - Giảng Viên</title>
</head>
<body>
	<form action="" method="post">
		<table border="1" align="center">
			<tr align="center">
				<td colspan="2">Thêm Môn học - Giảng Viên</td>
			</tr>	
			<tr>
				<td>Mã Môn học :</td>
				<td><input type="text" id="mamh" name="mamh"></td>
			</tr>
			<tr>
				<td>Mã Số Giảng Viên :</td>
				<td><input type="text" id="msgv" name="msgv"></td>
			</tr>
			
			<tr align="center">
				<td colspan="2"><input type="submit" name="them" value="Thêm"><a href="HienThiDSSinhVien.php"><input type="submit" name="Quaylai" value="Quay lai"></a></td>
			</tr>

		</table>
		
	</form>
</body>
</html>