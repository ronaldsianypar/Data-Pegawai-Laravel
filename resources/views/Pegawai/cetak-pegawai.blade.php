<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	
	<style>
		table.static{
			position: relative;
			border: 1px;
		}	
	</style>
	<title>Cetak Data Pegawai</title>
</head>
<body>
	<div class="form-group">
		<p align="center"><b>Laporan Data Pegawai</b></p>
		<table class="static" align="center" rules="all" border="1px" style="width: 95%; ">
			<tr>
                      <th>NO</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Alamat</th>
                      <th>Tanggal Lahir</th>
                    </tr>
                    @foreach($cetakdata_pegawai as $view)
                    <tr>
                      <th>{{ $loop->iteration }}</th>
                      <th align="left">{{ $view->nama }}</th>
                      <th>{{ $view->jabatan->jabatan }}</th>
                      <th align="left">{{ $view->alamat }}</th>
                      <th>{{ date('d-m-Y', strtotime($view->tgl_lahir)) }}</th>
                    </tr>
                    @endforeach
		</table>
	</div>
	<!-- Untuk menampilkan print -->
	<script type="text/javascript">
		window.print()
	</script>
</body>
</html>