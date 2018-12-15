@extends('layouts.template')

@section('title', 'Data Ekspedisi')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Ekspedisi</li>
@endsection

@section('button', '')
@section('main')

	<div class="row">
		<div class="col-sm-12">	
			@include('errors/pesan_muncul')				
			<div class="clear panel panel-default">						
				<div class="panel-body">
					<div class="row">
						<div class="col-md-8">
							<h4>Data Ekspedisi</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('data-ekspedisi/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>
								<th class="no">Nomor Urut</th>
								<th>Tanggal Pengiriman</th>
								<th>Tanggal Dan Nomor Surat</th>
								<th>Isi Singkat Surat yang Dikirim</th>
								<th>Ditujukan Kepada</th>
								<th>Keterangan</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($ekspedisi as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{tgl_id($p->tanggal_pengiriman)}}</td>
									<td>{{$p->tanggal_surat}}</td>
									<td>{{$p->isi}}</td>
									<td>{{$p->tujuan}}</td>
									<td>{{$p->keterangan}}</td>
									
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-ekspedisi/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-ekspedisi/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-ekspedisi', $p->id)}}" method="post" style="display: inline-block;">
											{{ csrf_field() }}	
											<input type="hidden" name="_method" value="DELETE">
											<button type="submit" data-original-title='Hapus' class="btn btn-red btn-sm tooltips" onclick='return konfirmasiHapus()'><i class="clip-remove"></i></button>
										</form>
									</td>
								</tr>
							@endforeach

						</tbody>
					</table>
				</div>
				
			</div>
		</div>		
	</div>

	<div class="modal fade modal-crud" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
		<form action="{{url('data-ekspedisi')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Ekspedisi</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('tanggal_pengiriman')) has-error @endif'>
							<label class='control-label'>Tanggal Pengiriman</label>
							{{-- <div class="input-group">
								<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div> --}}
							<input style="" type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control" value="@if(count($errors) > 0){{old('tanggal_pengiriman')}}@endif" required>
						</div>
						<div class='form-group @if($errors->has('tanggal_surat')) has-error @endif'>
							<label class='control-label'>Tanggal Dan Nomor Surat</label>
							<input type='text' placeholder='Tanggal Dan Nomor Surat' class='form-control limited' id='tanggal_surat' name='tanggal_surat' maxlength='100' value='@if(count($errors) > 0){{old('tanggal_surat')}}@endif'
							required>

							@if ($errors->has('tanggal_surat'))
								<span for="tanggal_surat" class="help-block">{{ $errors->first('tanggal_surat') }}</span>
							@endif
						</div>	
						<div class='form-group'>
							<label class='control-label'>Isi Singkat Surat yang Dikirim</label>
							<textarea class='form-control limited' id='isi' cols='10' rows='4' name='isi' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('isi')}}@endif</textarea>
						</div>	
						<div class='form-group @if($errors->has('tujuan')) has-error @endif'>
							<label class='control-label'>Ditujukan Kepada</label>
							<input type='text' placeholder='Ditujukan Kepada' class='form-control limited' id='tujuan' name='tujuan' maxlength='100' value='@if(count($errors) > 0){{old('tujuan')}}@endif'
							required>

							@if ($errors->has('tujuan'))
								<span for="tujuan" class="help-block">{{ $errors->first('tujuan') }}</span>
							@endif
						</div>	
						<div class='form-group'>
							<label class='control-label'>Keterangan</label>
							<textarea class='form-control limited' id='keterangan' cols='10' rows='4' name='keterangan' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('keterangan')}}@endif</textarea>
						</div>				
					</div>
				</div>
			</div>
			<div class="modal-footer">				
				<input name="simpan" value="Simpan" type="submit" class="btn btn-green">
			</div>
		</form>
	</div>

@endsection
