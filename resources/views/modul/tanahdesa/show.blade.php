@extends('layouts.template')

@section('title', 'Detail Data Tanah Di Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Tanah Di Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-tanah-di-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Tanah Di Desa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="20%">Nama Perorangan/Badan Hukum</td>
						<td>{{$kd->nama}}</td>
					</tr>
					<tr>
						<td>Status Hak Tanah</td>
						<td>{{$kd->status}} ({{$kd->luas}}<sup>2</sup>)</td>
					</tr>
					<tr>
						<td>Penggunaan Tanah</td>
						<td>{{$kd->penggunaan_tanah}} ({{$kd->luas_penggunaan}}<sup>2</sup>)</td>
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
