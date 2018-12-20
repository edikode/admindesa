@extends('layouts.template')

@section('title', 'Detail Data Ekspedisi')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Ekspedisi</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-ekspedisi') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Ekspedisi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="40%">Tanggal Pengiriman</td>
						<td>{{tgl_id($pd->tanggal_pengiriman)}}</td>
					</tr>
					<tr>
						<td>Tanggal dan Nomor Surat</td>
						<td>{{$pd->tanggal_surat}}</td>
					</tr>
					<tr>
						<td>Isi Singkat Surat yang Dikirim</td>
						<td>{{$pd->isi}}</td>
					</tr>
					<tr>
						<td>Ditujukan Kepada</td>
						<td>{{$pd->tujuan}}</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>
							{{$pd->keterangan }}
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
