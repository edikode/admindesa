@extends('layouts.template')

@section('title', 'Edit Data Mutasi Penduduk Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Mutasi Penduduk Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-mutasi-penduduk-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-mutasi-penduduk-desa/'. $pd->id) }}" method="post" enctype="multipart/form-data">				
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

								@if($pd->tgl_datang != "")
									<div class='form-group @if($errors->has('tgl_datang')) has-error @endif'>
										<label class='control-label'>Tanggal</label>
										<div class="input-group">
											<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_datang')}}@else{{tgl_id($pd->tgl_datang)}}@endif" name="tgl_datang" id="tgl_datang" required>
											<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
										</div>
									</div>
									<input type="hidden" name="jenis" value="datang">
									<div class='form-group'>
										<label class='control-label'>Datang Dari</label>
										<textarea class='form-control limited' id='tmp_datang' cols='10' rows='4' name='tmp_datang' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('tmp_datang')}}@else{{$pd->tmp_datang}}@endif</textarea>
									</div>	

								@elseif($pd->tgl_pindah != "")
									<div class='form-group @if($errors->has('tgl_pindah')) has-error @endif'>
										<label class='control-label'>Tanggal</label>
										<div class="input-group">
											<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_pindah')}}@else{{tgl_id($pd->tgl_pindah)}}@endif" name="tgl_pindah" id="tgl_pindah" required>
											<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
										</div>
									</div>
									<input type="hidden" name="jenis" value="pindah">
									<div class='form-group'>
										<label class='control-label'>Lokasi Pindah</label>
										<textarea class='form-control limited' id='tmp_pindah' cols='10' rows='4' name='tmp_pindah' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('tmp_pindah')}}@else{{$pd->tmp_pindah}}@endif</textarea>
									</div>	
								
								@else
									<div class='form-group @if($errors->has('tgl_meninggal')) has-error @endif'>
										<label class='control-label'>Tanggal</label>
										
										<div class="input-group">
											<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_meninggal')}}@else{{tgl_id($pd->tgl_meninggal)}}@endif" name="tgl_meninggal" id="tgl_meninggal" required>
											<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
										</div>
									</div>
									<input type="hidden" name="jenis" value="meninggal">
									<div class='form-group'>
										<label class='control-label'>Lokasi Meninggal</label>
										<textarea class='form-control limited' id='tmp_meninggal' cols='10' rows='4' name='tmp_meninggal' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('tmp_meninggal')}}@else{{$pd->tmp_meninggal}}@endif</textarea>
									</div>	

								@endif
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
