@extends('layouts.template')

@section('title', 'Edit Data Aparat Pemerintah Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Aparat Pemerintah Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-aparat-pemerintah-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-aparat-pemerintah-desa/'. $pd->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nama')) has-error @endif'>
									<label class='control-label'>Nama</label>
									<input type='text' placeholder='Nama' class='form-control limited' id='nama' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@else{{$pd->nama}}@endif'
									required>

									@if ($errors->has('nama'))
										<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
									@endif
								</div>					
								<div class='form-group @if($errors->has('niap')) has-error @endif'>
									<label class='control-label'>NIAP</label>
									<input type='text' placeholder='NIAP' class='form-control limited' id='niap' name='niap' maxlength='100' value='@if(count($errors) > 0){{old('niap')}}@else{{$pd->niap}}@endif'>

									@if ($errors->has('niap'))
										<span for="niap" class="help-block">{{ $errors->first('niap') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('nip')) has-error @endif'>
									<label class='control-label'>NIP</label>
									<input type='text' placeholder='NIP' class='form-control limited' id='nip' name='nip' maxlength='100' value='@if(count($errors) > 0){{old('nip')}}@else{{$pd->nip}}@endif'>

									@if ($errors->has('nip'))
										<span for="nip" class="help-block">{{ $errors->first('nip') }}</span>
									@endif
								</div>

								<div class='form-group @if($errors->has('jenis_kelamin')) has-error @endif'>
									<label class='control-label'>Jenis Kelamin</label>
									<br>
									<label class='radio-inline'>
										<input type='radio' name='jenis_kelamin' class='square-green' value='L' @if($pd->jenis_kelamin == "L") checked @endif>
										Laki-laki
									</label>
									<label class='radio-inline'>
										<input type='radio' name='jenis_kelamin' class='square-green' value='P' @if($pd->jenis_kelamin == "P") checked @endif>
										Perempuan
									</label>

									@if ($errors->has('jenis_kelamin'))
										<span for="jenis_kelamin" class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
									@endif
								</div>
								

								<div class='form-group @if($errors->has('ttl')) has-error @endif'>
									<label class='control-label'>Tempat, Tanggal Lahir</label>
									<input type='text' placeholder='Tempat, Tanggal Lahir' class='form-control limited' id='ttl' name='ttl' maxlength='100' value='@if(count($errors) > 0){{old('ttl')}}@else{{$pd->ttl}}@endif' required>

									@if ($errors->has('ttl'))
										<span for="ttl" class="help-block">{{ $errors->first('ttl') }}</span>
									@endif
								</div>					
								<div class='form-group @if($errors->has('agama')) has-error @endif'>
									<label class='control-label'>Agama</label>
									<select name="agama" id="agama" class="form-control" required>
										<option value="">--- Pilih ---</option>
										<option value="Islam" @if($pd->agama == "Islam") selected @endif>Islam</option>
										<option value="Kritsten" @if($pd->agama == "Kritsten") selected @endif>Kritsten</option>
										<option value="Katolik" @if($pd->agama == "Katolik") selected @endif>Katolik</option>
										<option value="Hindu" @if($pd->agama == "Hindu") selected @endif>Hindu</option>
										<option value="Budha" @if($pd->agama == "Budha") selected @endif>Budha</option>
										<option value="Lainnya" @if($pd->agama == "Lainnya") selected @endif>Lainnya</option>
									</select>

									@if ($errors->has('agama'))
										<span for="agama" class="help-block">{{ $errors->first('agama') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('pangkat')) has-error @endif'>
									<label class='control-label'>Pangkat</label>
									<input type='text' placeholder='Pangkat' class='form-control limited' id='pangkat' name='pangkat' maxlength='100' value='@if(count($errors) > 0){{old('pangkat')}}@else{{$pd->pangkat}}@endif' required>

									@if ($errors->has('pangkat'))
										<span for="pangkat" class="help-block">{{ $errors->first('pangkat') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('jabatan')) has-error @endif'>
									<label class='control-label'>Jabatan</label>
									<input type='text' placeholder='Jabatan' class='form-control limited' id='jabatan' name='jabatan' maxlength='100' value='@if(count($errors) > 0){{old('jabatan')}}@else{{$pd->jabatan}}@endif' required>

									@if ($errors->has('jabatan'))
										<span for="jabatan" class="help-block">{{ $errors->first('jabatan') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('pendidikan_terakhir')) has-error @endif'>
									<label class='control-label'>Pendidikan Terakhir</label>
									<input type='text' placeholder='Pendidikan Terakhir' class='form-control limited' id='pendidikan_terakhir' name='pendidikan_terakhir' maxlength='100' value='@if(count($errors) > 0){{old('pendidikan_terakhir')}}@else{{$pd->pendidikan_terakhir}}@endif' required>

									@if ($errors->has('pendidikan_terakhir'))
										<span for="pendidikan_terakhir" class="help-block">{{ $errors->first('pendidikan_terakhir') }}</span>
									@endif
								</div>	
									
								<div class='form-group @if($errors->has('nomor_pengangkatan')) has-error @endif'>
									<label class='control-label'>Nomor Pengangkatan</label>
									<input type='text' placeholder='Nomor Pengangkatan' class='form-control limited' id='nomor_pengangkatan' name='nomor_pengangkatan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_pengangkatan')}}@else{{$pd->nomor_pengangkatan}}@endif'
									required>

									@if ($errors->has('nomor_pengangkatan'))
										<span for="nomor_pengangkatan" class="help-block">{{ $errors->first('nomor_pengangkatan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('nomor_pemberhentian')) has-error @endif'>
									<label class='control-label'>Nomor Pemberhentian</label>
									<input type='text' placeholder='Nomor Pemberhentian' class='form-control limited' id='nomor_pemberhentian' name='nomor_pemberhentian' maxlength='100' value='@if(count($errors) > 0){{old('nomor_pemberhentian')}}@else{{$pd->nomor_pemberhentian}}@endif'>

									@if ($errors->has('nomor_pemberhentian'))
										<span for="nomor_pemberhentian" class="help-block">{{ $errors->first('nomor_pemberhentian') }}</span>
									@endif
								</div>	
								<div class='form-group'>
									<label class='control-label'>Keterangan</label>
									<textarea class='form-control limited' id='keterangan' cols='10' rows='4' name='keterangan' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('keterangan')}}@else{{$pd->keterangan}}@endif</textarea>
								</div>				
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PUT">
								<input name="simpan" value="Simpan" type="submit" class="btn btn-green fright">
							</div>
						</div>							
					</form>
				</div>
			</div>				
		</div>		
	</div>

@endsection
