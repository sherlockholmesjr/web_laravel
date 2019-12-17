<!DOCTYPE html>
<html>
<head>
	<title>input</title>
	<style type="text/css">
		a{
			text-decoration: none;
		}
		html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
	</style>
</head>
<body>
	<form action="storeData" method="post">
		@csrf
		<table border="0px" align="center">
			<tr>
				<td>Kode Barang</td>
				<td>:</td>
				<td><input type="text" name="kode" value=""></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="nama" value=""></td>
			</tr>
			<tr>
				<td>Jenis Barang</td>
				<td>:</td>
				<td><input type="text" name="jenis" value=""></td>
			</tr>
			<tr>
				<td>Harga Barang</td>
				<td>:</td>
				<td><input type="text" name="harga" value=""></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>