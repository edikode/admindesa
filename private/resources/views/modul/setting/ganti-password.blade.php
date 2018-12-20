@extends('layouts.template')

@section('title', 'Ganti Password')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Ganti Password</li>
@endsection

@section('button')

	

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('setting/ganti-password') }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-6">
								<div class='form-group @if($errors->has('password')) has-error @endif'>
									<label class='control-label'>Password Lama</label>
									<input type='password' placeholder='Password Lama' class='form-control limited' id='password' name='password' maxlength='100' value='@if(count($errors) > 0){{old('password')}}@endif'
									required>
	
									@if ($errors->has('password'))
										<span for="password" class="help-block">{{ $errors->first('password') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('password_baru')) has-error @endif'>
									<label class='control-label'>Password Baru</label>
									<input type='password' placeholder='Password Baru' class='form-control limited' id='password_baru' name='password_baru' maxlength='100' value='@if(count($errors) > 0){{old('password_baru')}}@endif'
									required>
	
									@if ($errors->has('password_baru'))
										<span for="password_baru" class="help-block">{{ $errors->first('password_baru') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('password_ulangi')) has-error @endif'>
									<label class='control-label'>Ulangi Password Baru</label>
									<input type='password' placeholder='Ulangi Password Baru' class='form-control limited' id='password_ulangi' name='password_ulangi' maxlength='100' value='@if(count($errors) > 0){{old('password_ulangi')}}@endif'
									required>
	
									@if ($errors->has('password_ulangi'))
										<span for="password_ulangi" class="help-block">{{ $errors->first('password_ulangi') }}</span>
									@endif
								</div>
								
							</div>
							<div class="col-md-6">
								
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								{{ csrf_field() }}
								<input name="simpan" value="Simpan" type="submit" class="btn btn-green"> &nbsp;
								<a class="btn btn-large btn-red" href="{{ url('setting') }}">Kembali</a>
							</div>
						</div>							
					</form>
				</div>
			</div>				
		</div>		
	</div>

@endsection
