@extends('layouts.template')

@section('title', 'Edit Data Pengguna')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Pengguna</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('setting') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('setting/pengguna') }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-6">
								<div class='form-group @if($errors->has('name')) has-error @endif'>
									<label class='control-label'>Nama Admin</label>
									<input type='text' placeholder='Nama Admin' class='form-control limited' id='name' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@else{{$setting->name}}@endif'
									required>

									@if ($errors->has('nama'))
										<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('email')) has-error @endif'>
									<label class='control-label'>Email</label>
									<input type='email' placeholder='Email yang Sudah Aktif' class='form-control limited' id='email' name='email' maxlength='100' value='@if(count($errors) > 0){{old('email')}}@else{{$setting->email}}@endif'
									required>
	
									@if ($errors->has('email'))
										<span for="email" class="help-block">{{ $errors->first('email') }}</span>
									@endif
								</div>					
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Foto Admin</label>
									@if($setting->foto)
										@if(file_exists("upload/gambar/". $setting->foto))
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="max-width:334px; position:relative;">
													<div class="hapus-gambar">
														<a data-original-title="Hapus" data-placement="left" class="btn btn-bricky tooltips" href="{{ url('setting/hapusfotoadmin/') }}" onclick="return hapusgambar()">
															<i class="clip-close"></i>
														</a>
													</div>
													<img src="{{ url('/upload/gambar/'. $setting->foto) }}">
												</div>										
											</div>
										@else
											<div class='successHandler alert alert-danger display'>
												<i class='glyphicon glyphicon-remove'></i> Error. Gambar Kosong. Silahkan upload lagi.
											</div>
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="max-width:334px; max-height:253px;"><img src="{{ asset('assets/images/400x300.jpg') }}" alt=""/>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;"></div>
												<div>
													<span class="btn btn-orange btn-file"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Ganti</span>
														<input type="file" name="foto">
													</span>
													<a href="#" class="btn fileupload-exists btn-orange" data-dismiss="fileupload">
														Hapus
													</a>
												</div>
											</div>	
										@endif
									@else
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="max-width:334px; max-height:253px;"><img src="{{ asset('assets/images/400x300.jpg') }}" alt=""/>
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;"></div>
										<div>
											<span class="btn btn-orange btn-file"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Ganti</span>
												<input type="file" name="foto">
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
