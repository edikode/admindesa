@extends('layouts.template')

@section('title', 'Detail Data Tanah Kas Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Tanah Kas Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-tanah-kas-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Tanah Kas Desa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="20%">Asal Tanah Kas Desa</td>
						<td>{{$kd->asal}}</td>
					</tr>
					<tr>
						<td>Nomor Sertifikat</td>
						<td>{{$kd->nomor_sertifikat}}</td>
					</tr>
					<tr>
						<td>Luas</td>
						<td>{{$kd->luas}}</td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>{{$kd->kelas}}</td>
					</tr>
					<tr>
						<td>Perolehan TKD</td>
						<td></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>{{$kd->kelas}}</td>
					</tr>
					<tr>
						<td>Asli Milik Desa</td>
						<td>{{$kd->asli}}</td>
					</tr>
					<tr>
						<td>Pemerintah</td>
						<td>{{$kd->pemerintah}}</td>
					</tr>
					<tr>
						<td>Provinsi</td>
						<td>{{$kd->provinsi}}</td>
					</tr>
					<tr>
						<td>Kab/Kota</td>
						<td>{{$kd->kota}}</td>
					</tr>
					<tr>
						<td>Lainnya</td>
						<td>{{$kd->lainlain}}</td>
					</tr>
					<tr>
						<td>Tanggal Perolehan</td>
						<td>{{tgl_id($kd->tgl_perolehan)}}</td>
					</tr>
					<tr>
						<td>Jenis TKD</td>
						<td></td>
					</tr>
					<tr>
						<td>Sawah</td>
						<td>{{$kd->sawah}}</td>
					</tr>
					<tr>
						<td>Tegal</td>
						<td>{{$kd->tegal}}</td>
					</tr>
					<tr>
						<td>Kebun</td>
						<td>{{$kd->kebun}}</td>
					</tr>
					<tr>
						<td>Tambak/Kolam</td>
						<td>{{$kd->tambak}}</td>
					</tr>
					<tr>
						<td>Tanah Kering/Darat</td>
						<td>{{$kd->datat}}</td>
					</tr>
					<tr>
						<td>Patok Tanda Batas</td>
						<td>{{$kd->patok_batas}}</td>
					</tr>
					<tr>
						<td>Papan Nama</td>
						<td>{{$kd->papan_nama}}</td>
					</tr>
					<tr>
						<td>Lokasi</td>
						<td>{{$kd->lokasi}}</td>
					</tr>
					<tr>
						<td>Peruntukkan</td>
						<td>{{$kd->peruntukan}}</td>
					</tr>
					<tr>
						<td>Mutasi</td>
						<td>{{$kd->mutasi}}</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>{{$kd->keterangan}}</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
