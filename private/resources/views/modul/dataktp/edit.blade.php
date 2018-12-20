@extends('layouts.template')

@section('title', 'Edit Data Kartu Tanda Penduduk dan Kartu Keluarga')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Kartu Tanda Penduduk dan Kartu Keluarga</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-ktp-dan-kk') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-ktp-dan-kk/'. $pd->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nama')) has-error @endif'>
									<label class='control-label'>Nama / NIK</label>
									<select name="nama" id="nama" class="form-control search-select">
										<option value="">-- Pilih --</option>
											<option value="{{$datainduk->id}}" selected>{{$datainduk->nama}} / {{$datainduk->nik}}</option>
									</select>

									@if ($errors->has('nama'))
										<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
									@endif
								</div>	
								<div class="row">
									<div class="col-md-8">
										<div class='form-group @if($errors->has('tmp_dikeluarkan')) has-error @endif'>
											<label class='control-label'>Tempat Dikeluarkan</label>
											<input type='text' placeholder='Tempat Dikeluarkan' class='form-control limited' id='tmp_dikeluarkan' name='tmp_dikeluarkan' maxlength='45' value='@if(count($errors) > 0){{old('tmp_dikeluarkan')}}@else{{$pd->tmp_dikeluarkan}}@endif' required>

											@if ($errors->has('tmp_dikeluarkan'))
												<span for="tmp_dikeluarkan" class="help-block">{{ $errors->first('tmp_dikeluarkan') }}</span>
											@endif
										</div>
									</div>
									<div class="col-md-4">
										<div class='form-group @if($errors->has('tgl_dikeluarkan')) has-error @endif'>
											<label class='control-label'>Tanggal Dikeluarkan</label>
											<div class="input-group">
												<input name="tgl_dikeluarkan" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_dikeluarkan')}}@else{{tgl_id($pd->tgl_dikeluarkan)}}@endif" required autocomplete="off" placeholder="Tanggal Dikeluarkan">
												<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
											</div>

											@if ($errors->has('tgl_dikeluarkan'))
												<span for="tgl_dikeluarkan" class="help-block">{{ $errors->first('tgl_dikeluarkan') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class='form-group @if($errors->has('status_dikeluarga')) has-error @endif'>
									<label class='control-label'>Satus Hubungan Keluarga</label>
									<select name="status_dikeluarga" id="status_dikeluarga" class="form-control" required>
										<option value="">--- Pilih ---</option>
										<option value="Ayah" 
											@if(count($errors) > 0) 
												@if(old('status_dikeluarga') == "Ayah") selected @endif 
											@else 
												@if($pd->status_dikeluarga == "Ayah") selected @endif
											@endif>Ayah</option>
										<option value="Ibu"@if(count($errors) > 0) 
												@if(old('status_dikeluarga') == "Ibu") selected @endif 
											@else 
												@if($pd->status_dikeluarga == "Ibu") selected @endif
											@endif>Ibu</option>
										<option value="Anak" @if(count($errors) > 0) 
												@if(old('status_dikeluarga') == "Anak") selected @endif 
											@else 
												@if($pd->status_dikeluarga == "Anak") selected @endif
											@endif>Anak</option>
										<option value="Lainnya" 
											@if(count($errors) > 0) 
												@if(old('status_dikeluarga') == "Lainnya") selected @endif 
											@else 
												@if($pd->status_dikeluarga == "Lainnya") selected @endif
											@endif>Lainnya</option>
									</select>

									@if ($errors->has('status_dikeluarga'))
										<span for="status_dikeluarga" class="help-block">{{ $errors->first('status_dikeluarga') }}</span>
									@endif
								</div>					
								<div class='form-group @if($errors->has('ayah')) has-error @endif'>
									<label class='control-label'>Nama Ayah</label>
									<input type='text' placeholder='Nama Ayah' class='form-control limited' id='ayah' name='ayah' maxlength='45' value='@if(count($errors) > 0){{old('ayah')}}@else{{$pd->ayah}}@endif'>

									@if ($errors->has('ayah'))
										<span for="ayah" class="help-block">{{ $errors->first('ayah') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('ibu')) has-error @endif'>
									<label class='control-label'>Nama Ibu</label>
									<input type='text' placeholder='Nama Ibu' class='form-control limited' id='ibu' name='ibu' maxlength='45' value='@if(count($errors) > 0){{old('ibu')}}@else{{$pd->ibu}}@endif'>

									@if ($errors->has('ibu'))
										<span for="ibu" class="help-block">{{ $errors->first('ibu') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('tgl_didesa')) has-error @endif'>
									<label class='control-label'>Tanggal Mulai Didesa</label>
									<div class="input-group">
										<input name="tgl_didesa" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_didesa')}}@else{{tgl_id($pd->tgl_didesa)}}@endif" required autocomplete="off" placeholder="Taggal Mulai Didesa">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div>

									@if ($errors->has('tgl_didesa'))
										<span for="tgl_didesa" class="help-block">{{ $errors->first('tgl_didesa') }}</span>
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
