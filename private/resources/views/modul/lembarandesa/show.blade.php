@extends('layouts.template')

@section('title', 'Detail Data Lembaran Desa dan Berita Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Lembaran Desa dan Berita Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-lembaran-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Lembaran Desa dan Berita Desa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="40%">Jenis Peraturan Di Desa</td>
						<td>{{$ld->jenis}}</td>
					</tr>
					<tr>
						<td>Nomor Dan Tanggal Ditetapkan</td>
						<td>{{$ld->nomor_ditetapkan}}</td>
					</tr>
					<tr>
						<td>Tentang</td>
						<td>{{$ld->tentang}}</td>
					</tr>
					<tr>
						<td>Tanggal Diundangkan</td>
						<td>{{tgl_id($ld->tanggal_diundangkan)}}</td>
					</tr>
					<tr>
						<td>Nomor Diundangkan</td>
						<td>{{$ld->nomor_diundangkan}}</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>{{$ld->keterangan}}</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
