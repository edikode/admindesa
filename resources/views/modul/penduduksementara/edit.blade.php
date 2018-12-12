@extends('layouts.template')

@section('title', 'Edit Data Penduduk Sementara')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Penduduk Sementara</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-penduduk-sementara') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-penduduk-sementara/'. $pd->id) }}" method="post" enctype="multipart/form-data">				
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
								<div class='form-group @if($errors->has('nomor_identitas')) has-error @endif'>
									<label class='control-label'>Nomor Identitas</label>
									<input type='text' placeholder='Nomor Identitas' class='form-control limited' id='nomor_identitas' name='nomor_identitas' maxlength='100' value='@if(count($errors) > 0){{old('nomor_identitas')}}@else{{$pd->nomor_identitas}}@endif'>

									@if ($errors->has('nomor_identitas'))
										<span for="nomor_identitas" class="help-block">{{ $errors->first('nomor_identitas') }}</span>
									@endif
								</div>				
								<div class="row">
									<div class="col-md-8">
										<div class='form-group @if($errors->has('tmp_lahir')) has-error @endif'>
											<label class='control-label'>Tempat Lahir</label>
											<input type='text' placeholder='Tempat Lahir' class='form-control limited' id='tmp_lahir' name='tmp_lahir' maxlength='100' value='@if(count($errors) > 0){{old('tmp_lahir')}}@else{{$pd->tmp_lahir}}@endif' required>

											@if ($errors->has('tmp_lahir'))
												<span for="tmp_lahir" class="help-block">{{ $errors->first('tmp_lahir') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class='form-group @if($errors->has('tgl_lahir')) has-error @endif'>
											<label class='control-label'>Tanggal Lahir</label>
											{{-- <div class="input-group">
												<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
												<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
											</div> --}}
											<input style="width:150px" type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="@if(count($errors) > 0){{old('tgl_lahir')}}@else{{$pd->tgl_lahir}}@endif" required>
										</div>
									</div>
								</div>
								<div class='form-group @if($errors->has('pekerjaan')) has-error @endif'>
									<label class='control-label'>Pekerjaan</label>
									<input type='text' placeholder='Pekerjaan' class='form-control limited' id='pekerjaan' name='pekerjaan' maxlength='100' value='@if(count($errors) > 0){{old('pekerjaan')}}@else{{$pd->pekerjaan}}@endif' required>

									@if ($errors->has('pekerjaan'))
										<span for="pekerjaan" class="help-block">{{ $errors->first('pekerjaan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('kewarganegaraan')) has-error @endif'>
									<label class='control-label'>Kewarganegaraan</label>
									<select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
										<option value="">--- Pilih ---</option>
										<option value="WNI" @if($pd->kewarganegaraan == "WNI") selected @endif>Warga Negara Indonesia</option>
										<option value="WNA" @if($pd->kewarganegaraan == "WNA") selected @endif>Warga Negara Asing</option>
									</select>

									@if ($errors->has('kewarganegaraan'))
										<span for="nik" class="help-block">{{ $errors->first('kewarganegaraan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('datang_dari')) has-error @endif'>
									<label class='control-label'>Datang Dari</label>
									<input type='text' placeholder='Datang Dari' class='form-control limited' id='datang_dari' name='datang_dari' maxlength='100' value='@if(count($errors) > 0){{old('pekerjaan')}}@else{{$pd->datang_dari}}@endif' required>

									@if ($errors->has('datang_dari'))
										<span for="datang_dari" class="help-block">{{ $errors->first('datang_dari') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('tujuan')) has-error @endif'>
									<label class='control-label'>Maksud dan Tujuan Kedatangan</label>
									<input type='text' placeholder='Maksud dan Tujuan Kedatangan' class='form-control limited' id='tujuan' name='tujuan' maxlength='100' value='@if(count($errors) > 0){{old('tujuan')}}@else{{$pd->tujuan}}@endif' required>

									@if ($errors->has('tujuan'))
										<span for="tujuan" class="help-block">{{ $errors->first('tujuan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('nama_didatangi')) has-error @endif'>
									<label class='control-label'>Nama yg Didatangi</label>
									<input type='text' placeholder='Nama yg Didatangi' class='form-control limited' id='nama_didatangi' name='nama_didatangi' maxlength='100' value='@if(count($errors) > 0){{old('nama_didatangi')}}@else{{$pd->nama_didatangi}}@endif' required>

									@if ($errors->has('nama_didatangi'))
										<span for="nama_didatangi" class="help-block">{{ $errors->first('nama_didatangi') }}</span>
									@endif
								</div>
								<div class='form-group'>
									<label class='control-label'>Alamat yg Didatangi</label>
									<textarea class='form-control limited' id='alamat_didatangi' cols='10' rows='4' name='alamat_didatangi' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('alamat_didatangi')}}@else{{$pd->alamat_didatangi}}@endif</textarea>
								</div>	
								<div class='form-group @if($errors->has('datang_tgl')) has-error @endif'>
									<label class='control-label'>Datang Tanggal</label>
									{{-- <div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div> --}}
									<input style="width:150px" type="date" name="datang_tgl" id="datang_tgl" class="form-control" value="@if(count($errors) > 0){{old('datang_tgl')}}@else{{$pd->datang_tgl}}@endif" required>
								</div>
								<div class='form-group @if($errors->has('pergi_tgl')) has-error @endif'>
									<label class='control-label'>Pergi tanggal</label>
									{{-- <div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div> --}}
									<input style="width:150px" type="date" name="pergi_tgl" id="pergi_tgl" class="form-control" value="@if(count($errors) > 0){{old('pergi_tgl')}}@else{{$pd->pergi_tgl}}@endif" required>
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
