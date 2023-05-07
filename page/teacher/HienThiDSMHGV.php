<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Danh Sách Môn học - Giảng Viên</title>
</head>
<body>
	<?php 
		$connect = mysqli_connect("localhost","root","","dangkimonhoc");
		if ($connect->connect_error){
			die("Failed".$connect->connect_error);
		}
		$sql="SELECT * from monhoc_giangvien";
		$tb = mysqli_query($connect,$sql);
		mysqli_close($connect)		
	 ?>
	 <h1 align="center">Danh sách Môn Học - Giảng Viên</h1>
	<form action="" method="post">
		<table border="1" align="center">
			<thead>
				<tr>
					<td><b>Mã môn học</td>
					<td><b>Mã Giảng Viên</td>
					<td><b>Thao tác</td>
				</tr>
			</thead>
			<?php 
			$x = mysqli_num_rows($tb);
			$i=0;
			while($row = mysqli_fetch_array($tb))
			{
				$i++;
				?>
				<tr>
					<td><?php echo $row[0];?></td>
					<td><?php echo $row[1];?></td>
					<td><a href="XoaMHGV.php?mamh=<?php echo $row[0] ?>?and?mgv=<?php echo $row[1] ?>">Xóa</a><a href="SuaMHGV.php?mamh=<?php echo $row[0] ?>">Sửa</a><a href="HienThiDSMHGV.php">Thoat</a></td>
				</tr>
				<?php
			}			
			?>
		</table>
	</form>
</body>
</html>