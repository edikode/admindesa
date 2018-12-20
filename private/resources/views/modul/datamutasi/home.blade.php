@extends('layouts.template')

@section('title', 'Data Mutasi Penduduk Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Mutasi Penduduk Desa</li>
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
							<h4>Data Mutasi Penduduk Desa</h4>
						</div>
						<div class="col-md-6">
							<a class="btn btn-large btn-warning item" href="{{url('data-mutasi-penduduk-desa/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-red item" href="#"  data-target="#hapus" data-toggle="modal" style="margin-left:10px"><i class="clip-exit"></i> Pengurangan</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Penambahan</a>
						</div>
					</div>
					<hr style="margin-top:0px">

					
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th class="no" rowspan="2">Nomor Urut</th>
								<th rowspan="2">Nama Lengkap</th>
								<th colspan="2">Tempat &<br>Tanggal Lahir</th>
								<th rowspan="2">Jenis Kelamin</th>
								<th rowspan="2">Kewarganegaraan</th>
								<th colspan="2">Penambahan</th>
								<th colspan="4">Pengurangan</th>
								{{-- <th rowspan="2">KET.</th> --}}
								<th class="pilihan" rowspan="2">Opsi</th>
							</tr>
							<tr>
								<th>Tempat</th>
								<th>Tanggal</th>
								<th>Datang Dari</th>
								<th>Tanggal</th>
								<th>Pindah Ke</th>
								<th>Tanggal</th>
								<th>Meninggal</th>
								<th>Tanggal</th>
								{{-- <th>KET.</th> --}}
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($datamutasi as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->nama}}</td>
									<td>{{$p->tmp_lahir}}</td>
									<td>{{tgl_id($p->tgl_lahir)}}</td>
									<td>{{$p->jenis_kelamin}}</td>
									<td>{{$p->kewarganegaraan}}</td>
									<td>{{$p->tmp_datang}}</td>
									<td>{{tgl_id($p->tgl_datang)}}</td>
									<td>{{$p->tmp_pindah}}</td>
									<td>{{tgl_id($p->tgl_pindah)}}</td>
									<td>{{$p->tmp_meninggal}}</td>
									<td>{{tgl_id($p->tgl_meninggal)}}</td>
									
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-mutasi-penduduk-desa/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-mutasi-penduduk-desa/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-mutasi-penduduk-desa', $p->id)}}" method="post" style="display: inline-block;">
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

	<div class="modal fade modal-crud" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
		<form action="{{url('data-mutasi-penduduk-desa')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Mutasi Penduduk Desa</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('nama')) has-error @endif'>
							<label class='control-label'>Nama</label>
							<input type='text' placeholder='Nama' class='form-control limited' id='nama' name='nama' maxlength='45' value='@if(count($errors) > 0){{old('nama')}}@endif'
							required>

							@if ($errors->has('nama'))
								<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
							@endif
						</div>	
						<div class='form-group @if($errors->has('jenis_kelamin')) has-error @endif'>
							<label class='control-label'>Jenis Kelamin</label>
							<br>
							<label class='radio-inline'>
								<input type='radio' name='jenis_kelamin' class='square-green' value='L' @if(old('jenis_kelamin') == 'L') checked @endif>
								Laki-laki
							</label>
							<label class='radio-inline'>
								<input type='radio' name='jenis_kelamin' class='square-green' value='P' @if(old('jenis_kelamin') == 'P') checked @endif>
								Perempuan
							</label>

							@if ($errors->has('jenis_kelamin'))
								<span for="jenis_kelamin" class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
							@endif
						</div>				
						<div class='form-group @if($errors->has('status')) has-error @endif'>
							<label class='control-label'>Status Perkawinan</label>
							<select name="status" id="status" class="form-control" required>
								<option value="">--- Pilih ---</option>
								<option value="K" @if(count($errors) > 0) @if(old('status') == "K") selected @endif @endif>Kawin</option>
								<option value="BK" @if(count($errors) > 0) @if(old('status') == "BK") selected @endif @endif>Belum Kawin</option>
								<option value="JD" @if(count($errors) > 0) @if(old('status') == "JD") selected @endif @endif>Janda</option>
								<option value="DD" @if(count($errors) > 0) @if(old('status') == "DD") selected @endif @endif>Duda</option>
							</select>

							@if ($errors->has('status'))
								<span for="status" class="help-block">{{ $errors->first('status') }}</span>
							@endif
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class='form-group @if($errors->has('tmp_lahir')) has-error @endif'>
									<label class='control-label'>Tempat Lahir</label>
									<input type='text' placeholder='Tempat Lahir' class='form-control limited' id='tmp_lahir' name='tmp_lahir' maxlength='45' value='@if(count($errors) > 0){{old('tmp_lahir')}}@endif' required>

									@if ($errors->has('tmp_lahir'))
										<span for="tmp_lahir" class="help-block">{{ $errors->first('tmp_lahir') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-4">
								<div class='form-group @if($errors->has('tgl_lahir')) has-error @endif'>
									<label class='control-label'>Tanggal Lahir</label>
									<div class="input-group">
										<input name="tgl_lahir" placeholder="Tanggal Lahir" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_lahir')}}@endif" required autocomplete="off">
										<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
									</div>

									@if ($errors->has('tgl_lahir'))
										<span for="tgl_lahir" class="help-block">{{ $errors->first('tgl_lahir') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class='form-group @if($errors->has('agama')) has-error @endif'>
							<label class='control-label'>Agama</label>
							<select name="agama" id="agama" class="form-control" required>
								<option value="">--- Pilih ---</option>
								<option value="Islam" @if(count($errors) > 0) @if(old('agama') == "Islam") selected @endif @endif>Islam</option>
								<option value="Kritsten" @if(count($errors) > 0) @if(old('agama') == "Kritsten") selected @endif @endif>Kritsten</option>
								<option value="Katolik" @if(count($errors) > 0) @if(old('agama') == "Katolik") selected @endif @endif>Katolik</option>
								<option value="Hindu" @if(count($errors) > 0) @if(old('agama') == "Hindu") selected @endif @endif>Hindu</option>
								<option value="Budha" @if(count($errors) > 0) @if(old('agama') == "Budha") selected @endif @endif>Budha</option>
								<option value="Lainnya" @if(count($errors) > 0) @if(old('agama') == "Lainnya") selected @endif @endif>Lainnya</option>
							</select>

							@if ($errors->has('agama'))
								<span for="agama" class="help-block">{{ $errors->first('agama') }}</span>
							@endif
						</div>	
						<div class='form-group @if($errors->has('pendidikan_terakhir')) has-error @endif'>
							<label class='control-label'>Pendidikan Terakhir</label>
							<input type='text' placeholder='Pendidikan Terakhir' class='form-control limited' id='pendidikan_terakhir' name='pendidikan_terakhir' maxlength='45' value='@if(count($errors) > 0){{old('pendidikan_terakhir')}}@endif' required>

							@if ($errors->has('pendidikan_terakhir'))
								<span for="pendidikan_terakhir" class="help-block">{{ $errors->first('pendidikan_terakhir') }}</span>
							@endif
						</div>	
						<div class='form-group @if($errors->has('pekerjaan')) has-error @endif'>
							<label class='control-label'>Pekerjaan</label>
							<input type='text' placeholder='Pekerjaan' class='form-control limited' id='pekerjaan' name='pekerjaan' maxlength='45' value='@if(count($errors) > 0){{old('pekerjaan')}}@endif' required>

							@if ($errors->has('pekerjaan'))
								<span for="pekerjaan" class="help-block">{{ $errors->first('pekerjaan') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('dapat_membaca')) has-error @endif'>
							<label class='control-label'>Dapat Membaca Huruf</label>
							<select name="dapat_membaca" id="dapat_membaca" class="form-control" required>
								<option value="">--- Pilih ---</option>
								<option value="L" @if(count($errors) > 0) @if(old('dapat_membaca') == "L") selected @endif @endif> latin</option>
								<option value="D" @if(count($errors) > 0) @if(old('dapat_membaca') == "D") selected @endif @endif>Daerah</option>
								<option value="A" @if(count($errors) > 0) @if(old('dapat_membaca') == "A") selected @endif @endif>Arab</option>
								<option value="AL" @if(count($errors) > 0) @if(old('dapat_membaca') == "AL") selected @endif @endif>Arab dan Latin</option>
								<option value="AD" @if(count($errors) > 0) @if(old('dapat_membaca') == "AD") selected @endif @endif>Arab dan Daerah</option>
								<option value="ALD" @if(count($errors) > 0) @if(old('dapat_membaca') == "ALD") selected @endif @endif>Arab, Latin, Daerah</option>
							</select>

							@if ($errors->has('dapat_membaca'))
								<span for="dapat_membaca" class="help-block">{{ $errors->first('dapat_membaca') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('kewarganegaraan')) has-error @endif'>
							<label class='control-label'>Kewarganegaraan</label>
							<select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
								<option value="">--- Pilih ---</option>
								<option value="WNI" @if(count($errors) > 0) @if(old('kewarganegaraan') == "WNI") selected @endif @endif>Warga Negara Indonesia</option>
								<option value="WNA" @if(count($errors) > 0) @if(old('kewarganegaraan') == "WNA") selected @endif @endif>Warga Negara Asing</option>
							</select>

							@if ($errors->has('kewarganegaraan'))
								<span for="nik" class="help-block">{{ $errors->first('kewarganegaraan') }}</span>
							@endif
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class='form-group @if($errors->has('rtrw')) has-error @endif'>
									<label class='control-label'>RT/RW</label>
									<input type='text' placeholder='RT/RW' class='form-control limited' id='rtrw' name='rtrw' maxlength='10' value='@if(count($errors) > 0){{old('rtrw')}}@endif'
									required>

									@if ($errors->has('rtrw'))
										<span for="rtrw" class="help-block">{{ $errors->first('rtrw') }}</span>
									@endif
								</div>	
							</div>
							<div class="col-md-4">
								<div class='form-group @if($errors->has('dusun')) has-error @endif'>
									<label class='control-label'>Dusun</label>
									<input type='text' placeholder='Dusun' class='form-control limited' id='dusun' name='dusun' maxlength='45' value='@if(count($errors) > 0){{old('dusun')}}@endif'
									required>

									@if ($errors->has('dusun'))
										<span for="dusun" class="help-block">{{ $errors->first('dusun') }}</span>
									@endif
								</div>	
							</div>
							<div class="col-md-4">
								<div class='form-group @if($errors->has('desa')) has-error @endif'>
									<label class='control-label'>Desa</label>
									<input type='text' placeholder='Desa' class='form-control limited' id='desa' name='desa' maxlength='45' value='@if(count($errors) > 0){{old('desa')}}@endif'
									required>

									@if ($errors->has('desa'))
										<span for="desa" class="help-block">{{ $errors->first('desa') }}</span>
									@endif
								</div>	
							</div>
							<div class="col-md-4">
								<div class='form-group @if($errors->has('kecamatan')) has-error @endif'>
									<label class='control-label'>Kecamatan</label>
									<input type='text' placeholder='Kecamatan' class='form-control limited' id='kecamatan' name='kecamatan' maxlength='45' value='@if(count($errors) > 0){{old('kecamatan')}}@endif'
									required>

									@if ($errors->has('kecamatan'))
										<span for="kecamatan" class="help-block">{{ $errors->first('kecamatan') }}</span>
									@endif
								</div>	
							</div>
							<div class="col-md-4">
								<div class='form-group @if($errors->has('kabupaten')) has-error @endif'>
									<label class='control-label'>Kabupaten</label>
									<input type='text' placeholder='Kabupaten' class='form-control limited' id='kabupaten' name='kabupaten' maxlength='45' value='@if(count($errors) > 0){{old('kabupaten')}}@endif'
									required>

									@if ($errors->has('kabupaten'))
										<span for="kabupaten" class="help-block">{{ $errors->first('kabupaten') }}</span>
									@endif
								</div>	
							</div>
							<div class="col-md-4">
								<div class='form-group @if($errors->has('kodepos')) has-error @endif'>
									<label class='control-label'>Kode Pos</label>
									<input type='text' placeholder='Kode Pos' class='form-control limited' id='kodepos' name='kodepos' maxlength='45' value='@if(count($errors) > 0){{old('kodepos')}}@endif'
									required>

									@if ($errors->has('kodepos'))
										<span for="kodepos" class="help-block">{{ $errors->first('kodepos') }}</span>
									@endif
								</div>	
							</div>
						</div>

						<div class='form-group'>
							<label class='control-label'>Alamat Lengkap</label>
							<textarea class='form-control limited' id='alamat' cols='10' rows='4' name='alamat' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('alamat')}}@endif</textarea>
						</div>	
						<div class='form-group @if($errors->has('kedudukan')) has-error @endif'>
							<label class='control-label'>Kedudukan dalam Keluarga</label>
							<select name="kedudukan" id="kedudukan" class="form-control" required>
								<option value="">--- Pilih ---</option>
								<option value="KK" @if(count($errors) > 0) @if(old('kedudukan') == "KK") selected @endif @endif>Kepala Keluarga</option>
								<option value="Ist" @if(count($errors) > 0) @if(old('kedudukan') == "Ist") selected @endif @endif>Istri</option>
								<option value="AK" @if(count($errors) > 0) @if(old('kedudukan') == "AK") selected @endif @endif>Anak Kandung</option>
								<option value="AA" @if(count($errors) > 0) @if(old('kedudukan') == "AA") selected @endif @endif>Anak Angkat</option>
								<option value="Pemb" @if(count($errors) > 0) @if(old('kedudukan') == "Pemb") selected @endif @endif>Pembantu</option>
							</select>

							@if ($errors->has('kedudukan'))
								<span for="kedudukan" class="help-block">{{ $errors->first('kedudukan') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('nik')) has-error @endif'>
							<label class='control-label'>NIK</label>
							<input type='text' placeholder='NIK' class='form-control limited' id='nik' name='nik' maxlength='16' value='@if(count($errors) > 0){{old('nik')}}@endif'>

							@if ($errors->has('nik'))
								<span for="nik" class="help-block">{{ $errors->first('nik') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('no_kk')) has-error @endif'>
							<label class='control-label'>No KK</label>
							<input type='text' placeholder='No KK' class='form-control limited' id='no_kk' name='no_kk' maxlength='45' value='@if(count($errors) > 0){{old('no_kk')}}@endif'>

							@if ($errors->has('no_kk'))
								<span for="no_kk" class="help-block">{{ $errors->first('no_kk') }}</span>
							@endif
						</div>
						<div class='form-group'>
							<label class='control-label'>Keterangan</label>
							<textarea class='form-control limited' id='keterangan' cols='10' rows='4' name='keterangan' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('keterangan')}}@endif</textarea>
						</div>				
						<hr>
						<div class='form-group @if($errors->has('tgl_datang')) has-error @endif'>
							<label class='control-label'>Tanggal Kedatangan</label>
							<div class="input-group">
								<input name="tgl_datang" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_datang')}}@endif" placeholder="Tanggal Kedatangan" required autocomplete="off">
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div>

							@if ($errors->has('tgl_datang'))
								<span for="tgl_datang" class="help-block">{{ $errors->first('tgl_datang') }}</span>
							@endif
						</div>
						<div class='form-group'>
							<label class='control-label'>Datang Dari</label>
							<textarea class='form-control limited' id='tmp_datang' cols='10' rows='4' name='tmp_datang' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('tmp_datang')}}@endif</textarea>
						</div>				
					</div>
				</div>
			</div>
			<div class="modal-footer">				
				<input name="simpan" value="Simpan" type="submit" class="btn btn-green">
			</div>
		</form>
	</div>

	<div id="hapus" class="modal fade modal-crud" tabindex="-1" data-replace="true" style="display: none;">
		<form action="{{url('data-mutasi-penduduk-desa/pengurangan')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Mutasi Penduduk Desa</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						
						<div class='form-group @if($errors->has('nama')) has-error @endif'>
							<label class='control-label'>Nama / NIK</label>
							<select name="nama" id="nama" class="form-control search-select">
								<option value="">-- Pilih --</option>
								@foreach ($datainduk as $d)
									@php if(CekData("mutasi_penduduk","data_induk_id",$d->id)){ continue; } @endphp
									<option value="{{$d->id}}">{{$d->nama}}/{{$d->nik}}</option>
								@endforeach
							</select>

							@if ($errors->has('nama'))
								<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('pengurangan')) has-error @endif'>
							<label class='control-label'>Pengurangan</label>
							<br>
							<label class='radio-inline'>
								<input type='radio' name='jenis' class='square-green' value='pindah'>
								Pindah
							</label>
							<label class='radio-inline'>
								<input type='radio' name='jenis' class='square-green' value='meninggal'>
								Meninggal
							</label>

							@if ($errors->has('jenis'))
								<span for="jenis" class="help-block">{{ $errors->first('jenis') }}</span>
							@endif
						</div>	
						<div class='form-group @if($errors->has('tanggal')) has-error @endif'>
							<label class='control-label'>Tanggal</label>
							<div class="input-group">
								<input type="text" name="tanggal" value="@if(count($errors) > 0){{old('tanggal')}}@endif" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker">
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div>
						</div>
						<div class='form-group'>
							<label class='control-label'>Lokasi</label>
							<textarea class='form-control limited' id='tempat' cols='10' rows='4' name='tempat' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('tempat')}}@endif</textarea>
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

@endsection
