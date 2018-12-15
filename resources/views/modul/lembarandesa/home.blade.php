@extends('layouts.template')

@section('title', 'Data Lembaran Desa dan Berita Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Lembaran Desa dan Berita Desa</li>
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
							<h4>Data Lembaran Desa dan Berita Desa</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('data-lembaran-desa/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th  rowspan="2" class="no">Nomor Urut</th>
								<th rowspan="2">Jenis Peraturan Di Desa</th>
								<th rowspan="2">Nomor dan Tanggal Ditetapkan</th>				
								<th rowspan="2">Tentang</th>			
								<th colspan="2">Diundangkan</th>	
								{{-- <th rowspan="2">KET.</th> --}}
								<th rowspan="2" class="pilihan">Opsi</th>
							</tr>
							<tr>
								<th>Tanggal</th>
								<th>Nomor</th>
							</tr>

						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($lembarandesa as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->jenis}}</td>
									<td>{{$p->nomor_ditetapkan}}</td>
									<td>{{$p->tentang}}</td>
									<td>{{tgl_id($p->tanggal_diundangkan)}}</td>
									<td>{{$p->nomor_diundangkan}}</td>
									{{-- <td>{{$p->keterangan}}</td> --}}
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-lembaran-desa/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-lembaran-desa/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-lembaran-desa', $p->id)}}" method="post" style="display: inline-block;">
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
		<form action="{{url('data-lembaran-desa')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Lembaran Desa</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('jenis')) has-error @endif'>
							<label class='control-label'>Jenis</label>
							<input type='text' placeholder='Jenis' class='form-control limited' id='jenis' name='jenis' maxlength='100' value='@if(count($errors) > 0){{old('jenis')}}@endif'
							required>

							@if ($errors->has('jenis'))
								<span for="jenis" class="help-block">{{ $errors->first('jenis') }}</span>
							@endif
						</div>	
						<div class='form-group @if($errors->has('nomor_ditetapkan')) has-error @endif'>
							<label class='control-label'>Nomor Ditetapkan</label>
							<input type='text' placeholder='Nomor Ditetapkan' class='form-control limited' id='nomor_ditetapkan' name='nomor_ditetapkan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_ditetapkan')}}@endif' required>
							
							@if ($errors->has('nomor_ditetapkan'))
								<span for="nomor_ditetapkan" class="help-block">{{ $errors->first('nomor_ditetapkan') }}</span>
							@endif
						</div>					
						<div class='form-group'>
							<label class='control-label'>Tentang</label>
							<textarea class='form-control limited' id='tentang' cols='10' rows='4' name='tentang' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('tentang')}}@endif</textarea>
						</div>
						<div class='form-group @if($errors->has('tanggal_diundangkan')) has-error @endif'>
							<label class='control-label'>Tanggal Diundangkan</label>
							{{-- <div class="input-group">
								<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div> --}}
							<input style="width:150px" type="date" name="tanggal_diundangkan" id="tanggal_diundangkan" class="form-control" value="@if(count($errors) > 0){{old('tanggal_diundangkan')}}@endif" required>
						</div>
						<div class='form-group @if($errors->has('nomor_diundangkan')) has-error @endif'>
							<label class='control-label'>Nomor Diundangkan</label>
							<input type='text' placeholder='Nomor Diundangkan' class='form-control limited' id='nomor_diundangkan' name='nomor_diundangkan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_diundangkan')}}@endif'
							required>

							@if ($errors->has('nomor_diundangkan'))
								<span for="nomor_diundangkan" class="help-block">{{ $errors->first('nomor_diundangkan') }}</span>
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
