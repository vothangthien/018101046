<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
$connect = mysqli_connect("localhost","root","","dangkimonhoc");
if (isset($_POST['Quaylai']))
{
	header("refresh:0;url=HienThiDSGiangVien.php");
}
if (isset($_POST['them'])) 
{
$msgv = trim($_POST['msgv']);
$hoten = trim($_POST['hoten']);
$hocvi = trim($_POST['hocvi']);
$chuyenmon = trim($_POST['chuyenmon']);
$sql="SELECT * FROM giangvien WHERE msgv= '$msgv'";
$sql1 = "INSERT INTO giangvien (msgv, hoten, hocvi, chuyenmon) VALUES ('$msgv', '$hoten','$hocvi','$chuyenmon')";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result)>0)
{
	echo "Tài khoản này đã tồn tại!". $sql . "<br>" . $connect->error;
	exit;
}
else if ($msgv =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}	
else if ($hoten =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}	
else if ($hocvi =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}	
else if ($chuyenmon =="")
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
	<title>Thêm Giảng Viên</title>
</head>
<body>
	<form action="" method="post">
		<table border="1" align="center">
			<tr align="center">
				<td colspan="2">Thêm</td>
			</tr>	
			<tr>
				<td>MSGV :</td>
				<td><input type="text" id="msgv" name="msgv"></td>
			</tr>
			<tr>
				<td>Họ và tên :</td>
				<td><input type="text" id="hoten" name="hoten"></td>
			</tr>
			<tr>
				<td>Học vị :</td>
				<td><input type="text" id="hocvi" name="hocvi"></td>
			</tr>
			<tr>
				<td>Chuyên môn :</td>
				<td><input type="text" id="chuyenmon" name="chuyenmon"></td>
			</tr>
			
			<tr align="center">
				<td colspan="2"><input type="submit" name="them" value="Thêm"><a href="HienThiDSSinhVien.php"><input type="submit" name="Quaylai" value="Quay lai"></a></td>
			</tr>

		</table>
		
	</form>
</body>
</html>