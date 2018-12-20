@extends('layouts.template')

@section('title', 'Detail Data Kader Pemberdayaan Masyarakat')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Kader Pemberdayaan Masyarakat</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('kader-pendamping-masyarakat') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Kader Pemberdayaan Masyarakat</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="30%">Nama</td>
						<td>{{$pd->nama}}</td>
					</tr>
					<tr>
						<td>Umur</td>
						<td>{{$pd->umur}}</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>{{$pd->jenis_kelamin}}</td>
					</tr>
					<tr>
						<td>Pendidikan/Kursus</td>
						<td>{{$pd->pendidikan}}</td>
					</tr>
					<tr>
						<td>Bidang</td>
						<td>{{$pd->bidang}}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>{{$pd->alamat}}</td>
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
