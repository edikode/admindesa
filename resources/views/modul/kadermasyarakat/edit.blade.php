@extends('layouts.template')

@section('title', 'Edit Data Kader Pemberdayaan Masyarakat')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Kader Pemberdayaan Masyarakat</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('kader-pendamping-masyarakat') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('kader-pendamping-masyarakat/'. $pd->id) }}" method="post" enctype="multipart/form-data">				
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
								<div class='form-group @if($errors->has('umur')) has-error @endif'>
									<label class='control-label'>Umur</label>
									<input type='text' placeholder='Umur' class='form-control limited' id='umur' name='umur' maxlength='100' value='@if(count($errors) > 0){{old('umur')}}@else{{$pd->umur}}@endif'
									required>

									@if ($errors->has('umur'))
										<span for="umur" class="help-block">{{ $errors->first('umur') }}</span>
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
								<div class='form-group @if($errors->has('pendidikan')) has-error @endif'>
									<label class='control-label'>Pendidikan/Kursus</label>
									<input type='text' placeholder='Pendidikan/Kursus' class='form-control limited' id='pendidikan' name='pendidikan' maxlength='100' value='@if(count($errors) > 0){{old('pendidikan')}}@else{{$pd->pendidikan}}@endif'
									required>

									@if ($errors->has('pendidikan'))
										<span for="pendidikan" class="help-block">{{ $errors->first('pendidikan') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('bidang')) has-error @endif'>
									<label class='control-label'>Bidang</label>
									<input type='text' placeholder='Bidang' class='form-control limited' id='bidang' name='bidang' maxlength='100' value='@if(count($errors) > 0){{old('bidang')}}@else{{$pd->bidang}}@endif'
									required>

									@if ($errors->has('bidang'))
										<span for="bidang" class="help-block">{{ $errors->first('bidang') }}</span>
									@endif
								</div>		
								<div class='form-group'>
									<label class='control-label'>Alamat</label>
									<textarea class='form-control limited' id='alamat' cols='10' rows='4' name='alamat' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('alamat')}}@else{{$pd->alamat}}@endif</textarea>
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
