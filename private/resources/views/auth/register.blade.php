@extends('layouts.login')

@section('main')
<div class="main-login col-sm-8 col-sm-offset-2">
        <div class="logo"><img src="{{asset('assets/images/logo.png')}}">
        </div>

        <div class="box-login">
            <h3>Registrasi</h3>  
            <p>Buat Akun Untuk Mulai menggunakan Aplikasi</p>
            <form action="{{url('simpan-registrasi')}}" method="post" enctype="multipart/form-data">
			    {{ csrf_field() }}

                @include('errors/pesan_muncul') 
                
                <fieldset>
                    <div class="row">
						<div class="col-md-6">
							<div class='form-group @if($errors->has('nama_desa')) has-error @endif'>
								<label class='control-label'>Nama Desa</label>
								<input type='text' placeholder='Nama Desa' class='form-control limited' id='nama_desa' name='nama_desa' maxlength='100' value='@if(count($errors) > 0){{old('nama_desa')}}@endif'
								required>

								@if ($errors->has('nama_desa'))
									<span for="nama_desa" class="help-block">{{ $errors->first('nama_desa') }}</span>
								@endif
							</div>
							<div class='form-group @if($errors->has('kode_desa')) has-error @endif'>
								<label class='control-label'>Kode Desa</label>
								<input type='text' placeholder='Kode Desa' class='form-control limited' id='kode_desa' name='kode_desa' maxlength='100' value='@if(count($errors) > 0){{old('kode_desa')}}@endif'
								required>

								@if ($errors->has('kode_desa'))
									<span for="kode_desa" class="help-block">{{ $errors->first('kode_desa') }}</span>
								@endif
							</div>
							<div class='form-group @if($errors->has('kode_pos')) has-error @endif'>
								<label class='control-label'>Kode Pos</label>
								<input type='text' placeholder='Kode Pos' class='form-control limited' id='kode_pos' name='kode_pos' maxlength='10' value='@if(count($errors) > 0){{old('kode_pos')}}@endif'
								required>

								@if ($errors->has('kode_pos'))
									<span for="kode_pos" class="help-block">{{ $errors->first('kode_pos') }}</span>
								@endif
							</div>
							<div class='form-group @if($errors->has('nama_kades')) has-error @endif'>
								<label class='control-label'>Nama Kepala Desa</label>
								<input type='text' placeholder='Nama Kepala Desa' class='form-control limited' id='nama_kades' name='nama_kades' maxlength='100' value='@if(count($errors) > 0){{old('nama_kades')}}@endif'
								required>

								@if ($errors->has('nama_kades'))
									<span for="nama_kades" class="help-block">{{ $errors->first('nama_kades') }}</span>
								@endif
							</div>
							<div class='form-group @if($errors->has('nip_kades')) has-error @endif'>
								<label class='control-label'>NIP Kepala Desa</label>
								<input type='text' placeholder='NIP Kepala Desa' class='form-control limited' id='nip_kades' name='nip_kades' maxlength='100' value='@if(count($errors) > 0){{old('nip_kades')}}@endif'
								required>

								@if ($errors->has('nip_kades'))
									<span for="nip_kades" class="help-block">{{ $errors->first('nip_kades') }}</span>
								@endif
							</div>
							<div class='form-group @if($errors->has('telepon')) has-error @endif'>
								<label class='control-label'>Telepon Kantor</label>
								<input type='text' placeholder='Telepon Kantor' class='form-control limited' id='telepon' name='telepon' maxlength='13' value='@if(count($errors) > 0){{old('telepon')}}@endif'
								required>

								@if ($errors->has('telepon'))
									<span for="telepon" class="help-block">{{ $errors->first('telepon') }}</span>
								@endif
							</div>
							<div class='form-group'>
								<label class='control-label'>Alamat Kantor</label>
								<textarea class='form-control limited' id='alamat_kantor' cols='10' rows='4' name='alamat_kantor' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('alamat_kantor')}}@endif</textarea>
							</div>	
							<div class="form-group">
								<label>Logo Desa</label>
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-new thumbnail" style="max-width:334px; max-height:253px;"><img src="{{ asset('assets/images/400x300.jpg') }}" alt=""/>
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
							</div>	
						</div>
						<div class="col-md-6">
							<div class='form-group @if($errors->has('nama')) has-error @endif'>
								<label class='control-label'>Nama Admin</label>
								<input type='text' placeholder='Nama' class='form-control limited' id='nama' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@endif'
								required>

								@if ($errors->has('nama'))
									<span for="nama" class="help-block">{{ $errors->first('name') }}</span>
								@endif
							</div>
							<div class='form-group @if($errors->has('email')) has-error @endif'>
								<label class='control-label'>Email</label>
								<input type='email' placeholder='Email yang Sudah Aktif' class='form-control limited' id='email' name='email' maxlength='100' value='@if(count($errors) > 0){{old('email')}}@endif'
								required>

								@if ($errors->has('email'))
									<span for="email" class="help-block">{{ $errors->first('email') }}</span>
								@endif
							</div>
							<div class='form-group @if($errors->has('password')) has-error @endif'>
								<label class='control-label'>Password</label>
								<input type='password' placeholder='Password Masuk Aplikasi' class='form-control limited' id='password' name='password' maxlength='100' value='@if(count($errors) > 0){{old('password')}}@endif'
								required>

								@if ($errors->has('password'))
									<span for="password" class="help-block">{{ $errors->first('password') }}</span>
								@endif
							</div>
							<div class="form-group">
								<label>Foto Admin</label>
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
							</div>
						</div>
					</div>
					<hr>
                    <div class="form-actions">   
						<a class="btn btn-orange" href="{{url('/login')}}">
                            <i class="fa fa-circle-arrow-left"></i> Kembali
                        </a>                        
                        <button name="submit" type="submit" class="btn btn-bricky pull-right">
                            Simpan <i class="icon-circle-arrow-right"></i>
                        </button>
                    </div>                      
                </fieldset>
            </form>
        </div>
        
        <div class="copyright">
            &copy; Aplikasi Administrasi Pemerintah Desa
        </div>

    </div>
@endsection

