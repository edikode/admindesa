@extends('layouts.template')

@section('title', 'Edit Data Peraturan Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Peraturan Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-peraturan-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-peraturan-desa/'. $data->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('jenis')) has-error @endif'>
									<label class='control-label'>Jenis</label>
									<input type='text' placeholder='Jenis' class='form-control limited' id='jenis' name='jenis' maxlength='100' value='@if(count($errors) > 0){{old('jenis')}}@else{{$data->jenis}}@endif'
									required>

									@if ($errors->has('jenis'))
										<span for="jenis" class="help-block">{{ $errors->first('jenis') }}</span>
									@endif
								</div>					
								<div class='form-group @if($errors->has('nomor_ditetapkan')) has-error @endif'>
									<label class='control-label'>Nomor Ditetapkan</label>
									<input type='text' placeholder='Nomor Ditetapkan' class='form-control limited' id='nomor_ditetapkan' name='nomor_ditetapkan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_ditetapkan')}}@else{{$data->nomor_ditetapkan}}@endif'
									required>

									@if ($errors->has('nomor_ditetapkan'))
										<span for="nomor_ditetapkan" class="help-block">{{ $errors->first('nomor_ditetapkan') }}</span>
									@endif
								</div>					
								<div class='form-group'>
									<label class='control-label'>Tentang</label>
									<textarea class='form-control limited' id='tentang' cols='10' rows='4' name='tentang' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('tentang')}}@else{{$data->tentang}}@endif</textarea>
								</div>
								<div class='form-group'>
									<label class='control-label'>Uraian Singkat</label>
									<textarea class='form-control limited' id='uraian' cols='10' rows='4' name='uraian' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('uraian')}}@else{{$data->uraian}}@endif</textarea>
								</div>
								<div class='form-group @if($errors->has('tanggal_kesepakatan')) has-error @endif'>
									<label class='control-label'>Tanggal Kesepakatan</label>
									<div class="input-group">
										<input name="tanggal_kesepakatan" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tanggal_kesepakatan')}}@else{{tgl_id($data->tanggal_kesepakatan)}}@endif" placeholder="Tanggal Kesepakatan" required autocomplete="off">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div>

									@if ($errors->has('tanggal_kesepakatan'))
										<span for="tanggal_kesepakatan" class="help-block">{{ $errors->first('tanggal_kesepakatan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('tanggal_dilaporkan')) has-error @endif'>
									<label class='control-label'>Nomor dan Tanggal Dilaporkan</label>
									<input type='text' placeholder='Nomor dan Tanggal Dilaporkan' class='form-control limited' id='tanggal_dilaporkan' name='tanggal_dilaporkan' maxlength='100' value='@if(count($errors) > 0){{old('tanggal_dilaporkan')}}@else{{$data->tanggal_dilaporkan}}@endif'
									required>

									@if ($errors->has('tanggal_dilaporkan'))
										<span for="tanggal_dilaporkan" class="help-block">{{ $errors->first('tanggal_dilaporkan') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('tanggal_diundang')) has-error @endif'>
									<label class='control-label'>Nomor dan Tanggal Diundang</label>
									<input type='text' placeholder='Nomor dan Tanggal Diundang' class='form-control limited' id='tanggal_diundang' name='tanggal_diundang' maxlength='100' value='@if(count($errors) > 0){{old('tanggal_diundang')}}@else{{$data->tanggal_diundang}}@endif'
									required>

									@if ($errors->has('tanggal_diundang'))
										<span for="tanggal_diundang" class="help-block">{{ $errors->first('tanggal_diundang') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('tanggal_berita_desa')) has-error @endif'>
									<label class='control-label'>Nomor dan Tanggal Berita Desa</label>
									<input type='text' placeholder='Nomor dan Tanggal Berita Desa' class='form-control limited' id='tanggal_berita_desa' name='tanggal_berita_desa' maxlength='100' value='@if(count($errors) > 0){{old('tanggal_berita_desa')}}@else{{$data->tanggal_berita_desa}}@endif'
									required>

									@if ($errors->has('tanggal_berita_desa'))
										<span for="tanggal_berita_desa" class="help-block">{{ $errors->first('tanggal_berita_desa') }}</span>
									@endif
								</div>	
								<div class='form-group'>
									<label class='control-label'>Keterangan</label>
									<textarea class='form-control limited' id='keterangan' cols='10' rows='4' name='keterangan' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('keterangan')}}@else{{$data->keterangan}}@endif</textarea>
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
