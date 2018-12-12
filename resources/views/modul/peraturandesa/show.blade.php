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
						<td>{{$pd->jenis}}</td>
					</tr>
					<tr>
						<td>Nomor Dan Tanggal Ditetapkan</td>
						<td>{{$pd->nomor_ditetapkan}}</td>
					</tr>
					<tr>
						<td>Tentang</td>
						<td>{{$pd->tentang}}</td>
					</tr>
					<tr>
						<td>Uraian Singkat</td>
						<td>{{$pd->uraian}}</td>
					</tr>
					<tr>
						<td>Tanggal Kesepakatan Peraturan Desa</td>
						<td>{{$pd->tanggal_kesepakatan}}</td>
					</tr>
					<tr>
						<td>Nomor Dan Tanggal DiLaporkan</td>
						<td>{{$pd->tanggal_dilaporkan}}</td>
					</tr>
					<tr>
						<td>Nomor Dan Tanggal Diundangkan Dalam Lembaran Desa</td>
						<td>{{$pd->tanggal_diundang}}</td>
					</tr>
					<tr>
						<td>Nomor Dan Tanggal Diundangkan Dalam Berita Desa</td>
						<td>{{$pd->tanggal_berita_desa}}</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>{{$pd->keterangan}}</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
