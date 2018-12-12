@extends('layouts.template')

@section('title', 'Edit Data Rencana Kerja Pembangunan Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Rencana Kerja Pembangunan Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('rencana-kerja-pembangunan-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('rencana-kerja-pembangunan-desa/'. $pd->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nama')) has-error @endif'>
									<label class='control-label'>Nama Proyek/Kegiatan</label>
									<input type='text' placeholder='Nama Proyek/Kegiatan' class='form-control limited' id='nama' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@else{{$pd->nama}}@endif'
									required>

									@if ($errors->has('nama'))
										<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
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
								<div class='form-group @if($errors->has('biaya')) has-error @endif'>
									<label class='control-label'>Sumber Biaya</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Dari Pemerintah' class='form-control limited' id='pemerintah' name='pemerintah' maxlength='10' value='@if(count($errors) > 0){{old('pemerintah')}}@else{{$pd->pemerintah}}@endif' required>

											@if ($errors->has('pemerintah'))
												<span for="pemerintah" class="help-block">{{ $errors->first('pemerintah') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Dari Provinsi' class='form-control limited' id='provinsi' name='provinsi' maxlength='10' value='@if(count($errors) > 0){{old('provinsi')}}@else{{$pd->provinsi}}@endif' required>

											@if ($errors->has('provinsi'))
												<span for="provinsi" class="help-block">{{ $errors->first('provinsi') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Dari Kabupaten' class='form-control limited' id='kota' name='kota' maxlength='10' value='@if(count($errors) > 0){{old('kota')}}@else{{$pd->kota}}@endif' required>

											@if ($errors->has('kota'))
												<span for="kota" class="help-block">{{ $errors->first('kota') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Swadaya' class='form-control limited' id='swadaya' name='swadaya' maxlength='10' value='@if(count($errors) > 0){{old('swadaya')}}@else{{$pd->swadaya}}@endif' required>

											@if ($errors->has('swadaya'))
												<span for="swadaya" class="help-block">{{ $errors->first('swadaya') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class='form-group @if($errors->has('pelaksana')) has-error @endif'>
									<label class='control-label'>Pelaksana</label>
									<input type='text' placeholder='Pelaksana' class='form-control limited' id='pelaksana' name='pelaksana' maxlength='100' value='@if(count($errors) > 0){{old('pelaksana')}}@else{{$pd->pelaksana}}@endif'
									required>

									@if ($errors->has('pelaksana'))
										<span for="pelaksana" class="help-block">{{ $errors->first('pelaksana') }}</span>
									@endif
								</div>
								<div class='form-group'>
									<label class='control-label'>Manfaat</label>
									<textarea class='form-control limited' id='manfaat' cols='10' rows='4' name='manfaat' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('manfaat')}}@else{{$pd->manfaat}}@endif</textarea>
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
