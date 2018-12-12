@extends('layouts.template')

@section('title', 'Edit Data Lembaran Desa dan Berita Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Lembaran Desa dan Berita Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-lembaran-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-lembaran-desa/'. $ld->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('jenis')) has-error @endif'>
									<label class='control-label'>Jenis</label>
									<input type='text' placeholder='Jenis' class='form-control limited' id='jenis' name='jenis' maxlength='100' value='@if(count($errors) > 0){{old('jenis')}}@else{{$ld->jenis}}@endif'
									required>

									@if ($errors->has('jenis'))
										<span for="jenis" class="help-block">{{ $errors->first('jenis') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('nomor_ditetapkan')) has-error @endif'>
									<label class='control-label'>Nomor Ditetapkan</label>
									<input type='text' placeholder='Nomor Ditetapkan' class='form-control limited' id='nomor_ditetapkan' name='nomor_ditetapkan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_ditetapkan')}}@else{{$ld->nomor_ditetapkan}}@endif' required>
									
									@if ($errors->has('nomor_ditetapkan'))
										<span for="nomor_ditetapkan" class="help-block">{{ $errors->first('nomor_ditetapkan') }}</span>
									@endif
								</div>					
								<div class='form-group'>
									<label class='control-label'>Tentang</label>
									<textarea class='form-control limited' id='tentang' cols='10' rows='4' name='tentang' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('tentang')}}@else{{$ld->tentang}}@endif</textarea>
								</div>
								<div class='form-group @if($errors->has('tanggal_diundangkan')) has-error @endif'>
									<label class='control-label'>Tanggal Diundangkan</label>
									{{-- <div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div> --}}
									<input style="width:150px" type="date" name="tanggal_diundangkan" id="tanggal_diundangkan" class="form-control" value="@if(count($errors) > 0){{old('tanggal_diundangkan')}}@else{{$ld->tanggal_diundangkan}}@endif" required>
								</div>
								<div class='form-group @if($errors->has('nomor_diundangkan')) has-error @endif'>
									<label class='control-label'>Nomor Diundangkan</label>
									<input type='text' placeholder='Nomor Diundangkan' class='form-control limited' id='nomor_diundangkan' name='nomor_diundangkan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_diundangkan')}}@else{{$ld->nomor_diundangkan}}@endif'
									required>

									@if ($errors->has('nomor_diundangkan'))
										<span for="nomor_diundangkan" class="help-block">{{ $errors->first('nomor_diundangkan') }}</span>
									@endif
								</div>	
								<div class='form-group'>
									<label class='control-label'>Keterangan</label>
									<textarea class='form-control limited' id='keterangan' cols='10' rows='4' name='keterangan' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('keterangan')}}@else{{$ld->keterangan}}@endif</textarea>
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
