@extends('layouts.template')

@section('title', 'Edit Data Inventaris Kekayaan Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Inventaris Kekayaan Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-inventaris-kekayaan-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-inventaris-kekayaan-desa/'. $data->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('jenis')) has-error @endif'>
									<label class='control-label'>Jenis Barang/Bangunan</label>
									<input type='text' placeholder='Jenis Barang/Bangunan' class='form-control limited' id='jenis' name='jenis' maxlength='45'value='@if(count($errors) > 0){{old('jenis')}}@else{{$data->jenis}}@endif'
									required>

									@if ($errors->has('jenis'))
										<span for="jenis" class="help-block">{{ $errors->first('jenis') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('asal')) has-error @endif'>
									<label class='control-label'>Asal Barang/Bangunan</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Beli Sendiri' class='form-control limited' id='beli_sendiri' name='beli_sendiri' maxlength='10' value='@if(count($errors) > 0){{old('beli_sendiri')}}@else{{$data->beli_sendiri}}@endif' required>

											@if ($errors->has('beli_sendiri'))
												<span for="beli_sendiri" class="help-block">{{ $errors->first('beli_sendiri') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Bantuan Pemerintah' class='form-control limited' id='pemerintah' name='pemerintah' maxlength='10' value='@if(count($errors) > 0){{old('pemerintah')}}@else{{$data->pemerintah}}@endif' required>

											@if ($errors->has('pemerintah'))
												<span for="pemerintah" class="help-block">{{ $errors->first('pemerintah') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Bantuan Provinsi' class='form-control limited' id='provinsi' name='provinsi' maxlength='10' value='@if(count($errors) > 0){{old('provinsi')}}@else{{$data->provinsi}}@endif' required>

											@if ($errors->has('provinsi'))
												<span for="provinsi" class="help-block">{{ $errors->first('provinsi') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Bantuan Kabupaten' class='form-control limited' id='kota' name='kota' maxlength='10' value='@if(count($errors) > 0){{old('kota')}}@else{{$data->kota}}@endif' required>

											@if ($errors->has('kota'))
												<span for="kota" class="help-block">{{ $errors->first('kota') }}</span>
											@endif
										</div>
										<div class="col-md-3" style="margin-top:10px">
											<input type='number' placeholder='Sumbangan' class='form-control limited' id='sumbangan' name='sumbangan' maxlength='10' value='@if(count($errors) > 0){{old('sumbangan')}}@else{{$data->sumbangan}}@endif' required>

											@if ($errors->has('sumbangan'))
												<span for="sumbangan" class="help-block">{{ $errors->first('sumbangan') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class='form-group @if($errors->has('asal')) has-error @endif'>
									<label class='control-label'>Keadaan Barang/Bangunan Awal Tahun</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Kondisi Baik' class='form-control limited' id='awal_baik' name='awal_baik' maxlength='10' value='@if(count($errors) > 0){{old('awal_baik')}}@else{{$data->awal_baik}}@endif' required>

											@if ($errors->has('awal_baik'))
												<span for="awal_baik" class="help-block">{{ $errors->first('awal_baik') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Kondisi Rusak' class='form-control limited' id='awal_rusak' name='awal_rusak' maxlength='10' value='@if(count($errors) > 0){{old('awal_rusak')}}@else{{$data->awal_rusak}}@endif' required>

											@if ($errors->has('awal_rusak'))
												<span for="awal_rusak" class="help-block">{{ $errors->first('awal_rusak') }}</span>
											@endif
										</div>
									</div>
								</div>

								<div class='form-group @if($errors->has('asal')) has-error @endif'>
									<label class='control-label'>Penghapusan Barang/Bangunan</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Rusak' class='form-control limited' id='rusak' name='rusak' maxlength='10' value='@if(count($errors) > 0){{old('rusak')}}@else{{$data->rusak}}@endif' required>

											@if ($errors->has('rusak'))
												<span for="rusak" class="help-block">{{ $errors->first('rusak') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Dijual' class='form-control limited' id='dijual' name='dijual' maxlength='10' value='@if(count($errors) > 0){{old('dijual')}}@else{{$data->dijual}}@endif' required>

											@if ($errors->has('dijual'))
												<span for="dijual" class="help-block">{{ $errors->first('dijual') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Disumbangkan' class='form-control limited' id='disumbangkan' name='disumbangkan' maxlength='10' value='@if(count($errors) > 0){{old('disumbangkan')}}@else{{$data->disumbangkan}}@endif' required>

											@if ($errors->has('disumbangkan'))
												<span for="disumbangkan" class="help-block">{{ $errors->first('disumbangkan') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class='form-group @if($errors->has('tgl_hapus')) has-error @endif'>
											<label class='control-label'>Tanggal Dihapus</label>
											<div class="input-group">
												<input name="tgl_hapus" placeholder="Tanggal Dihapus" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_hapus')}}@else{{tgl_id($data->tgl_hapus)}}@endif" required autocomplete="off">
												<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
											</div>

											@if ($errors->has('tgl_hapus'))
												<span for="tgl_hapus" class="help-block">{{ $errors->first('tgl_hapus') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class='form-group @if($errors->has('asal')) has-error @endif'>
									<label class='control-label'>Keadaan Barang/Bangunan Akhir Tahun</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Kondisi Baik' class='form-control limited' id='akhir_baik' name='akhir_baik' maxlength='10' value='@if(count($errors) > 0){{old('akhir_baik')}}@else{{$data->akhir_baik}}@endif' required>

											@if ($errors->has('akhir_baik'))
												<span for="akhir_baik" class="help-block">{{ $errors->first('akhir_baik') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Kondisi Rusak' class='form-control limited' id='akhir_rusak' name='akhir_rusak' maxlength='10' value='@if(count($errors) > 0){{old('akhir_rusak')}}@else{{$data->akhir_rusak}}@endif' required>

											@if ($errors->has('akhir_rusak'))
												<span for="akhir_rusak" class="help-block">{{ $errors->first('akhir_rusak') }}</span>
											@endif
										</div>
									</div>
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
