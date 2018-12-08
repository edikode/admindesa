@extends('layouts.template')

@section('title', 'Edit Data Agenda')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Agenda</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-agenda') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-agenda/'. $pd->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('jenis')) has-error @endif'>
									<label class='control-label'>Jenis Surat</label>
									<select name="jenis" id="jenis" class="form-control" required>
										<option value="">--- Pilih ---</option>
										<option value="Surat Masuk" @if($pd->jenis == "Surat Masuk") selected @endif>Surat Masuk</option>
										<option value="Surat Keluar" @if($pd->jenis == "Surat Keluar") selected @endif>Surat Keluar</option>
									</select>

									@if ($errors->has('agama'))
										<span for="agama" class="help-block">{{ $errors->first('agama') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('tanggal_surat')) has-error @endif'>
									<label class='control-label'>Tanggal Penerimaan/ Pengiriman Surat</label>
									{{-- <div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div> --}}
									<input style="" type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" value="@if(count($errors) > 0){{old('tanggal_surat')}}@else{{$pd->tanggal_surat}}@endif" required>
								</div>
								<div class='form-group @if($errors->has('nomor')) has-error @endif'>
									<label class='control-label'>Nomor</label>
									<input type='text' placeholder='Nomor' class='form-control limited' id='nomor' name='nomor' maxlength='100' value='@if(count($errors) > 0){{old('nomor')}}@else{{$pd->nomor}}@endif'
									required>

									@if ($errors->has('nomor'))
										<span for="nomor" class="help-block">{{ $errors->first('nomor') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('tanggal')) has-error @endif'>
									<label class='control-label'>Tanggal</label>
									{{-- <div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div> --}}
									<input style="" type="date" name="tanggal" id="tanggal" class="form-control" value="@if(count($errors) > 0){{old('tanggal')}}@else{{$pd->tanggal}}@endif" required>
								</div>				
								<div class='form-group @if($errors->has('pengirim')) has-error @endif'>
									<label class='control-label'>Pengirim/Penerima</label>
									<input type='text' placeholder='Pengirim/Penerima' class='form-control limited' id='pengirim' name='pengirim' maxlength='100' value='@if(count($errors) > 0){{old('pengirim')}}@else{{$pd->pengirim}}@endif'>

									@if ($errors->has('pengirim'))
										<span for="pengirim" class="help-block">{{ $errors->first('pengirim') }}</span>
									@endif
								</div>
								<div class='form-group'>
									<label class='control-label'>Isi Singkat</label>
									<textarea class='form-control limited' id='isi' cols='10' rows='4' name='isi' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('isi')}}@else{{$pd->isi}}@endif</textarea>
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
