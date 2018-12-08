@extends('layouts.template')

@section('title', 'Data Peraturan Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Peraturan Desa</li>
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
							<h4>Data Peraturan Desa</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('data-peraturan-desa/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th class="no">Nomor Urut</th>
								<th>Jenis Peraturan Di Desa</th>
								<th>Nomor Dan Tanggal Ditetapkan</th>
								{{-- <th>Tentang</th>				 --}}
								{{-- <th>Uraian Singkat</th>			 --}}
								<th>Tanggal Kesepakatan Peraturan Desa</th>
								<th>Nomor Dan Tanggal DiLaporkan</th>	
								<th>Nomor Dan Tanggal Diundangkan Dalam Lembaran Desa</th>
								<th>Nomor Dan Tanggal Diundangkan Dalam Berita Desa</th>
								{{-- <th>KET.</th> --}}
								<th class="pilihan">Opsi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($peraturandesa as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->jenis}}</td>
									<td>{{$p->nomor_ditetapkan}}</td>
									{{-- <td>{{$p->tentang}}</td> --}}
									{{-- <td>{{$p->uraian}}</td> --}}
									<td>{{tgl_id($p->tanggal_kesepakatan)}}</td>
									<td>{{$p->tanggal_dilaporkan}}</td>
									<td>{{$p->tanggal_diundang}}</td>
									<td>{{$p->tanggal_berita_desa}}</td>
									{{-- <td>{{$p->keterangan}}</td> --}}
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-peraturan-desa/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-peraturan-desa/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-peraturan-desa', $p->id)}}" method="post" style="display: inline-block;">
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

	<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-crud">
			<div class="modal-content">
				<form action="{{url('data-peraturan-desa')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Tambah Data Peraturan Desa</h4>
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
								<div class='form-group'>
									<label class='control-label'>Uraian Singkat</label>
									<textarea class='form-control limited' id='uraian' cols='10' rows='4' name='uraian' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('uraian')}}@endif</textarea>
								</div>
								<div class='form-group @if($errors->has('tanggal_kesepakatan')) has-error @endif'>
									<label class='control-label'>Tanggal Kesepakatan</label>
									{{-- <input type='text' placeholder='Tanggal Kesepakatan' class='form-control limited' id='tanggal_kesepakatan' name='tanggal_kesepakatan' maxlength='100' value='@if(count($errors) > 0){{old('tanggal_kesepakatan')}}@endif' 
									required> --}}

									<input style="width:150px" type="date" name="tanggal_kesepakatan" id="tanggal_kesepakatan" class="form-control" value="@if(count($errors) > 0){{old('tanggal_kesepakatan')}}@endif" required>

									@if ($errors->has('tanggal_kesepakatan'))
										<span for="tanggal_kesepakatan" class="help-block">{{ $errors->first('tanggal_kesepakatan') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('tanggal_dilaporkan')) has-error @endif'>
									<label class='control-label'>Nomor dan Tanggal Dilaporkan</label>
									<input type='text' placeholder='Nomor dan Tanggal Dilaporkan' class='form-control limited' id='tanggal_dilaporkan' name='tanggal_dilaporkan' maxlength='100' value='@if(count($errors) > 0){{old('tanggal_dilaporkan')}}@endif'
									required>

									@if ($errors->has('tanggal_dilaporkan'))
										<span for="tanggal_dilaporkan" class="help-block">{{ $errors->first('tanggal_dilaporkan') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('tanggal_diundang')) has-error @endif'>
									<label class='control-label'>Nomor dan Tanggal Diundang</label>
									<input type='text' placeholder='Nomor dan Tanggal Diundang' class='form-control limited' id='tanggal_diundang' name='tanggal_diundang' maxlength='100' value='@if(count($errors) > 0){{old('tanggal_diundang')}}@endif'
									required>

									@if ($errors->has('tanggal_diundang'))
										<span for="tanggal_diundang" class="help-block">{{ $errors->first('tanggal_diundang') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('tanggal_berita_desa')) has-error @endif'>
									<label class='control-label'>Nomor dan Tanggal Berita Desa</label>
									<input type='text' placeholder='Nomor dan Tanggal Berita Desa' class='form-control limited' id='tanggal_berita_desa' name='tanggal_berita_desa' maxlength='100' value='@if(count($errors) > 0){{old('tanggal_berita_desa')}}@endif'
									required>

									@if ($errors->has('tanggal_berita_desa'))
										<span for="tanggal_berita_desa" class="help-block">{{ $errors->first('tanggal_berita_desa') }}</span>
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
		</div>
	</div>

@endsection
