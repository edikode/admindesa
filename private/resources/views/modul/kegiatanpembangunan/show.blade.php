@extends('layouts.template')

@section('title', 'Detail Data Kegiatan Pembangunan')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Kegiatan Pembangunan</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('kegiatan-pembangunan') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Detail Data Kegiatan Pembangunan</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="30%">Nama Proyek/Kegiatan</td>
						<td>{{$pd->nama}}</td>
					</tr>
					<tr>
						<td>Volume</td>
						<td>{{$pd->volume}}</td>
					</tr>
					<tr>
						<th>Sumber Biaya</th>
						<th></th>
					</tr>
					<tr>
						<td>Dari Pemerintah</td>
						<td>{{angkaRupiah($pd->pemerintah)}}</td>
					</tr>
					<tr>
						<td>Dari Provinsi</td>
						<td>{{angkaRupiah($pd->provinsi)}}</td>
					</tr>
					<tr>
						<td>Dari Kab/Kota</td>
						<td>{{angkaRupiah($pd->kota)}}</td>
					</tr>
					<tr>
						<td>Dari Swadaya</td>
						<td>{{angkaRupiah($pd->swadaya)}}</td>
					</tr>
					<tr>
						<td>Jumlah</td>
						<td>
							{{angkaRupiah($pd->pemerintah+$pd->provinsi+$pd->kota+$pd->swadaya)}}
						</td>
					</tr>
					<tr>
						<td>Pelaksana</td>
						<td>
							{{$pd->pelaksana}}
						</td>
					</tr>
					<tr>
						<td>Waktu</td>
						<td>
							{{tgl_id($pd->waktu)}}
						</td>
					</tr>
					<tr>
						<td>Sifat Proyek</td>
						<td>
							{{$pd->sifat}}
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
