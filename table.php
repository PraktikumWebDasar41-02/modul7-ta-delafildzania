<?php
require 'function.php';
$mahasiswa=query("SELECT * FROM t_jurnal8");
?> 
<a href="input.php"><button>INPUT</button></a>
<form method="post">
<table border="1" cellpadding="10" cellspacing="0">
<tr>
	<td colspan="9"><input type="text" name="nim" placeholder="Cari NIM">
		<input type="submit" name="cari" value="Cari">
		<?php
		if (isset($_POST['cari'])){
			$nim = $_POST['nim'];
			$cari= "SELECT nim, nama, prodi FROM t_jurnal8 WHERE nim = '$nim'";
			$que=mysqli_query($konek, $cari);
			}
				?>
		
	
	</td>
</tr>
	<tr>
		<th>NIM</th>
		<th>Nama</th>
		<th>Tanggal</th>
		<th>Jenis Kelamin</th>
		<th>Prodi</th>
		<th>Fakultas</th>
		<th>Asal</th>
		<th>Moto Hidup</th>
		<th>Aksi</th>
	</tr>
	<?php foreach($mahasiswa as $row ) :?>
	<tr>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["tgl"]; ?></td>
		<td><?= $row["jk"]; ?></td>
		<td><?= $row["prodi"]; ?></td>
		<td><?= $row["fakultas"]; ?></td>
		<td><?= $row["asal"]; ?></td>
		<td><?= $row["moto"]; ?></td>
		
		<td>
			<?php echo "<a href=hapus.php?id=".$row["nim"].">Hapus</a>"; ?> |
			<?php echo "<a href=edit.php?id=".$row["nim"]."
			>Edit</a>"; ?>

		</td>
	</tr>
<?php endforeach; ?>
</table>
</form>

<?php
if(mysqli_affected_rows($konek) >0){
		echo"berhasil ditambahkan";
}else{
		echo "gagal ditambahkan";
		echo "<br>";
		echo mysqli_error($konek);
	}
?>