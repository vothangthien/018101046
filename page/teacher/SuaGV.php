<?php

$connect = mysqli_connect("localhost","root","","dangkimonhoc");
$msgv = $_GET['msgv'];

if (isset($_POST['sua'])) 
{
$msgv = trim($_POST['msgv']);
$hoten = trim($_POST['hoten']);
$hocvi = trim($_POST['hocvi']);
$chuyenmon = trim($_POST['chuyenmon']);
$sql = "UPDATE giangvien SET  hoten= '$hoten', hocvi= '$hocvi', chuyenmon= '$chuyenmon' WHERE msgv = $msgv";
if (mysqli_query($connect,$sql))
{
    echo '<script>alert("Sua Thành Công")</script>';
    header("refresh:0;url=HienThiDSGiangVien.php");
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
			<tr>
				<td colspan="2" align="center"><input type="submit" name="sua" value="Sua"></td>
			</tr>

		</table>
		
	</form>
</body>
</html>