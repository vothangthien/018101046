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
$tenmh = trim($_POST['tenmh']);
$sotc = trim($_POST['sotc']);
$magv = trim($_POST['magv']);
$malop = trim($_POST['malop']);

$sql="SELECT * FROM monhoc WHERE mamh= '$mamh'";
$sql1 = "INSERT INTO monhoc (mamh, tenmh, sotc, magv, malop) VALUES ('$mamh', '$tenmh','$sotc','$magv', '$malop')";
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
else if ($tenmh =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}	
else if ($sotc =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}	
else if ($magv =="")
{
	echo "Thieu thong tin!" . $sql1 . "<br>" . $connect->error;
	exit();
}
else if ($malop =="")
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
	<title>Thêm Môn Học</title>
</head>
<body>
	<form action="" method="post">
		<table border="1" align="center">
			<tr align="center">
				<td colspan="2">Thêm</td>
			</tr>	
			<tr>
				<td>Mã Môn học :</td>
				<td><input type="text" id="mamh" name="mamh"></td>
			</tr>
			<tr>
				<td>Tên Môn học :</td>
				<td><input type="text" id="tenmh" name="tenmh"></td>
			</tr>
			<tr>
				<td>Số tín chỉ :</td>
				<td><input type="text" id="sotc" name="sotc"></td>
			</tr>
			<tr align="center">
				<td colspan="2"><input type="submit" name="them" value="Thêm"><a href="HienThiDSSinhVien.php"><input type="submit" name="Quaylai" value="Quay lai"></a></td>
			</tr>

		</table>
		
	</form>
</body>
</html>