@extends('layouts.template')

@section('title', 'Data Keputusan Kepala Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Keputusan Kepala Desa</li>
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
							<h4>Data Keputusan Kepala Desa</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('data-keputusan-kepala-desa/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th class="no">Nomor Urut</th>
								<th>Nomor Dan Tanggal Keputusan Kepala Desa</th>
								<th>Tentang</th>				
								<th>Uraian Singkat</th>			
								<th>Nomor Dan Tanggal DiLaporkan</th>	
								<th>KET.</th>
								<th class="pilihan">Opsi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($data as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->nomor_keputusan}}</td>
									<td>{{$p->tentang}}</td>
									<td>{{$p->uraian}}</td>
									<td>{{$p->nomor_dilaporkan}}</td>
									<td>{{$p->keterangan}}</td>
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-keputusan-kepala-desa/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-keputusan-kepala-desa/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-keputusan-kepala-desa', $p->id)}}" method="post" style="display: inline-block;">
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
		<form action="{{url('data-keputusan-kepala-desa')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Keputusan Kepala Desa</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('nomor_keputusan')) has-error @endif'>
							<label class='control-label'>Nomor Keputusan</label>
							<input type='text' placeholder='Nomor Keputusan' class='form-control limited' id='nomor_keputusan' name='nomor_keputusan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_keputusan')}}@endif' required>
							
							

							@if ($errors->has('nomor_keputusan'))
								<span for="nomor_keputusan" class="help-block">{{ $errors->first('nomor_keputusan') }}</span>
							@endif
						</div>					
						<div class='form-group'>
							<label class='control-label'>Tentang</label>
							<textarea class='form-control limited' id='tentang' cols='10' rows='4' name='tentang' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('tentang')}}@endif</textarea>
						</div>
						<div class='form-group'>
							<label class='control-label'>Uraian Singkat</label>
							<textarea class='form-control limited' id='uraian' cols='10' rows='4' name='uraian' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('uraian')}}@endif</textarea>
						</div>
						<div class='form-group @if($errors->has('nomor_dilaporkan')) has-error @endif'>
							<label class='control-label'>Nomor dan Tanggal Dilaporkan</label>
							<input type='text' placeholder='Nomor dan Tanggal Dilaporkan' class='form-control limited' id='nomor_dilaporkan' name='nomor_dilaporkan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_dilaporkan')}}@endif'
							required>

							@if ($errors->has('nomor_dilaporkan'))
								<span for="nomor_dilaporkan" class="help-block">{{ $errors->first('nomor_dilaporkan') }}</span>
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
