@extends('layouts.template')

@section('title', 'Detail Data Keputusan Kepala Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Keputusan Kepala Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-keputusan-kepala-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Keputusan Kepala Desa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="40%">Nomor Dan Tanggal Keputusan Kepala Desa</td>
						<td>{{$data->nomor_keputusan}}</td>
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
						<td>Nomor Dan Tanggal DiLaporkan</td>
						<td>{{$data->nomor_dilaporkan}}</td>
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
