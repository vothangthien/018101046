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
$mssv = trim($_POST['mssv']);
$hoten = trim($_POST['hoten']);
$gioitinh = trim($_POST['gioitinh']);
$ngaysinh = trim($_POST['ngaysinh']);
if(isset($_POST["gioitinh"])){
        $gioitinh = true;
    }  else {
        $gioitinh = false;
    }
$sql="SELECT * FROM sinhvien WHERE mssv= '$mssv'";
$sql1 = "INSERT INTO sinhvien (mssv, hoten, gioitinh, ngaysinh) VALUES ('$mssv', '$hoten','$gioitinh','$ngaysinh')";
$result = mysqli_query($connect,$sql);
if (mysqli_num_rows($result)>0)
{
	echo "Tài khoản này đã tồn tại!". $sql . "<br>" . $connect->error;
	exit;
}
else if ($mssv =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}	
else if ($hoten =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}	
else if ($gioitinh =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}	
else if ($ngaysinh =="")
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
	<title>Thêm Sinh Viên</title>
</head>
<body>
	<form action="" method="post">
		<table border="1" align="center">
			<tr align="center">
				<td colspan="2">Thêm</td>
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
			
			<tr align="center">
				<td colspan="2"><input type="submit" name="them" value="Thêm"><a href="HienThiDSSinhVien.php"><input type="submit" name="Quaylai" value="Quay lai"></a></td>
			</tr>

		</table>
		
	</form>
</body>
</html>