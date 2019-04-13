<?php 
    if ( !empty($_POST)) { 
        // post values
        
        
        $nama	= $_POST['nama'];
        $nohp   = $_POST['nohp'];
        $jenis	= $_POST['jenis'];
        $warna	= $_POST['warna'];
        $jumlah	= $_POST['jumlah'];
      
		$file = file_get_contents('datapesan.json');
		$data = json_decode($file, true);
		unset($_POST["add"]);
		$data["data"] = array_values($data["data"]);
		array_push($data["data"], $_POST);
		file_put_contents("datapesan.json", json_encode($data));
    }
?>

<?php
$getfile = file_get_contents('datapesan.json');
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Project Description" />
    <meta name="keywords" content="Project Keywords" />
	<title>DATA Pemesanan</title>
		<style>
	    * {
            box-sizing: border-box;
        }
	
		body{
			text-align: center;
			
		}
		
		input[type=text] {
			width: 500px;
			padding: 10px;
			border: 2px solid #ccc;
			border-radius: 10px;
			resize: vertical;
		}
		label {
			padding: 12px 12px 12px 0;
			display: inline-block;
			float: center;
		}
		
		.container {
			border-radius: 15px;
			background-color: #268;
			padding: 5px;
            
            
		}
		.col-25 {
			float: center;
			width: 25%;
			margin-top: 2px;
		}
		.col-75 {
			float: center;
			width: 70%;
			margin-top: 2px;
		}
		
		.row:after {
			content: "";
			display: table;
			clear: both;
		}
		
		@media screen and (max-width: 600px) {
			.col-25, .col-75, input[type=submit] {
				width: 100%;
				margin-top: 0;
			}
		}
		
		input[type=text]:focus {
            background-color: lightblue;
            border: 3px solid #555;
        }
		
		h1, h2 {
			text-align: center;
			font-family: algerian;
		}
	
		table {
			border-collapse: collapse;
			width: 100%;
		}
		td {
			text-align: center;
			padding: 8px;
			background-color: #f2f2f2;
		}
		th {
			text-align: center;
			padding: 8px;
			background-color: #988;
			color: white;
		}
		
		input[type=submit] {
			width: 10%;
			background-color: #988;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}
		
		input[type=submit]:hover {
			background-color: #109;
		}
	</style>
</head>
<body>

<!-- Input Data -->
<div class="container">
	<h1><b> Input  Data </b></h1>
	<form method="POST" action="">
		<div class="row">
			<div class="col-25">
				<label for="nama"><b>Nama </b></label>
			</div>
			<div class="col-75">
				<input type="text" required="required" id="nama" name="nama" placeholder="nama">
			</div>
		</div>
		
		<div class="row">
			<div class="col-25">
				<label for="nohp"><b>No HP </b></label>
			</div>
			<div class="col-75">
				<input type="text" required="required" id="nohp" name="nohp" placeholder="nohp">
			</div>
		</div>
	
		<div class="row">
			<div class="col-25">
				<label for="jenis"><b> Jenis Barang </b></label>
			</div>
			<div class="col-75">
				<input type="text" required="required" id="jenis" name="jenis" placeholder="jenis">
			</div>
		</div>
	
		<div class="row">
			<div class="col-25">
				<label for="warna"><b> Warna Barang </b></label>
			</div>
			<div class="col-75">
				<input type="text" required="required" id="warna" name="warna" placeholder="warna">
			</div>
		</div>		
		
		<div class="row">
			<div class="col-25">
				<label for="jumlah"><b> Jumlah Barang </b></label>
			</div>
			<div class="col-75">
				<input type="text" required="required" id="jumlah" name="jumlah" placeholder="jumlah">
			</div>
		</div>		
	
		<input type="submit" name="Simpan" value="Simpan"/>	
	</form>
</div>

&nbsp;

<!-- Tampil -->
<div class="container">
<h2><b> Tampilan  Data Pemesanan </b></h2>
	<table>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>No HP</th>
			<th>Jenis Barang</th>
			<th>Warna Barang</th>
			<th>Jumlah Barang</th>
			<th>Aksi</th>
		</tr>		
				
		<?php $ID=0;foreach ($jsonfile->data as $index => $obj): $ID++;  ?>
			<tr>
				<td><?php echo $ID; ?></td>
				<td><?php echo $obj->nama; ?></td>
				<td><?php echo $obj->nohp; ?></td>
				<td><?php echo $obj->jenis; ?></td>
				<td><?php echo $obj->warna; ?></td>
				<td><?php echo $obj->jumlah; ?></td>
				<td>
					<a class="btn btn-xs btn-primary" href="update.php?ID=<?php echo $index; ?>">Edit</a>
					<a class="btn btn-xs btn-danger" href="hapus.php?ID=<?php echo $index; ?>">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<br/>
    &nbsp;
<br/>

</body>
</html>