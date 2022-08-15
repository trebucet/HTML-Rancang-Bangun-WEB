<?php
session_start();
$host = "localhost";
$user = "root";
$pass = ""; 
$dbName = "db_webakademis_php";
mysql_connect($host, $user, $pass);
mysql_select_db($dbName)
or die ("Connect Failed !! :".mysql_error());

if ( !isset($_SESSION['logged-in']) || $_SESSION['logged-in'] !== true) {

header('Location: index.php');

exit;

} else {

$NIM_MHS = mysql_real_escape_string($_GET['NIM_MHS']); //get the no which will updated
$ID_MATKUL = mysql_real_escape_string($_GET['ID_MATKUL']);
$query = "SELECT * FROM nilai where NIM_MHS='$NIM_MHS' AND ID_MATKUL='$ID_MATKUL'"; //get the data that will be updated
$hasil= mysql_query($query);
$data = mysql_fetch_array($hasil);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="admin_homepage.php"><img src = "css/images/STMIKKianSantang2.png"></a></h1>
			<div id="top-navigation">
				<strong>
				<?php
				echo "Welcome, ".$_SESSION['USERNAME']."";?>
				</strong><span>|</span>
				<a href="logout.php">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="admin_homepage.php"><span>Home</span></a></li>
			    <li><a href="insert.php"><span>Insert</span></a></li>
			    <li><a href="edit.php"  class="active"><span>Edit</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
				<div class="box-head">
						<h2>Update Nilai</h2>
					</div>
					<!-- End Box Head -->
					<br><br>
					<form name='Update' method = 'post' action='UpdateTabelNilai.php'>
						
						<!-- Form -->
						<div class="form">
							<center>
							<table border="0">
							<tr>
										<td width="200px"><p align="left"><label>NIM MAHASISWA : </label></p></td>
										<td><input name="NIM_MHS" type="text" disabled='disable' value="<?php echo $data['NIM_MHS']?>" class="field size1" ></td>
									
							</tr>
							<tr>
										<td width="200px"><p align="left"><label>ID MATA KULIAH : </label></p></td>
										<td><input name="ID_MATKUL" type="text" disabled='disable'value="<?php echo $data['ID_MATKUL']?>" class="field size1" ></td>
									
							</tr>
							<tr>
										<td width="100px"><p align="left"><label>NILAI : </label></p></td>
										<td><input name="NILAI" type="text" value="<?php echo $data['NILAI']?>" class="field size1" ></td>
									
							</tr>
							
							</table>
							</center>
						</div>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<br><br><br>
						<div class="buttons">
							<input type="hidden" name="NIM_MHS" value="<?php echo $data['NIM_MHS']; ?>">
							<input type="hidden" name="ID_MATKUL" value="<?php echo $data['ID_MATKUL']; ?>">
							<input type="SUBMIT" name="SUBMIT" value="UPDATE">
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				</div>
				<!-- End Box -->
				
				
			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>Tabel</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						
						<p><a href="e_dosen.php">Data Dosen</a></p>
						<p><a href="e_mahasiswa.php">Data Mahasiswa</a></p>
						<p><a href="e_matakuliah.php">Mata Kuliah</a></p>
						<p><a href="e_ruangan.php">Ruangan</a></p>
						<p><a href="e_nilai.php">Data Nilai</a></p>
						<p><a href="e_mengajar.php">Data Mengajar</a></p>
						<p><a href="e_jadwal.php">Jadwal</a></p><p><a href="e_admin.php">Admin</a></p>
						<p><a href="#"></a></p>
						
						
					</div>
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">@copyright 2013 - STMIK Kian Santang</span>
		<span class="right">
			Design by SKYERES</a>
		</span>
	</div>
</div>
<!-- End Footer -->
	<?php
	}
	?>
</body>
</html>