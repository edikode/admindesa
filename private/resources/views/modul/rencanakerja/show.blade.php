@extends('layouts.template')

@section('title', 'Detail Data Rencana Kerja Pembangunan Desa')

@section('bread')
<li><a href="{{ url('/') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Rencana Kerja Pembangunan Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('rencana-kerja-pembangunan-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Detail Data Rencana Kerja Pembangunan Desa</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="30%">Nama Proyek/Kegiatan</td>
						<td>{{$pd->nama}}</td>
					</tr>
					<tr>
						<td>Lokasi</td>
						<td>{{$pd->lokasi}}</td>
					</tr>
					<tr>
						<th>Sumber Biaya</th>
						<th></th>
					</tr>
					<tr>
						<td>Dari Pemerintah</td>
						<td>{{$pd->pemerintah}}</td>
					</tr>
					<tr>
						<td>Dari Provinsi</td>
						<td>{{$pd->provinsi}}</td>
					</tr>
					<tr>
						<td>Dari Kab/Kota</td>
						<td>{{$pd->kota}}</td>
					</tr>
					<tr>
						<td>Dari Swadaya</td>
						<td>{{$pd->swadaya}}</td>
					</tr>
					<tr>
						<td>Pelaksana</td>
						<td>
							{{$pd->pelaksana }}
						</td>
					</tr>
					<tr>
						<td>Manfaat</td>
						<td>
							{{$pd->manfaat }}
						</td>
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
