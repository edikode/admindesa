@extends('layouts.template')

@section('title', 'Detail Data Peraturan Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Peraturan Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-peraturan-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Peraturan Desa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="40%">Jenis Peraturan Di Desa</td>
						<td>{{$data->jenis}}</td>
					</tr>
					<tr>
						<td>Nomor Dan Tanggal Ditetapkan</td>
						<td>{{$data->nomor_ditetapkan}}</td>
					</tr>
					<tr>
						<td>Tentang</td>
						<td>{{$data->tentang}}</td>
					</tr>
					<tr>
						<td>Uraian Singkat</td>
						<td>{{$data->uraian}}</td>
					</tr>
					<tr>
						<td>Tanggal Kesepakatan Peraturan Desa</td>
						<td>{{$data->tanggal_kesepakatan}}</td>
					</tr>
					<tr>
						<td>Nomor Dan Tanggal DiLaporkan</td>
						<td>{{$data->tanggal_dilaporkan}}</td>
					</tr>
					<tr>
						<td>Nomor Dan Tanggal Diundangkan Dalam Lembaran Desa</td>
						<td>{{$data->tanggal_diundang}}</td>
					</tr>
					<tr>
						<td>Nomor Dan Tanggal Diundangkan Dalam Berita Desa</td>
						<td>{{$data->tanggal_berita_desa}}</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>{{$data->keterangan}}</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
