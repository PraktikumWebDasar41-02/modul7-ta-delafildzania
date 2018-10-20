<center><H1>FORM INPUT MAHASISWA</H1></center>
<form method="post">
<table border="0">
	
		<td><label for="nim">NIM :</label></td>
		<td><input type="text" name="nim" id="nim" required></td>
	</tr>
	<tr>
		<td><label for="nama">Nama :</label></td>
		<td><input type="text" name="nama" id="nama" required></td>
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
		<td><label for="asal">Asal : </label></td>
		<td><input type="text" name="asal" id="asal"></td>
	</tr>
	<tr>
		<tr>
		<td><label for="moto">Moto Hidup : </label></td>
		<td><textarea rows="2" cols="10" name="moto" id="moto">

			</textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button type="submit" name="submit">Submit</button></td>
	</tr>
</table>


<?php
session_start();
if(isset($_POST['submit'])){
$nim=$_POST['nim'];
$nama= $_POST['nama'];
$tgl=$_POST['tgl'];
$jk=$_POST['jk'];
$prodi=$_POST['prodi'];
$fakultas=$_POST['fakultas'];
$asal=$_POST['asal'];
$moto=$_POST['moto'];

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
	$sql = "INSERT INTO t_jurnal8 VALUES (
			'$nim' , '$nama' , '$tgl','$jk', '$prodi', '$fakultas', '$asal', '$moto'
			)";
	if(mysqli_query($konek , $sql)){
		header("Location: table.php");
		echo"berhasil";
		$konek->close();
	}else{
		echo"gagal";
	}
	
	}else{
		echo"gagal diinput";
	}
	
}

	

 
?>