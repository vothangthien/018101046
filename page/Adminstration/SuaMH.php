<?php

$connect = mysqli_connect("localhost","root","","dangkimonhoc");
$mamh = $_GET['mamh'];

if (isset($_POST['sua'])) 
{
$mamh = trim($_POST['mamh']);
$tenmh = trim($_POST['tenmh']);
$sotc = trim($_POST['sotc']);
$magv = trim($_POST['magv']);
$malop = trim($_POST['malop']);
$sql = "UPDATE monhoc SET  tenmh= '$tenmh', sotc= '$sotc', magv= '$magv', malop = '$malop' WHERE mamh = $mamh";
if (mysqli_query($connect,$sql))
{
    echo '<script>alert("Sua Thành Công")</script>';
    header("refresh:0;url=HienThiDSMonHoc.php");
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
			<tr>
				<td colspan="2" align="center"><input type="submit" name="sua" value="Sua"></td>
			</tr>

		</table>
		
	</form>
</body>
</html>