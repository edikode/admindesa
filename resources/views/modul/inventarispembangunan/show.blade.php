@extends('layouts.template')

@section('title', 'Detail Data Inventaris Hasil-Hasil Pembangunan')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Inventaris Hasil-Hasil Pembangunan</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('inventaris-hasil-pembangunan') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Detail Data Inventaris Hasil-Hasil Pembangunan</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="30%">Jenis/Nama Hasil Pembangunan</td>
						<td>{{$pd->nama}}</td>
					</tr>
					<tr>
						<td>Volume</td>
						<td>{{$pd->volume}}</td>
					</tr>
					<tr>
						<td>Biaya</td>
						<td>{{angkaRupiah($pd->biaya)}}</td>
					</tr>
					<tr>
						<td>Lokasi</td>
						<td>
							{{$pd->lokasi}}
						</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>
							{{$pd->keterangan}}
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
