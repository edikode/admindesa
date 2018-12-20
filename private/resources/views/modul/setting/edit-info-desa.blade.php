@extends('layouts.template')

@section('title', 'Edit Data Informasi Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Informasi Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('setting') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('setting/info-desa') }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-6">
								<div class='form-group @if($errors->has('nama_desa')) has-error @endif'>
									<label class='control-label'>Nama Desa</label>
									<input type='text' placeholder='Nama Desa' class='form-control limited' id='nama_desa' name='nama_desa' maxlength='100' value='@if(count($errors) > 0){{old('nama_desa')}}@else{{$setting->nama_desa}}@endif'
									required>
	
									@if ($errors->has('nama_desa'))
										<span for="nama_desa" class="help-block">{{ $errors->first('nama_desa') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('kode_desa')) has-error @endif'>
									<label class='control-label'>Kode Desa</label>
									<input type='text' placeholder='Kode Desa' class='form-control limited' id='kode_desa' name='kode_desa' maxlength='100' value='@if(count($errors) > 0){{old('kode_desa')}}@else{{$setting->kode_desa}}@endif'
									required>
	
									@if ($errors->has('kode_desa'))
										<span for="kode_desa" class="help-block">{{ $errors->first('kode_desa') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('kode_pos')) has-error @endif'>
									<label class='control-label'>Kode Pos</label>
									<input type='text' placeholder='Kode Pos' class='form-control limited' id='kode_pos' name='kode_pos' maxlength='10' value='@if(count($errors) > 0){{old('kode_pos')}}@else{{$setting->kode_pos}}@endif'
									required>
	
									@if ($errors->has('kode_pos'))
										<span for="kode_pos" class="help-block">{{ $errors->first('kode_pos') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('nama_kades')) has-error @endif'>
									<label class='control-label'>Nama Kepala Desa</label>
									<input type='text' placeholder='Nama Kepala Desa' class='form-control limited' id='nama_kades' name='nama_kades' maxlength='100' value='@if(count($errors) > 0){{old('nama_kades')}}@else{{$setting->nama_kades}}@endif'
									required>
	
									@if ($errors->has('nama_kades'))
										<span for="nama_kades" class="help-block">{{ $errors->first('nama_kades') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('nip_kades')) has-error @endif'>
									<label class='control-label'>NIP Kepala Desa</label>
									<input type='text' placeholder='NIP Kepala Desa' class='form-control limited' id='nip_kades' name='nip_kades' maxlength='100' value='@if(count($errors) > 0){{old('nip_kades')}}@else{{$setting->nip_kades}}@endif'
									required>
	
									@if ($errors->has('nip_kades'))
										<span for="nip_kades" class="help-block">{{ $errors->first('nip_kades') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('telepon')) has-error @endif'>
									<label class='control-label'>Telepon Kantor</label>
									<input type='text' placeholder='Telepon Kantor' class='form-control limited' id='telepon' name='telepon' maxlength='13' value='@if(count($errors) > 0){{old('telepon')}}@else{{$setting->telepon}}@endif'
									required>
	
									@if ($errors->has('telepon'))
										<span for="telepon" class="help-block">{{ $errors->first('telepon') }}</span>
									@endif
								</div>
								<div class='form-group'>
									<label class='control-label'>Alamat Kantor</label>
									<textarea class='form-control limited' id='alamat_kantor' cols='10' rows='4' name='alamat_kantor' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('alamat_kantor')}}@else{{$setting->alamat_kantor}}@endif</textarea>
								</div>	
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Logo Desa</label>
									@if($setting->logo_desa)
										@if(file_exists("upload/gambar/". $setting->logo_desa))
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="max-width:334px;  position:relative;">
													<div class="hapus-gambar">
														<a data-original-title="Hapus" data-placement="left" class="btn btn-bricky tooltips" href="{{ url('setting/hapuslogodesa/') }}" onclick="return hapusgambar()">
															<i class="clip-close"></i>
														</a>
													</div>
													<img src="{{ url('/upload/gambar/'. $setting->logo_desa) }}">
												</div>										
											</div>
										@else
											<div class='successHandler alert alert-danger display'>
												<i class='glyphicon glyphicon-remove'></i> Error. Gambar Kosong. Silahkan upload lagi.
											</div>
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="max-width:334px;"><img src="{{ asset('assets/images/400x300.jpg') }}" alt=""/>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;"></div>
												<div>
													<span class="btn btn-orange btn-file"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Ganti</span>
														<input type="file" name="logo_desa">
													</span>
													<a href="#" class="btn fileupload-exists btn-orange" data-dismiss="fileupload">
														Hapus
													</a>
												</div>
											</div>	
										@endif
									@else
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="max-width:334px;"><img src="{{ asset('assets/images/400x300.jpg') }}" alt=""/>
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;"></div>
										<div>
											<span class="btn btn-orange btn-file"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Ganti</span>
												<input type="file" name="logo_desa">
											</span>
											<a href="#" class="btn fileupload-exists btn-orange" data-dismiss="fileupload">
												Hapus
											</a>
										</div>
									</div>
									@endif
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								{{ csrf_field() }}
								<input name="simpan" value="Simpan" type="submit" class="btn btn-green fright">
							</div>
						</div>							
					</form>
				</div>
			</div>				
		</div>		
	</div>

@endsection
