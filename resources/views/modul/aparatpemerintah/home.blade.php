@extends('layouts.template')

@section('title', 'Data Aparat Pemerintah Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Aparat Pemerintah Desa</li>
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
							<h4>Data Aparat Pemerintah Desa</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('data-aparat-pemerintah-desa/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th class="no">Nomor Urut</th>
								<th>Nama</th>
								<th>NIAP</th>
								<th>NIP</th>				
								<th>Jenis Kelamin</th>			
								<th>Tempat dan Tgl Lahir</th>
								<th>Agama</th>	
								<th>Pangkat Golongan</th>
								<th>Jabatan</th>
								{{-- <th>Pendidikan Terakhir</th> --}}
								<th>Nomor dan Tanggal Keputusan Pengangkatan</th>
								<th>Nomor dan Tanggal Keputusan Pemberhentian</th>
								{{-- <th>KET.</th> --}}
								<th class="pilihan">Opsi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($aparatpemerintah as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->nama}}</td>
									<td>@if($p->niap != ""){{$p->niap}}@else-@endif</td>
									<td>@if($p->nip != ""){{$p->nip}}@else-@endif</td>
									<td>{{$p->jenis_kelamin}}</td>
									<td>{{$p->ttl}}</td>
									<td>{{$p->agama}}</td>
									<td>{{$p->pangkat}}</td>
									<td>{{$p->jabatan}}</td>
									{{-- <td>{{$p->pendidikan_terakhir}}</td> --}}
									<td>{{$p->nomor_pengangkatan}}</td>
									<td>@if($p->nomor_pemberhentian != ""){{$p->nomor_pemberhentian}}@else-@endif</td>
									{{-- <td>{{$p->keterangan}}</td> --}}
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-aparat-pemerintah-desa/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-aparat-pemerintah-desa/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-aparat-pemerintah-desa', $p->id)}}" method="post" style="display: inline-block;">
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
		<form action="{{url('data-aparat-pemerintah-desa')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Aparat Pemerintah Desa</h4>
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
						<div class='form-group @if($errors->has('niap')) has-error @endif'>
							<label class='control-label'>NIAP</label>
							<input type='text' placeholder='NIAP' class='form-control limited' id='niap' name='niap' maxlength='100' value='@if(count($errors) > 0){{old('niap')}}@endif'>

							@if ($errors->has('niap'))
								<span for="niap" class="help-block">{{ $errors->first('niap') }}</span>
							@endif
						</div>	
						<div class='form-group @if($errors->has('nip')) has-error @endif'>
							<label class='control-label'>NIP</label>
							<input type='text' placeholder='NIP' class='form-control limited' id='nip' name='nip' maxlength='100' value='@if(count($errors) > 0){{old('nip')}}@endif'>

							@if ($errors->has('nip'))
								<span for="nip" class="help-block">{{ $errors->first('nip') }}</span>
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
						

						<div class='form-group @if($errors->has('ttl')) has-error @endif'>
							<label class='control-label'>Tempat, Tanggal Lahir</label>
							<input type='text' placeholder='Tempat, Tanggal Lahir' class='form-control limited' id='ttl' name='ttl' maxlength='100' value='@if(count($errors) > 0){{old('ttl')}}@endif' required>

							@if ($errors->has('ttl'))
								<span for="ttl" class="help-block">{{ $errors->first('ttl') }}</span>
							@endif
						</div>					
						<div class='form-group @if($errors->has('agama')) has-error @endif'>
							<label class='control-label'>Agama</label>
							<select name="agama" id="agama" class="form-control" required>
								<option value="">--- Pilih ---</option>
								<option value="Islam" @if(count($errors) > 0) @if($errors->first('agama') == "Islam") selected @endif @endif>Islam</option>
								<option value="Kritsten" @if(count($errors) > 0) @if($errors->first('agama') == "Kritsten") selected @endif @endif>Kritsten</option>
								<option value="Katolik" @if(count($errors) > 0) @if($errors->first('agama') == "Katolik") selected @endif @endif>Katolik</option>
								<option value="Islam" @if(count($errors) > 0) @if($errors->first('agama') == "Islam") selected @endif @endif>Hindu</option>
								<option value="Budha" @if(count($errors) > 0) @if($errors->first('agama') == "Budha") selected @endif @endif>Budha</option>
								<option value="Lainnya" @if(count($errors) > 0) @if($errors->first('agama') == "Lainnya") selected @endif @endif>Lainnya</option>
							</select>

							@if ($errors->has('agama'))
								<span for="agama" class="help-block">{{ $errors->first('agama') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('pangkat')) has-error @endif'>
							<label class='control-label'>Pangkat</label>
							<input type='text' placeholder='Pangkat' class='form-control limited' id='pangkat' name='pangkat' maxlength='100' value='@if(count($errors) > 0){{old('pangkat')}}@endif' required>

							@if ($errors->has('pangkat'))
								<span for="pangkat" class="help-block">{{ $errors->first('pangkat') }}</span>
							@endif
						</div>	
						<div class='form-group @if($errors->has('jabatan')) has-error @endif'>
							<label class='control-label'>Jabatan</label>
							<input type='text' placeholder='Jabatan' class='form-control limited' id='jabatan' name='jabatan' maxlength='100' value='@if(count($errors) > 0){{old('jabatan')}}@endif' required>

							@if ($errors->has('jabatan'))
								<span for="jabatan" class="help-block">{{ $errors->first('jabatan') }}</span>
							@endif
						</div>	
						<div class='form-group @if($errors->has('pendidikan_terakhir')) has-error @endif'>
							<label class='control-label'>Pendidikan Terakhir</label>
							<input type='text' placeholder='Pendidikan Terakhir' class='form-control limited' id='pendidikan_terakhir' name='pendidikan_terakhir' maxlength='100' value='@if(count($errors) > 0){{old('pendidikan_terakhir')}}@endif' required>

							@if ($errors->has('pendidikan_terakhir'))
								<span for="pendidikan_terakhir" class="help-block">{{ $errors->first('pendidikan_terakhir') }}</span>
							@endif
						</div>	
							
						<div class='form-group @if($errors->has('nomor_pengangkatan')) has-error @endif'>
							<label class='control-label'>Nomor Pengangkatan</label>
							<input type='text' placeholder='Nomor Pengangkatan' class='form-control limited' id='nomor_pengangkatan' name='nomor_pengangkatan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_pengangkatan')}}@endif'
							required>

							@if ($errors->has('nomor_pengangkatan'))
								<span for="nomor_pengangkatan" class="help-block">{{ $errors->first('nomor_pengangkatan') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('nomor_pemberhentian')) has-error @endif'>
							<label class='control-label'>Nomor Pemberhentian</label>
							<input type='text' placeholder='Nomor Pemberhentian' class='form-control limited' id='nomor_pemberhentian' name='nomor_pemberhentian' maxlength='100' value='@if(count($errors) > 0){{old('nomor_pemberhentian')}}@endif'>

							@if ($errors->has('nomor_pemberhentian'))
								<span for="nomor_pemberhentian" class="help-block">{{ $errors->first('nomor_pemberhentian') }}</span>
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
