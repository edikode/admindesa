@extends('layouts.template')

@section('title', 'Edit Data Keputusan Kepala Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Keputusan Kepala Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-keputusan-kepala-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-keputusan-kepala-desa/'. $kd->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nomor_keputusan')) has-error @endif'>
									<label class='control-label'>Nomor Keputusan</label>
									<input type='text' placeholder='Nomor Keputusan' class='form-control limited' id='nomor_keputusan' name='nomor_keputusan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_keputusan')}}@else{{$kd->nomor_keputusan}}@endif'
									required>

									@if ($errors->has('nomor_keputusan'))
										<span for="nomor_keputusan" class="help-block">{{ $errors->first('nomor_keputusan') }}</span>
									@endif
								</div>					
								<div class='form-group'>
									<label class='control-label'>Tentang</label>
									<textarea class='form-control limited' id='tentang' cols='10' rows='4' name='tentang' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('tentang')}}@else{{$kd->tentang}}@endif</textarea>
								</div>
								<div class='form-group'>
									<label class='control-label'>Uraian Singkat</label>
									<textarea class='form-control limited' id='uraian' cols='10' rows='4' name='uraian' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('uraian')}}@else{{$kd->uraian}}@endif</textarea>
								</div>
								<div class='form-group @if($errors->has('nomor_dilaporkan')) has-error @endif'>
									<label class='control-label'>Nomor dan Tanggal Dilaporkan</label>
									<input type='text' placeholder='Nomor dan Tanggal Dilaporkan' class='form-control limited' id='nomor_dilaporkan' name='nomor_dilaporkan' maxlength='100' value='@if(count($errors) > 0){{old('nomor_dilaporkan')}}@else{{$kd->nomor_dilaporkan}}@endif'
									required>

									@if ($errors->has('nomor_dilaporkan'))
										<span for="nomor_dilaporkan" class="help-block">{{ $errors->first('nomor_dilaporkan') }}</span>
									@endif
								</div>	
								<div class='form-group'>
									<label class='control-label'>Keterangan</label>
									<textarea class='form-control limited' id='keterangan' cols='10' rows='4' name='keterangan' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('keterangan')}}@else{{$kd->keterangan}}@endif</textarea>
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
