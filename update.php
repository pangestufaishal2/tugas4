<?php
if (isset($_GET["ID"])) {
    $ID = (int) $_GET["ID"];
    $getfile = file_get_contents('datapesan.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["data"];
    $jsonfile = $jsonfile[$ID];
}
if (isset($_POST["ID"])) {
    $ID = (int) $_POST["ID"];
    $getfile = file_get_contents('datapesan.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["data"];
    $jsonfile = $jsonfile[$ID];
    $post["nama"] = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $post["nohp"] = isset($_POST["nohp"]) ? $_POST["nohp"] : "";
    $post["jenis"] = isset($_POST["jenis"]) ? $_POST["jenis"] : "";
    $post["warna"] = isset($_POST["warna"]) ? $_POST["warna"] : "";
    $post["jumlah"] = isset($_POST["jumlah"]) ? $_POST["jumlah"] : "";
    if ($jsonfile) {
        unset($all["data"][$ID]);
        $all["data"][$ID] = $post;
        $all["data"] = array_values($all["data"]);
        file_put_contents("datapesan.json", json_encode($all));
    }
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="tutorial-boostrap-merubaha-warna">
	<title>Edit Data Pemesanan</title>
<style>
		* {
            box-sizing: border-box;
        }
	
		body{
			text-align: center;
		}
		
		h1 {
			text-align: center;
			font-family: algerian;
		}
		
		input[type=text] {
			width: 500px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 8px;
			resize: vertical;
            float: center;
		}
		
		input[type=text]:focus {
            background-color: lightblue;
            border: 3px solid #555;
            float: center;
        }
		
		.ubah {
			width: 90px;
			background-color: #178;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			float: center;
		}
		.ubah :hover {
			background-color: #246;
		}
		
		.kembali {
		width: 90px;
			background-color: #178;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			float: center;
		}
		.kembali :hover {
			background-color: #45a049;
		}
		label {
			padding: 12px 12px 12px 0;
			display: inline-block;
			float : center;
		}
		
		.container {
			border-radius: 20px;
			background-color: #f2f2f2;
			padding: 20px;
		}
		.col-25 {
			float: center;
			width: 10%;
			margin-top: 3px;
		}
		.col-75 {
			float: center;
			width: 60%;
			margin-top: 3px;
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
	</style>
</head>
<body>

<div class="container">
	<h1><b> Update Data </b></h1>
	&nbsp;
    <?php if (isset($_GET["ID"])): ?>
		<form method="POST" action="update.php">
			<input type="hidden" value="<?php echo $ID ?>" name="ID"/>
			
			<div class="row">
				<div class="col-25">
					<label for="nama"><b> NAMA </b></label>
				</div>
				<div class="col-75">
					<input type="text" class="form-control" required="required" id="nama" value="<?php echo $jsonfile["nama"] ?>" name="nama" placeholder="nama ">
				</div>
			</div>
			
			<div class="row">
				<div class="col-25">
					<label for="nohp"><b> No HP </b></label>
				</div>
				<div class="col-75">
					<input type="text" required="required" class="form-control" id="nohp" value="<?php echo $jsonfile["nohp"] ?>" name="nohp" placeholder="nohp">
				</div>
			</div>
			
			<div class="row">
				<div class="col-25">
					<label for="jenis"><b>Jenis Barang </b></label>
				</div>
				<div class="col-75">
					<input type="text" required="required" class="form-control" id="jenis" value="<?php echo $jsonfile["jenis"] ?>" name="jenis" placeholder="Jenis Barang">
				</div>
			</div>
			
						<div class="row">
				<div class="col-25">
					<label for="warna"><b>Warna Barang </b></label>
				</div>
				<div class="col-75">
					<input type="text" required="required" class="form-control" id="warna" value="<?php echo $jsonfile["warna"] ?>" name="warna" placeholder="Warna Barang">
				</div>
			</div>
			
						<div class="row">
				<div class="col-25">
					<label for="jumlah"><b>Jumlah Barang </b></label>
				</div>
				<div class="col-75">
					<input type="text" required="required" class="form-control" id="jumlah" value="<?php echo $jsonfile["jumlah"] ?>" name="jumlah" placeholder="Jumlah Barang">
				</div>
			</div>
    
			<div class="form-actions">
				<input type="submit" class="ubah" name="Edit" value="Update"/>
				<input type="submit" class="kembali" href="index.php" name="Back" value="Back"/>
			</div>
		</form>
		<?php endif; ?>
</div>

</body>
</html>