<?php
session_start();

$konek= mysqli_connect('localhost','root','','d_modul8');

?>
<center><H1>FORM EDIT DATA MAHASISWA</H1></center>
<form method="post">
<table border="0">
	
		<td>NIM :</td>
		<td><input type="text" name="nim" value="<?php $sql['nim'] ?>"></td>
	</tr>
	<tr>
		<td>Nama :</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>Tanggal : </td>
		<td><input type="date" name="tgl"></td>

	</tr>
	<tr>
		<td>Jenis Kelamin : </td>
		<td><select name="jk" >
				<option value="laki">Laki-Laki</option>
				<option value="perempuan">Perempuan</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Prodi : </td>
		<td><select name="prodi">
				<option value="Manajemen_Informatika">Manajemen Informatika</option>
				<option value="Manajemen_Pemasaran">Manajemen Pemasaran</option>
				<option value="Teknik_Komputer">Teknik Komputer</option>
				<option value="Teknik_Informatika">Teknik Informatika</option>
				<option value="Teknik_Telekomunikasi">Teknik Telekomunikasi</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Fakultas : </td>
		<td><input type="radio" name="fakultas" value="fit" checked="checked">FIT
			<input type="radio" name="fakultas" value="feb">FEB
			<input type="radio" name="fakultas" value="fkb">FKB
			<input type="radio" name="fakultas" value="fif">FIF				
		</td>
	</tr>
	<tr>
		<td>Asal : </td>
		<td><input type="text" name="asal"></td>
	</tr>
	<tr>
		<tr>
		<td>Moto Hidup : </td>
		<td><textarea rows="2" cols="10" name="moto">

			</textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="edit" value="Edit"></td>
	</tr>
</table>




<?php

if(isset($_POST['edit'])){
$nim=$_POST['nim'];
$nama= $_POST['nama'];
$tgl=$_POST['tgl'];
$jk=$_POST['jk'];
$prodi=$_POST['prodi'];
$fakultas=$_POST['fakultas'];
$asal=$_POST['asal'];
$moto=$_POST['moto'];
$nim=$_GET['id'];
$panjangnim=strlen($_POST['nim']);
$panjangnama=strlen($_POST['nama']);
$cek=true;
	if(empty($nim)) {
		echo"nim harus diisi !!<br>";
		$cek=false;
	}else if($panjangnim>10){
		echo"nim max 10 digit !!<br>";
		$cek=false;
	}else if(!is_numeric($nim)){
		echo "nim harus angka!!<br>";
		$cek=false;
	}

	if(empty($nama)) {
		echo"nama harus diisi !!<br>";
		$cek=false;
	}else if($panjangnama>35){
		echo"nama max 35 digit!!<br>";
		$cek=false;
	}else if(is_numeric($nama)){
		echo"nama harus huruf!!<br>";
		$cek=false;
	}

	if($cek==true){

	$konek= mysqli_connect('localhost','root','','d_modul8');
	$nim = $_SESSION['nim'];
	$query = mysqli_query($konek, "SELECT * FROM t_jurnal6 WHERE nim = '$nim'");
	$sql = "UPDATE t_jurnal8 SET (
			nim='$nim' , nama='$nama' , tgl='$tgl',jk='$jk', prodi='$prodi', fakultas='$fakultas', asal='$asal', moto='$moto'
			) WHERE `t_jurnal8`.`nim` = '$nim'";
	if(mysqli_query($konek , $sql)){
		header("Location: table.php");
		echo"berhasil";
		$konek->close();
	}else{
		echo"gagal";
	}

	
	header("Location: table.php");
	}else{
		echo "Gagal di edit!!";
	}
}

	
?>