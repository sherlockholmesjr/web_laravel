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
	<form action="update/{{$data->id}}" method="post">
		@csrf
		<table border="0px" align="center">
			<tr>
				<td>Kode Barang</td>
				<td>:</td>
				<td><input type="text" name="kode" value="{{$data->kode}}"></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="nama" value="{{$data->nama}}"></td>
			</tr>
			<tr>
				<td>Jenis Barang</td>
				<td>:</td>
				<td><input type="text" name="jenis" value="{{$data->jenis}}"></td>
			</tr>
			<tr>
				<td>Harga Barang</td>
				<td>:</td>
				<td><input type="text" name="harga" value="{{$data->harga}}"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="update">
			</tr>
		</table>
	</form>
</body>
</html>