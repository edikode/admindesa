@extends('layouts.template')

@section('title', 'Edit Data Inventaris Hasil-Hasil Pembangunan')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Inventaris Hasil-Hasil Pembangunan</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('inventaris-hasil-pembangunan') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('inventaris-hasil-pembangunan/'. $pd->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nama')) has-error @endif'>
									<label class='control-label'>Jenis/Nama Hasil Pembangunan</label>
									<input type='text' placeholder='Jenis/Nama Hasil Pembangunan' class='form-control limited' id='nama' name='nama' maxlength='45' value='@if(count($errors) > 0){{old('nama')}}@else{{$pd->nama}}@endif'
									required>

									@if ($errors->has('nama'))
										<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('volume')) has-error @endif'>
									<label class='control-label'>Volume</label>
									<input type='text' placeholder='Volume' class='form-control limited' id='volume' name='volume' maxlength='45' value='@if(count($errors) > 0){{old('volume')}}@else{{$pd->volume}}@endif'
									required>

									@if ($errors->has('volume'))
										<span for="volume" class="help-block">{{ $errors->first('volume') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('biaya')) has-error @endif'>
									<label class='control-label'>Biaya</label>
									
									<input type='number' placeholder='Biaya' class='form-control limited' id='biaya' name='biaya' maxlength='9' value='@if(count($errors) > 0){{old('biaya')}}@else{{$pd->biaya}}@endif' required>

									@if ($errors->has('biaya'))
										<span for="biaya" class="help-block">{{ $errors->first('biaya') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('lokasi')) has-error @endif'>
									<label class='control-label'>Lokasi</label>
									<input type='text' placeholder='Lokasi' class='form-control limited' id='lokasi' name='lokasi' maxlength='100' value='@if(count($errors) > 0){{old('lokasi')}}@else{{$pd->lokasi}}@endif'
									required>

									@if ($errors->has('lokasi'))
										<span for="lokasi" class="help-block">{{ $errors->first('lokasi') }}</span>
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
