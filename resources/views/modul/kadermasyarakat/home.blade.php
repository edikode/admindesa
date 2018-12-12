@extends('layouts.template')

@section('title', 'Data Kader Pemberdayaan Masyarakat')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Kader Pemberdayaan Masyarakat</li>
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
							<h4>Data Kader Pemberdayaan Masyarakat</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('kader-pendamping-masyarakat/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th class="no">Nomor Urut</th>
								<th>Nama</th>
								<th>Umur</th>
								<th>Jenis Kelamin</th>
								<th>Pendidikan/<br>Kursus</th>
								<th>Bidang</th>
								<th>Alamat</th>
								<th>Keterangan</th>
								<th class="pilihan">Opsi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($kadermasyarakat as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->nama}}</td>
									<td>{{$p->umur}}</td>
									<td>{{$p->jenis_kelamin}}</td>
									<td>{{$p->pendidikan}}</td>
									<td>{{$p->bidang}}</td>
									<td>{{$p->alamat}}</td>
									<td>{{$p->keterangan}}</td>
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('kader-pendamping-masyarakat/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('kader-pendamping-masyarakat/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('kader-pendamping-masyarakat', $p->id)}}" method="post" style="display: inline-block;">
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
				<form action="{{url('kader-pendamping-masyarakat')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Tambah Data Kader Pemberdayaan Masyarakat</h4>
					</div>		
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nama')) has-error @endif'>
									<label class='control-label'>Nama</label>
									<input type='text' placeholder='Nama' class='form-control limited' id='nama' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@endif'
									required>

									@if ($errors->has('nama'))
										<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('umur')) has-error @endif'>
									<label class='control-label'>Umur</label>
									<input type='text' placeholder='Umur' class='form-control limited' id='umur' name='umur' maxlength='100' value='@if(count($errors) > 0){{old('umur')}}@endif'
									required>

									@if ($errors->has('umur'))
										<span for="umur" class="help-block">{{ $errors->first('umur') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('jenis_kelamin')) has-error @endif'>
									<label class='control-label'>Jenis Kelamin</label>
									<br>
									<label class='radio-inline'>
										<input type='radio' name='jenis_kelamin' class='square-green' value='L'>
										Laki-laki
									</label>
									<label class='radio-inline'>
										<input type='radio' name='jenis_kelamin' class='square-green' value='P'>
										Perempuan
									</label>

									@if ($errors->has('jenis_kelamin'))
										<span for="jenis_kelamin" class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('pendidikan')) has-error @endif'>
									<label class='control-label'>Pendidikan/Kursus</label>
									<input type='text' placeholder='Pendidikan/Kursus' class='form-control limited' id='pendidikan' name='pendidikan' maxlength='100' value='@if(count($errors) > 0){{old('pendidikan')}}@endif'
									required>

									@if ($errors->has('pendidikan'))
										<span for="pendidikan" class="help-block">{{ $errors->first('pendidikan') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('bidang')) has-error @endif'>
									<label class='control-label'>Bidang</label>
									<input type='text' placeholder='Bidang' class='form-control limited' id='bidang' name='bidang' maxlength='100' value='@if(count($errors) > 0){{old('bidang')}}@endif'
									required>

									@if ($errors->has('bidang'))
										<span for="bidang" class="help-block">{{ $errors->first('bidang') }}</span>
									@endif
								</div>		
								<div class='form-group'>
									<label class='control-label'>Alamat</label>
									<textarea class='form-control limited' id='alamat' cols='10' rows='4' name='alamat' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('alamat')}}@endif</textarea>
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
