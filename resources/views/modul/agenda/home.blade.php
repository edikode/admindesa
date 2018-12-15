@extends('layouts.template')

@section('title', 'Data Agenda')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Agenda</li>
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
							<h4>Data Agenda</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('data-agenda/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th class="no" rowspan="2">Nomor Urut</th>
								<th rowspan="2">Tanggal Penerimaan/ Pengiriman Surat</th>
								<th colspan="4">Surat Masuk</th>
								<th colspan="4">Surat Keluar</th>				
								<th rowspan="2">KET.</th>			
								<th class="pilihan" rowspan="2">Opsi</th>
							</tr>
							<tr>
								<th>Nomor</th>
								<th>Tanggal</th>
								<th>Pengirim</th>
								<th>Isi Singkat</th>
								<th>Nomor</th>
								<th>Tanggal</th>
								<th>Pengirim</th>
								<th>Isi Singkat</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($agenda as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									@if ($p->jenis == "Surat Masuk")
										<td>{{$p->tanggal_surat}}</td>
										<td>{{$p->nomor}}</td>
										<td>{{$p->tanggal}}</td>
										<td>{{$p->pengirim}}</td>
										<td>{{$p->isi}}</td>
										<td align="center">-</td>
										<td align="center">-</td>
										<td align="center">-</td>
										<td align="center">-</td>
										<td>{{$p->keterangan}}</td>
									@else
										<td>{{$p->tanggal_surat}}</td>
										<td align="center">-</td>
										<td align="center">-</td>
										<td align="center">-</td>
										<td align="center">-</td>
										<td>{{$p->nomor}}</td>
										<td>{{$p->tanggal}}</td>
										<td>{{$p->pengirim}}</td>
										<td>{{$p->isi}}</td>
										<td>{{$p->keterangan}}</td>
									@endif
									
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-agenda/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-agenda/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-agenda', $p->id)}}" method="post" style="display: inline-block;">
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
		<form action="{{url('data-agenda')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Agenda</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('jenis')) has-error @endif'>
							<label class='control-label'>Jenis Surat</label>
							<select name="jenis" id="jenis" class="form-control" required>
								<option value="">--- Pilih ---</option>
								<option value="Surat Masuk" @if(count($errors) > 0) @if($errors->first('jenis') == "Surat Masuk") selected @endif @endif>Surat Masuk</option>
								<option value="Surat Keluar" @if(count($errors) > 0) @if($errors->first('jenis') == "Surat Keluar") selected @endif @endif>Surat Keluar</option>
							</select>

							@if ($errors->has('agama'))
								<span for="agama" class="help-block">{{ $errors->first('agama') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('tanggal_surat')) has-error @endif'>
							<label class='control-label'>Tanggal Penerimaan/ Pengiriman Surat</label>
							{{-- <div class="input-group">
								<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div> --}}
							<input style="" type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" value="@if(count($errors) > 0){{old('tanggal_surat')}}@endif" required>
						</div>
						<div class='form-group @if($errors->has('nomor')) has-error @endif'>
							<label class='control-label'>Nomor</label>
							<input type='text' placeholder='Nomor' class='form-control limited' id='nomor' name='nomor' maxlength='100' value='@if(count($errors) > 0){{old('nomor')}}@endif'
							required>

							@if ($errors->has('nomor'))
								<span for="nomor" class="help-block">{{ $errors->first('nomor') }}</span>
							@endif
						</div>	
						<div class='form-group @if($errors->has('tanggal')) has-error @endif'>
							<label class='control-label'>Tanggal</label>
							{{-- <div class="input-group">
								<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div> --}}
							<input style="" type="date" name="tanggal" id="tanggal" class="form-control" value="@if(count($errors) > 0){{old('tanggal')}}@endif" required>
						</div>				
						<div class='form-group @if($errors->has('pengirim')) has-error @endif'>
							<label class='control-label'>Pengirim/Penerima</label>
							<input type='text' placeholder='Pengirim/Penerima' class='form-control limited' id='pengirim' name='pengirim' maxlength='100' value='@if(count($errors) > 0){{old('pengirim')}}@endif'>

							@if ($errors->has('pengirim'))
								<span for="pengirim" class="help-block">{{ $errors->first('pengirim') }}</span>
							@endif
						</div>
						<div class='form-group'>
							<label class='control-label'>Isi Singkat</label>
							<textarea class='form-control limited' id='isi' cols='10' rows='4' name='isi' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('isi')}}@endif</textarea>
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
