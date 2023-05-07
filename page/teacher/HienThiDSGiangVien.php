<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>DanhsachSV</title>
</head>
<body>
	<?php 
		$connect = mysqli_connect("localhost","root","","dangkimonhoc");
		if ($connect->connect_error){
			die("Failed".$connect->connect_error);
		}
		$sql="SELECT * from giangvien";
		$tb = mysqli_query($connect,$sql);
		mysqli_close($connect)		
	 ?>
	 <h1 align="center">Danh sách Giảng Viên</h1>
	<form action="" method="post">
		<table border="1" align="center">
			<thead>
				<tr>
					<td><b>MSGV</td>
					<td><b>Họ tên</td>
					<td><b>Học vị</td>
					<td><b>Chuyên môn</td>
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
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[3];?></td>
					<td><a href="XoaGV.php?msgv=<?php echo $row[0] ?>">Xóa</a><a href="SuaGV.php?msgv=<?php echo $row[0] ?>">Sửa</a><a href="HienThiDSGiangVien.php">Thoat</a></td>
				</tr>
				<?php
			}			
			?>
		</table>
	</form>
</body>
</html>