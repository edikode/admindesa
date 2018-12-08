@extends('layouts.template')

@section('title', 'Edit Data Ekspedisi')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Ekspedisi</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-ekspedisi') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-ekspedisi/'. $pd->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('tanggal_pengiriman')) has-error @endif'>
									<label class='control-label'>Tanggal Pengiriman</label>
									{{-- <div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div> --}}
									<input style="" type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control" value="@if(count($errors) > 0){{old('tanggal_pengiriman')}}@else{{$pd->tanggal_pengiriman}}@endif" required>
								</div>
								<div class='form-group @if($errors->has('tanggal_surat')) has-error @endif'>
									<label class='control-label'>Tanggal Dan Nomor Surat</label>
									<input type='text' placeholder='Tanggal Dan Nomor Surat' class='form-control limited' id='tanggal_surat' name='tanggal_surat' maxlength='100' value='@if(count($errors) > 0){{old('tanggal_surat')}}@else{{$pd->tanggal_surat}}@endif'
									required>

									@if ($errors->has('tanggal_surat'))
										<span for="tanggal_surat" class="help-block">{{ $errors->first('tanggal_surat') }}</span>
									@endif
								</div>	
								<div class='form-group'>
									<label class='control-label'>Isi Singkat Surat yang Dikirim</label>
									<textarea class='form-control limited' id='isi' cols='10' rows='4' name='isi' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('isi')}}@else{{$pd->isi}}@endif</textarea>
								</div>	
								<div class='form-group @if($errors->has('tujuan')) has-error @endif'>
									<label class='control-label'>Ditujukan Kepada</label>
									<input type='text' placeholder='Ditujukan Kepada' class='form-control limited' id='tujuan' name='tujuan' maxlength='100' value='@if(count($errors) > 0){{old('tujuan')}}@else{{$pd->tujuan}}@endif'
									required>

									@if ($errors->has('tujuan'))
										<span for="tujuan" class="help-block">{{ $errors->first('tujuan') }}</span>
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
