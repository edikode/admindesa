@extends('layouts.template')

@section('title', 'Detail Data Aparat Pemerintah Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Aparat Pemerintah Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-aparat-pemerintah-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Aparat Pemerintah Desa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="40%">Nama</td>
						<td>{{$pd->nama}}</td>
					</tr>
					<tr>
						<td>NIAP</td>
						<td>@if($pd->niap != ""){{$pd->niap}}@else-@endif</td>
					</tr>
					<tr>
						<td>NIP</td>
						<td>@if($pd->nip != ""){{$pd->nip}}@else-@endif</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>{{$pd->jenis_kelamin}}</td>
					</tr>
					<tr>
						<td>Tempat, Tanggal Lahir</td>
						<td>{{$pd->ttl}}</td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>{{$pd->agama}}</td>
					</tr>
					<tr>
						<td>Pangkat</td>
						<td>{{$pd->pangkat}}</td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td>{{$pd->jabatan}}</td>
					</tr>
					<tr>
						<td>Pendidikan Terakhir</td>
						<td>{{$pd->pendidikan_terakhir}}</td>
					</tr>
					<tr>
						<td>Nomor dan Tanggal Keputusan Pengangkatan</td>
						<td>{{$pd->nomor_pengangkatan}}</td>
					</tr>
					<tr>
						<td>Nomor dan Tanggal Keputusan Pemberhentian</td>
						<td>>@if($pd->nomor_pemberhentian != ""){{$pd->nomor_pemberhentian}}@else-@endif</td>
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
