@extends('layouts.template')

@section('title', 'Detail Data Penduduk Sementara')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Penduduk Sementara</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-penduduk-sementara') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Penduduk Sementara</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="30%">Nama Lengkap</td>
						<td>{{$pd->nama}}</td>
					</tr>
					<tr>
						<td width="30%">Nomor Identitas</td>
						<td>{{$pd->nomor_identitas}}</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>{{$pd->jenis_kelamin}}</td>
					</tr>
					<tr>
						<td>Tempat, Tanggal Lahir</td>
						<td>{{$pd->tmp_lahir}}, {{tgl_id($pd->tgl_lahir)}}</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>{{$pd->pekerjaan}}</td>
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
					<tr>
						<td>Datang Dari</td>
						<td>{{$pd->datang_dari}}</td>
					</tr>
					<tr>
						<td>Maksud dan Tujuan Kedatangan</td>
						<td>{{$pd->tujuan}}</td>
					</tr>
					<tr>
						<td>Nama yang Didatangi</td>
						<td>{{$pd->nama_didatangi}}</td>
					</tr>
					<tr>
						<td>Alamat yang Didatangi</td>
						<td>{{$pd->alamat_didatangi}}</td>
					</tr>
					<tr>
						<td>Datang Tanggal</td>
						<td>{{$pd->datang_tgl}}</td>
					</tr>
					<tr>
						<td>Pergi  Tanggal</td>
						<td>{{$pd->pergi_tgl}}</td>
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
