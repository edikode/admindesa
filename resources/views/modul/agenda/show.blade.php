@extends('layouts.template')

@section('title', 'Detail Data Agenda')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Agenda</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-agenda') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail {{$pd->jenis}}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="40%">Nomor</td>
						<td>{{$pd->nomor}}</td>
					</tr>
					<tr>
						<td>Tanggal Penerimaan/ Pengiriman Surat</td>
						<td>{{$pd->tanggal_surat}}</td>
					</tr>
					<tr>
						<td>Nomor</td>
						<td>{{$pd->nomor}}</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>{{$pd->tanggal}}</td>
					</tr>
					<tr>
						<td>@if($pd->jenis == "Surat Masuk") Penerima @else Pengirim @endif</td>
						<td>{{$pd->pengirim}}</td>
					</tr>
					<tr>
						<td>Isi Singkat</td>
						<td>{{$pd->isi}}</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>
							@if($pd->keterangan != "")
								{{$pd->keterangan}}
							@else 
								-
							@endif
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
