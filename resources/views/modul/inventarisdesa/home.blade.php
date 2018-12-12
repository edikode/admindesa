@extends('layouts.template')

@section('title', 'Data Inventaris Kekayaan Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Inventaris Kekayaan Desa</li>
@endsection

@section('button', '')
@section('main')

	<div class="row">
		<div class="col-sm-12">	
			@include('errors/pesan_muncul')				
			<div class="clear panel panel-default">						
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<h4>Data Inventaris Kekayaan Desa</h4>
						</div>
						<div class="col-md-6">
							<a class="btn btn-large btn-warning item" href="{{url('data-inventaris-kekayaan-desa/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-red item" href="#"  data-target="#hapus" data-toggle="modal" style="margin-left:10px"><i class="clip-exit"></i> Hapus Barang</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah Barang</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>
								<th class="no" rowspan="3">Nomor Urut</th>
								<th rowspan="3">Jenis Barang/Bangunan</th>
								<th colspan="5">Asal Barang/Bangunan</th>
								<th colspan="2">Keadaan Barang/Bangunan Awal Tahun</th>
								<th colspan="4">Penghapusan Barang dan Bangunan</th>
								<th colspan="2">Keadaan Barang/<br>Bangunan <br>Akhir Tahun</th>
								{{-- <th rowspan="3">KET.</th> --}}
								<th rowspan="3">Opsi</th>
							</tr>
							<tr>
								<th rowspan="2">Di<br>be<br>li<br> Sen<br>di<br>ri</th>
								<th colspan="3">
									Bantuan
								</th>	
								<th rowspan="2">Sum<br>ba<br>ng<br>an</th>
								<th rowspan="2">Ba<br>ik</th>
								<th rowspan="2">Ru<br>sak</th>
								<th rowspan="2">Ru<br>sak</th>
								<th rowspan="2">Di<br>jual</th>
								<th rowspan="2">Di<br>sum<br>bang<br>kan</th>
								<th rowspan="2">Tgl Peng<br>hapusan</th>
								<th rowspan="2">Ba<br>ik</th>
								<th rowspan="2">Ru<br>sak</th>
							</tr>
							<tr>
								<th>Pe<br>me<br>rin<br>tah</th>
								<th>Pro<br>vin<br>si</th>
								<th>Kab<br>/<br>Kota</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($inventarisdesa as $p)
								<tr>
									<td>{{$i++}}</td>
									<td>{{$p->jenis}}</td>
									<td>{{$p->beli_sendiri}}</td>
									<td>{{$p->pemerintah}}</td>
									<td>{{$p->provinsi}}</td>
									<td>{{$p->kota}}</td>
									<td>{{$p->sumbangan}}</td>
									<td>{{$p->awal_baik}}</td>
									<td>{{$p->awal_rusak}}</td>
									<td>{{$p->rusak}}</td>
									<td>{{$p->dijual}}</td>
									<td>{{$p->disumbangkan}}</td>
									<td>{{tgl_id($p->tgl_hapus)}}</td>
									<td>{{$p->akhir_baik}}</td>
									<td>{{$p->akhir_rusak}}</td>
									
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-inventaris-kekayaan-desa/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-inventaris-kekayaan-desa/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-inventaris-kekayaan-desa', $p->id)}}" method="post" style="display: inline-block;">
											{{ csrf_field() }}	
											<input type="hidden" name="_method" value="DELETE">
											<button type="submit" data-original-title='Hapus' class="btn btn-red btn-sm tooltips" onclick='return konfirmasiHapus()'><i class="clip-remove"></i></button>
										</form>
									</td>
								</tr>
							@endforeach

						</tbody>
					</table>
				</div>
				
			</div>
		</div>		
	</div>

	<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-crud">
			<div class="modal-content">
				<form action="{{url('data-inventaris-kekayaan-desa')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Tambah Data Inventaris Kekayaan Desa</h4>
					</div>		
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class='form-group @if($errors->has('jenis')) has-error @endif'>
									<label class='control-label'>Jenis Barang/Bangunan</label>
									<input type='text' placeholder='Jenis Barang/Bangunan' class='form-control limited' id='jenis' name='jenis' maxlength='100' value='@if(count($errors) > 0){{old('jenis')}}@endif'
									required>

									@if ($errors->has('jenis'))
										<span for="jenis" class="help-block">{{ $errors->first('jenis') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('asal')) has-error @endif'>
									<label class='control-label'>Asal Barang/Bangunan</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Beli Sendiri' class='form-control limited' id='beli_sendiri' name='beli_sendiri' maxlength='10' value='@if(count($errors) > 0){{old('beli_sendiri')}}@endif' required>

											@if ($errors->has('beli_sendiri'))
												<span for="beli_sendiri" class="help-block">{{ $errors->first('beli_sendiri') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Bantuan Pemerintah' class='form-control limited' id='pemerintah' name='pemerintah' maxlength='10' value='@if(count($errors) > 0){{old('pemerintah')}}@endif' required>

											@if ($errors->has('pemerintah'))
												<span for="pemerintah" class="help-block">{{ $errors->first('pemerintah') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Bantuan Provinsi' class='form-control limited' id='provinsi' name='provinsi' maxlength='10' value='@if(count($errors) > 0){{old('provinsi')}}@endif' required>

											@if ($errors->has('provinsi'))
												<span for="provinsi" class="help-block">{{ $errors->first('provinsi') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Bantuan Kabupaten' class='form-control limited' id='kota' name='kota' maxlength='10' value='@if(count($errors) > 0){{old('kota')}}@endif' required>

											@if ($errors->has('kota'))
												<span for="kota" class="help-block">{{ $errors->first('kota') }}</span>
											@endif
										</div>
										<div class="col-md-3" style="margin-top:10px">
											<input type='number' placeholder='Sumbangan' class='form-control limited' id='sumbangan' name='sumbangan' maxlength='10' value='@if(count($errors) > 0){{old('sumbangan')}}@endif' required>

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
											<input type='number' placeholder='Kondisi Baik' class='form-control limited' id='awal_baik' name='awal_baik' maxlength='10' value='@if(count($errors) > 0){{old('awal_baik')}}@endif' required>

											@if ($errors->has('awal_baik'))
												<span for="awal_baik" class="help-block">{{ $errors->first('awal_baik') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Kondisi Rusak' class='form-control limited' id='awal_rusak' name='awal_rusak' maxlength='10' value='@if(count($errors) > 0){{old('awal_rusak')}}@endif' required>

											@if ($errors->has('awal_rusak'))
												<span for="awal_rusak" class="help-block">{{ $errors->first('awal_rusak') }}</span>
											@endif
										</div>
									</div>
								</div>
									
								<div class='form-group'>
									<label class='control-label'>Keterangan</label>
									<textarea class='form-control limited' id='keterangan' cols='10' rows='4' name='keterangan' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('keterangan')}}@endif</textarea>
								</div>				
							</div>
						</div>
					</div>
					<div class="modal-footer">				
						<input name="simpan" value="Simpan" type="submit" class="btn btn-green">
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-crud">
			<div class="modal-content">
				<form action="{{ url('data-inventaris-kekayaan-desa/hapus') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Penghapusan Data Inventaris Kekayaan Desa</h4>
					</div>		
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class='form-group @if($errors->has('jenis')) has-error @endif'>
									<label class='control-label'>Jenis Barang/Bangunan</label>
									<select name="jenis" id="jenis" class="form-control">
										<option value="">-- Pilih --</option>
										@foreach ($data as $d)
											<option value="{{$d->id}}">{{$d->jenis}}</option>
										@endforeach
									</select>

									@if ($errors->has('jenis'))
										<span for="jenis" class="help-block">{{ $errors->first('jenis') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('asal')) has-error @endif'>
									<label class='control-label'>Penghapusan Barang/Bangunan</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Rusak' class='form-control limited' id='rusak' name='rusak' maxlength='10' value='@if(count($errors) > 0){{old('rusak')}}@endif' required>

											@if ($errors->has('rusak'))
												<span for="rusak" class="help-block">{{ $errors->first('rusak') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Dijual' class='form-control limited' id='dijual' name='dijual' maxlength='10' value='@if(count($errors) > 0){{old('dijual')}}@endif' required>

											@if ($errors->has('dijual'))
												<span for="dijual" class="help-block">{{ $errors->first('dijual') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Disumbangkan' class='form-control limited' id='disumbangkan' name='disumbangkan' maxlength='10' value='@if(count($errors) > 0){{old('disumbangkan')}}@endif' required>

											@if ($errors->has('disumbangkan'))
												<span for="disumbangkan" class="help-block">{{ $errors->first('disumbangkan') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class='form-group @if($errors->has('tgl_hapus')) has-error @endif'>
									<label class='control-label'>Tanggal Penghapusan</label>
									{{-- <div class="input-group">
										<input type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div> --}}
									<input style="width:150px" type="date" name="tgl_hapus" id="tgl_hapus" class="form-control" value="@if(count($errors) > 0){{old('tgl_hapus')}}@endif" required>
								</div>
								<div class='form-group @if($errors->has('asal')) has-error @endif'>
									<label class='control-label'>Keadaan Barang/Bangunan Akhir Tahun</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Kondisi Baik' class='form-control limited' id='akhir_baik' name='akhir_baik' maxlength='10' value='@if(count($errors) > 0){{old('akhir_baik')}}@endif' required>

											@if ($errors->has('akhir_baik'))
												<span for="akhir_baik" class="help-block">{{ $errors->first('akhir_baik') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Kondisi Rusak' class='form-control limited' id='akhir_rusak' name='akhir_rusak' maxlength='10' value='@if(count($errors) > 0){{old('akhir_rusak')}}@endif' required>

											@if ($errors->has('akhir_rusak'))
												<span for="akhir_rusak" class="help-block">{{ $errors->first('akhir_rusak') }}</span>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">				
						<input name="simpan" value="Simpan" type="submit" class="btn btn-green">
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection
