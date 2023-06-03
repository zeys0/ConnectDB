<?php 

$sarvername = "localhost";
$username = "root";
$password = "";
$dbname = "muhammadrafli_universitas";
 
 $koneksi = new mysqli ($sarvername, $username, $password, $dbname);

 if ($koneksi->connect_error) {
 	die("CONNECTON FAILED" . $koneksi->connect_error);
 }else{
 	echo "CONNECTION SUCCES" . "<br>";
 }

 $id= $_POST['id'];
 $nama= $_POST['nama'];
 $ip= $_POST['ip'];
 $id_prodi= $_POST['id_prodi'];

 $sql = "INSERT INTO mahasiswa (id_mhs, Nama, Ip, id_prodi) VALUES ('$id', '$nama', '$ip', '$id_prodi')";

 if ($koneksi->query($sql) === true) {
 	echo "TAMBAH DATA BERHASIL";
 }else{
 	echo "FAILED " . $sql . "<br>" . $koneksi->error;
 }

 $sql = "SELECT * FROM mahasiswa";
 $result = $koneksi->query($sql);
 
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>DATABASE MAHASISWA</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 </head>
 <body>
 	<?php if($result->num_rows > 0) : ?>
 		<?php echo $result->num_rows . "Rows in set" ?>
 		<table class="table-danger table-bordered">
    		<tr>
      		<th scope="col">ID</th>
      		<th scope="col">NAMA</th>
      		<th scope="col">IP</th>
      		<th scope="col">ID_PRODI</th>
    		</tr>
 	<?php while ($row = $result->fetch_assoc()) : ?>
 			<tr>
 				<td><?php echo $row['id_mhs'] ; ?></td>
 				<td><?php echo $row['Nama'] ; ?></td>
 				<td><?php echo $row['Ip'] ; ?></td>
 				<td><?php echo $row['id_prodi'] ; ?></td>
 			</tr>
 		<?php endwhile;  ?>
 		</table>
 		<?php else : ?>
 			<p><b>DATA TIDAK ADA</b></p>
 		<?php endif; ?>
 </body>
 </html>

 <?php  
 	$koneksi->close();
 ?>