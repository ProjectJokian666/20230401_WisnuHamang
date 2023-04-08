<!DOCTYPE html>
<html>
<head>
	<title>CETAK REKAP LAPORAN</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    
</head>
<body>
	<center>
		<h5>CETAK DATA {{$data['tabel']}} dengan KONDISI {{$data['kondisi']['b']}}</h5>
		<table border="1" style="align-items: center;">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Tanggal Pengajuan</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data['data'] as $data)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$data->name}}</td>
					<td>{{$data->tanggal}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</center>
</body>
</html>