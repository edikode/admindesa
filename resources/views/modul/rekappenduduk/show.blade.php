@extends('layouts.template')

@section('title', 'Detail Data Mutasi Penduduk Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Mutasi Penduduk Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-mutasi-penduduk-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Mutasi Penduduk Desa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="30%">Nama</td>
						<td>{{$pd->nama}}</td>
					</tr>
					<tr>
						<td width="30%">NIK</td>
						<td>{{$pd->nik}}</td>
					</tr>
					<tr>
						<td>Tempat, Tanggal Lahir</td>
						<td>{{$pd->tmp_lahir}}, {{tgl_id($pd->tgl_lahir)}}</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>{{$pd->jenis_kelamin}}</td>
					</tr>
					<tr>
						<td>Kewarganegaraan</td>
						<td>
							@if ($pd->kewarganegaraan == 'WNI')
								Warga Negara Indonesia
							@elseif ($pd->kewarganegaraan == 'WNA')
								Warga Negara Asing
							@endif
						</td>
					</tr>
					@if($pd->tgl_datang != "")
					<tr>
						<td>Datang Dari</td>
						<td>{{$pd->tmp_datang}}</td>
					</tr>
					<tr>
						<td>Tanggal Datang</td>
						<td>{{$pd->tgl_datang}}</td>
					</tr>

					@elseif($pd->tgl_pindah != "")
					<tr>
						<td>Pindah Ke</td>
						<td>{{$pd->tmp_pindah}}</td>
					</tr>
					<tr>
						<td>Tanggal Pindah</td>
						<td>{{$pd->tgl_pindah}}</td>
					</tr>

					@else
					<tr>
						<td>Lokasi Meninggal</td>
						<td>{{$pd->tmp_meninggal}}</td>
					</tr>
					<tr>
						<td>Tanggal Meninggal</td>
						<td>{{$pd->tgl_meninggal}}</td>
					</tr>
					@endif
					
					<tr>
						<td>Keterangan</td>
						<td>{{$pd->keterangan}}</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
