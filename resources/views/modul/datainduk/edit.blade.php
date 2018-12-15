@extends('layouts.template')

@section('title', 'Edit Data Induk Penduduk Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Induk Penduduk Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-induk-penduduk-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-induk-penduduk-desa/'. $pd->id) }}" method="post" enctype="multipart/form-data">				
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
								<div class='form-group @if($errors->has('status')) has-error @endif'>
									<label class='control-label'>Status Perkawinan</label>
									<select name="status" id="status" class="form-control" required>
										<option value="">--- Pilih ---</option>
										<option value="K" @if($pd->status == "K") selected @endif>Kawin</option>
										<option value="BK" @if($pd->status == "BK") selected @endif>Belum Kawin</option>
										<option value="JD" @if($pd->status == "JD") selected @endif>Janda</option>
										<option value="DD" @if($pd->status == "DD") selected @endif>Duda</option>
									</select>

									@if ($errors->has('status'))
										<span for="status" class="help-block">{{ $errors->first('status') }}</span>
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
											<div class="input-group">
												<input name="tgl_lahir" placeholder="Tanggal Lahir" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_lahir')}}@else{{tgl_id($pd->tgl_lahir)}}@endif" required>
												<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
											</div>

											@if ($errors->has('tgl_lahir'))
												<span for="tgl_lahir" class="help-block">{{ $errors->first('tgl_lahir') }}</span>
											@endif
										</div>
									</div>
								</div>
													
								<div class='form-group @if($errors->has('agama')) has-error @endif'>
									<label class='control-label'>Agama</label>
									<select name="agama" id="agama" class="form-control" required>
										<option value="">--- Pilih ---</option>
										<option value="Islam" @if($pd->agama == "Islam") selected @endif>Islam</option>
										<option value="Kritsten" @if($pd->agama == "Kristen") selected @endif>Kritsten</option>
										<option value="Katolik" @if($pd->agama == "Katolik") selected @endif>Katolik</option>
										<option value="Hindu" @if($pd->agama == "Hindu") selected @endif>Hindu</option>
										<option value="Budha" @if($pd->agama == "Budha") selected @endif>Budha</option>
										<option value="Lainnya" @if($pd->agama == "Lainnya") selected @endif>Lainnya</option>
									</select>

									@if ($errors->has('agama'))
										<span for="agama" class="help-block">{{ $errors->first('agama') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('pendidikan_terakhir')) has-error @endif'>
									<label class='control-label'>Pendidikan Terakhir</label>
									<input type='text' placeholder='Pendidikan Terakhir' class='form-control limited' id='pendidikan_terakhir' name='pendidikan_terakhir' maxlength='100' value='@if(count($errors) > 0){{old('pendidikan_terakhir')}}@else{{$pd->pendidikan_terakhir}}@endif' required>

									@if ($errors->has('pendidikan_terakhir'))
										<span for="pendidikan_terakhir" class="help-block">{{ $errors->first('pendidikan_terakhir') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('pekerjaan')) has-error @endif'>
									<label class='control-label'>Pekerjaan</label>
									<input type='text' placeholder='Pekerjaan' class='form-control limited' id='pekerjaan' name='pekerjaan' maxlength='100' value='@if(count($errors) > 0){{old('pekerjaan')}}@else{{$pd->pekerjaan}}@endif' required>

									@if ($errors->has('pekerjaan'))
										<span for="pekerjaan" class="help-block">{{ $errors->first('pekerjaan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('dapat_membaca')) has-error @endif'>
									<label class='control-label'>Dapat Membaca Huruf</label>
									<select name="dapat_membaca" id="dapat_membaca" class="form-control" required>
										<option value="">--- Pilih ---</option>
										<option value="L" @if($pd->dapat_membaca == "L") selected @endif> latin</option>
										<option value="D" @if($pd->dapat_membaca == "D") selected @endif>Daerah</option>
										<option value="A" @if($pd->dapat_membaca == "A") selected @endif>Arab</option>
										<option value="AL" @if($pd->dapat_membaca == "AL") selected @endif>Arab dan Latin</option>
										<option value="AD" @if($pd->dapat_membaca == "AD") selected @endif>Arab dan Daerah</option>
										<option value="ALD" @if($pd->dapat_membaca == "ALD") selected @endif>Arab, Latin, Daerah</option>
									</select>

									@if ($errors->has('dapat_membaca'))
										<span for="dapat_membaca" class="help-block">{{ $errors->first('dapat_membaca') }}</span>
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
								<div class="row">
									<div class="col-md-4">
										<div class='form-group @if($errors->has('rtrw')) has-error @endif'>
											<label class='control-label'>RT/RW</label>
											<input type='text' placeholder='RT/RW' class='form-control limited' id='rtrw' name='rtrw' maxlength='100' value='@if(count($errors) > 0){{old('rtrw')}}@else{{$pd->rtrw}}@endif'
											required>

											@if ($errors->has('rtrw'))
												<span for="rtrw" class="help-block">{{ $errors->first('rtrw') }}</span>
											@endif
										</div>	
									</div>
									<div class="col-md-4">
										<div class='form-group @if($errors->has('dusun')) has-error @endif'>
											<label class='control-label'>Dusun</label>
											<input type='text' placeholder='Dusun' class='form-control limited' id='dusun' name='dusun' maxlength='100' value='@if(count($errors) > 0){{old('dusun')}}@else{{$pd->dusun}}@endif'
											required>

											@if ($errors->has('dusun'))
												<span for="dusun" class="help-block">{{ $errors->first('dusun') }}</span>
											@endif
										</div>	
									</div>
									<div class="col-md-4">
										<div class='form-group @if($errors->has('desa')) has-error @endif'>
											<label class='control-label'>Desa</label>
											<input type='text' placeholder='Desa' class='form-control limited' id='desa' name='desa' maxlength='100' value='@if(count($errors) > 0){{old('desa')}}@else{{$pd->desa}}@endif'
											required>

											@if ($errors->has('desa'))
												<span for="desa" class="help-block">{{ $errors->first('desa') }}</span>
											@endif
										</div>	
									</div>
									<div class="col-md-4">
										<div class='form-group @if($errors->has('kecamatan')) has-error @endif'>
											<label class='control-label'>Kecamatan</label>
											<input type='text' placeholder='Kecamatan' class='form-control limited' id='kecamatan' name='kecamatan' maxlength='100' value='@if(count($errors) > 0){{old('kecamatan')}}@else{{$pd->kecamatan}}@endif'
											required>

											@if ($errors->has('kecamatan'))
												<span for="kecamatan" class="help-block">{{ $errors->first('kecamatan') }}</span>
											@endif
										</div>	
									</div>
									<div class="col-md-4">
										<div class='form-group @if($errors->has('kabupaten')) has-error @endif'>
											<label class='control-label'>Kabupaten</label>
											<input type='text' placeholder='Kabupaten' class='form-control limited' id='kabupaten' name='kabupaten' maxlength='100' value='@if(count($errors) > 0){{old('kabupaten')}}@else{{$pd->kabupaten}}@endif'
											required>

											@if ($errors->has('kabupaten'))
												<span for="kabupaten" class="help-block">{{ $errors->first('kabupaten') }}</span>
											@endif
										</div>	
									</div>
									<div class="col-md-4">
										<div class='form-group @if($errors->has('kodepos')) has-error @endif'>
											<label class='control-label'>Kode Pos</label>
											<input type='text' placeholder='Kode Pos' class='form-control limited' id='kodepos' name='kodepos' maxlength='100' value='@if(count($errors) > 0){{old('kodepos')}}@else{{$pd->kodepos}}@endif'
											required>

											@if ($errors->has('kodepos'))
												<span for="kodepos" class="help-block">{{ $errors->first('kodepos') }}</span>
											@endif
										</div>	
									</div>
								</div>
								<div class='form-group'>
									<label class='control-label'>Alamat Lengkap</label>
									<textarea class='form-control limited' id='alamat' cols='10' rows='4' name='alamat' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('alamat')}}@else{{$pd->alamat}}@endif</textarea>
								</div>	
								<div class='form-group @if($errors->has('kedudukan')) has-error @endif'>
									<label class='control-label'>Kedudukan dalam Keluarga</label>
									<select name="kedudukan" id="kedudukan" class="form-control" required>
										<option value="">--- Pilih ---</option>
										<option value="KK" @if($pd->kedudukan == "KK") selected @endif>Kepala Keluarga</option>
										<option value="Ist" @if($pd->kedudukan == "Ist") selected @endif>Istri</option>
										<option value="AK" @if($pd->kedudukan == "AK") selected @endif>Anak Kandung</option>
										<option value="AA" @if($pd->kedudukan == "AA") selected @endif>Anak Angkat</option>
										<option value="Pemb" @if($pd->kedudukan == "Pemb") selected @endif>Pembantu</option>
									</select>

									@if ($errors->has('kedudukan'))
										<span for="kedudukan" class="help-block">{{ $errors->first('kedudukan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('nik')) has-error @endif'>
									<label class='control-label'>NIK</label>
									<input type='text' placeholder='NIK' class='form-control limited' id='nik' name='nik' maxlength='100' value='@if(count($errors) > 0){{old('nik')}}@else{{$pd->nik}}@endif'>

									@if ($errors->has('nik'))
										<span for="nik" class="help-block">{{ $errors->first('nik') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('no_kk')) has-error @endif'>
									<label class='control-label'>No KK</label>
									<input type='text' placeholder='No KK' class='form-control limited' id='no_kk' name='no_kk' maxlength='100' value='@if(count($errors) > 0){{old('no_kk')}}@else{{$pd->no_kk}}@endif'>

									@if ($errors->has('no_kk'))
										<span for="no_kk" class="help-block">{{ $errors->first('no_kk') }}</span>
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
