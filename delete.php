<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "muhammadrafli_universitas";

	$conn = new mysqli ($servername, $username, $password, $dbname);

	if($conn->connect_error){
		die("CONNECTION FAILED" . $conn->connect_error);
	}else{
		echo "CONNECTION BERHASIL" . "<br>";
	}

	$hapus = $_POST['hapus'];

	$sql = "DELETE FROM mahasiswa WHERE nama = ('$hapus') ";

	if($conn->query($sql) === true){
		if ($conn->affected_rows > 0) {
			echo $conn->affected_rows . " Affected rows" . "<br>" . "Delete succes";
	}else{
		echo "tidak ada yang didelete";

	}
	}else{
		echo "ERROR " . $sql . "<br>" . $conn->error;
	}

$sql = "SELECT * FROM mahasiswa";
$hasil = $conn->query($sql);
echo "<br>"
 ?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>DATABASE MAHASISWA</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 </head>
 <body>
 	<?php if($hasil->num_rows > 0) : ?>
 		<?php echo $hasil->num_rows . " rows in set"; ?>
 		<table class="table-danger table-bordered">
    		<tr>
      			<th scope="col">ID</th>
      			<th scope="col">NAMA</th>
      			<th scope="col">IP</th>
      			<th scope="col">ID_PRODI</th>
    		</tr>
    		<?php while($row = $hasil->fetch_assoc()) : ?>
    		<tr>
    			<td><?php echo $row['id_mhs'];  ?></td>
    			<td><?php echo $row['Nama'];  ?></td>
    			<td><?php echo $row['Ip'];  ?></td>
    			<td><?php echo $row['id_prodi'];  ?></td>
    		</tr>
    	<?php endwhile; ?>
    	</table>
    	<?php else : ?>
    		<p>DATA TIDAK ADA</p>
    	<?php endif; ?>
</html>