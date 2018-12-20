@extends('layouts.template')

@section('title', 'Edit Data Tanah Kas Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Tanah Kas Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-tanah-kas-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-tanah-kas-desa/'. $kd->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('asal')) has-error @endif'>
									<label class='control-label'>Asal Tanah Kas Desa</label>
									<input type='text' placeholder='Asal Tanah Kas Desa' class='form-control limited' id='asal' name='asal' maxlength='45' value='@if(count($errors) > 0){{old('asal')}}@else{{$kd->asal}}@endif'
									required>

									@if ($errors->has('asal'))
										<span for="asal" class="help-block">{{ $errors->first('asal') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('nomor_sertifikat')) has-error @endif'>
									<label class='control-label'>Nomor Sertifikat</label>
									<input type='text' placeholder='nomor sertifikat, atau buku Letter C, atau Persil' class='form-control limited' id='nomor_sertifikat' name='nomor_sertifikat' maxlength='45' value='@if(count($errors) > 0){{old('nomor_sertifikat')}}@else{{$kd->nomor_sertifikat}}@endif'
									required>

									@if ($errors->has('nomor_sertifikat'))
										<span for="nomor_sertifikat" class="help-block">{{ $errors->first('nomor_sertifikat') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('luas')) has-error @endif'>
									<label class='control-label'>Luas Tanah</label>
									<input type='text' placeholder='luas tanah kas Desa dalam meter persegi (M2)' class='form-control limited' id='luas' name='luas' maxlength='10' value='@if(count($errors) > 0){{old('luas')}}@else{{$kd->luas}}@endif'
									required>

									@if ($errors->has('luas'))
										<span for="luas" class="help-block">{{ $errors->first('luas') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('kelas')) has-error @endif'>
									<label class='control-label'>Kelas</label>
									<br>
									<label class='radio-inline'>
										<input type='radio' name='kelas' class='square-green' value='S1' @if($kd->kelas == "S1") checked @endif>
										S1
									</label>
									<label class='radio-inline'>
										<input type='radio' name='kelas' class='square-green' value='D1' @if($kd->kelas == "D1") checked @endif>
										D1
									</label>
									<label class='radio-inline'>
										<input type='radio' name='kelas' class='square-green' value='Lainnya' @if($kd->kelas == "Lainnya") checked @endif>
										Lainnya
									</label>

									@if ($errors->has('kelas'))
										<span for="kelas" class="help-block">{{ $errors->first('kelas') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('perolehan_tkd')) has-error @endif'>
									<label class='control-label'>Perolehan TKD</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Asli Milik Desa' class='form-control limited' id='asli' name='asli' maxlength='10' value='@if(count($errors) > 0){{old('asli')}}@else{{$kd->asli}}@endif' required>

											@if ($errors->has('asli'))
												<span for="asli" class="help-block">{{ $errors->first('asli') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Bantuan Pemerintah' class='form-control limited' id='pemerintah' name='pemerintah' maxlength='10' value='@if(count($errors) > 0){{old('pemerintah')}}@else{{$kd->pemerintah}}@endif' required>

											@if ($errors->has('pemerintah'))
												<span for="pemerintah" class="help-block">{{ $errors->first('pemerintah') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Bantuan Provinsi' class='form-control limited' id='provinsi' name='provinsi' maxlength='10' value='@if(count($errors) > 0){{old('provinsi')}}@else{{$kd->provinsi}}@endif' required>

											@if ($errors->has('provinsi'))
												<span for="provinsi" class="help-block">{{ $errors->first('provinsi') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Bantuan Kabupaten' class='form-control limited' id='kota' name='kota' maxlength='10' value='@if(count($errors) > 0){{old('kota')}}@else{{$kd->kota}}@endif' required>

											@if ($errors->has('kota'))
												<span for="kota" class="help-block">{{ $errors->first('kota') }}</span>
											@endif
										</div>
										<div class="col-md-3" style="margin-top:10px">
											<input type='number' placeholder='Bantuan Lainnya' class='form-control limited' id='lainlain' name='lainlain' maxlength='10' value='@if(count($errors) > 0){{old('lainlain')}}@else{{$kd->lainlain}}@endif' required>

											@if ($errors->has('lainlain'))
												<span for="lainlain" class="help-block">{{ $errors->first('lainlain') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class='form-group @if($errors->has('tgl_perolehan')) has-error @endif'>
									<label class='control-label'>Tanggal Perolehan</label>
									<div class="input-group">
										<input name="tgl_perolehan" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_perolehan')}}@else{{tgl_id($kd->tgl_perolehan)}}@endif" placeholder="Tanggal Perolehan" required autocomplete="off">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div>

									@if ($errors->has('tgl_perolehan'))
										<span for="tgl_perolehan" class="help-block">{{ $errors->first('tgl_perolehan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('jenis_tkd')) has-error @endif'>
									<label class='control-label'>Jenis TKD</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Sawah' class='form-control limited' id='sawah' name='sawah' maxlength='10' value='@if(count($errors) > 0){{old('sawah')}}@else{{$kd->sawah}}@endif' required>

											@if ($errors->has('sawah'))
												<span for="sawah" class="help-block">{{ $errors->first('sawah') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Tegal' class='form-control limited' id='tegal' name='tegal' maxlength='10' value='@if(count($errors) > 0){{old('tegal')}}@else{{$kd->tegal}}@endif' required>

											@if ($errors->has('tegal'))
												<span for="tegal" class="help-block">{{ $errors->first('tegal') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Kebun' class='form-control limited' id='kebun' name='kebun' maxlength='10' value='@if(count($errors) > 0){{old('kebun')}}@else{{$kd->kebun}}@endif' required>

											@if ($errors->has('kebun'))
												<span for="kebun" class="help-block">{{ $errors->first('kebun') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Tambak/Kolam' class='form-control limited' id='tambak' name='tambak' maxlength='10' value='@if(count($errors) > 0){{old('tambak')}}@else{{$kd->tambak}}@endif' required>

											@if ($errors->has('tambak'))
												<span for="tambak" class="help-block">{{ $errors->first('tambak') }}</span>
											@endif
										</div>
										<div class="col-md-3" style="margin-top:10px">
											<input type='number' placeholder='Tanah Kering' class='form-control limited' id='darat' name='darat' maxlength='10' value='@if(count($errors) > 0){{old('darat')}}@else{{$kd->darat}}@endif' required>

											@if ($errors->has('darat'))
												<span for="darat" class="help-block">{{ $errors->first('darat') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class='form-group @if($errors->has('patok_batas')) has-error @endif'>
									<label class='control-label'>Patok Tanda Batas</label>
									<br>
									<label class='radio-inline'>
										<input type='radio' name='patok_batas' class='square-green' value='Sudah Ada' @if($kd->patok_batas == "Sudah Ada") checked @endif>
										Sudah Ada
									</label>
									<label class='radio-inline'>
										<input type='radio' name='patok_batas' class='square-green' value='Belum Ada' @if($kd->patok_batas == "Belum Ada") checked @endif>
										Belum Ada
									</label>

									@if ($errors->has('patok_batas'))
										<span for="patok_batas" class="help-block">{{ $errors->first('patok_batas') }}</span>
									@endif
								</div>	
								<div class='form-group @if($errors->has('papan_nama')) has-error @endif'>
									<label class='control-label'>Papan Nama</label>
									<br>
									<label class='radio-inline'>
										<input type='radio' name='papan_nama' class='square-green' value='Sudah Ada' @if($kd->papan_nama == "Sudah Ada") checked @endif>
										Sudah Ada
									</label>
									<label class='radio-inline'>
										<input type='radio' name='papan_nama' class='square-green' value='Belum Ada' @if($kd->papan_nama == "Belum Ada") checked @endif>
										Belum Ada
									</label>

									@if ($errors->has('papan_nama'))
										<span for="papan_nama" class="help-block">{{ $errors->first('papan_nama') }}</span>
									@endif
								</div>	
								<div class='form-group'>
									<label class='control-label'>Lokasi</label>
									<textarea class='form-control limited' id='lokasi' cols='10' rows='4' name='lokasi' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('lokasi')}}@else{{$kd->lokasi}}@endif</textarea>
								</div>	
								<div class='form-group @if($errors->has('peruntukan')) has-error @endif'>
									<label class='control-label'>Peruntukan</label>
									<input type='text' placeholder='Peruntukan/pemanfaatan tanah kas Desa' class='form-control limited' id='peruntukan' name='peruntukan' maxlength='100' value='@if(count($errors) > 0){{old('peruntukan')}}@else{{$kd->peruntukan}}@endif'
									required>

									@if ($errors->has('asal'))
										<span for="peruntukan" class="help-block">{{ $errors->first('peruntukan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('mutasi')) has-error @endif'>
									<label class='control-label'>Mutasi</label>
									<input type='text' placeholder='Diisi setiap terjadi mutasi tanah kas Desa' class='form-control limited' id='mutasi' name='mutasi' maxlength='100' value='@if(count($errors) > 0){{old('mutasi')}}@else{{$kd->mutasi}}@endif'>

									@if ($errors->has('mutasi'))
										<span for="mutasi" class="help-block">{{ $errors->first('mutasi') }}</span>
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
