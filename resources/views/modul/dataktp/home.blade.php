@extends('layouts.template')

@section('title', 'Data Kartu Tanda Penduduk dan Kartu Keluarga')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Kartu Tanda Penduduk dan Kartu Keluarga</li>
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
							<h4>Data Kartu Tanda Penduduk dan Kartu Keluarga</h4>
						</div>
						<div class="col-md-6">
							<a class="btn btn-large btn-warning item" href="{{url('data-ktp-dan-kk/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Penambahan</a>
						</div>
					</div>
					<hr style="margin-top:0px">

					
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th class="no" rowspan="2">Nomor Urut</th>
								<th rowspan="2">No. KK</th>
								<th rowspan="2">Nama<br>Lengkap</th>
								<th rowspan="2">NIK</th>
								<th rowspan="2">Jenis Kelamin</th>
								<th rowspan="2">Tempat / Tanggal Lahir</th>
								<th rowspan="2">Gol.  Darah</th>
								<th rowspan="2">Agama</th>
								<th rowspan="2">Pendidikan</th>
								<th rowspan="2">Pekerjaan</th>
								<th rowspan="2">Alamat</th>
								<th rowspan="2">Status<br>Perkawinan</th>
								<th rowspan="2">Tempat dan Tanggal Dikeluarkan</th>
								<th rowspan="2">Status Hub. Keluarga</th>
								<th rowspan="2">Kewarganegaraan</th>
								<th colspan="2">Orang Tua</th>
								<th rowspan="2">TGL Mulai Tinggal Di Desa</th>
								{{-- <th rowspan="2">KET.</th> --}}
								<th class="pilihan" rowspan="2">Opsi</th>
							</tr>
							<tr>
								<th>Ayah</th>
								<th>Ibu</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($dataktp as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->no_kk}}</td>
									<td>{{$p->nama}}</td>
									<td>{{$p->nik}}</td>
									<td>{{$p->jenis_kelamin}}</td>
									<td>{{$p->tmp_lahir}}, {{tgl_id($p->tgl_lahir)}}</td>
									<td>{{$p->gol_darah}}</td>
									<td>{{$p->agama}}</td>
									<td>{{$p->pendidikan_terakhir}}</td>
									<td>{{$p->pekerjaan}}</td>
									<td>{{$p->alamat}}</td>
									<td>{{$p->status}}</td>
									<td>{{$p->tmp_dikeluarkan}}, {{tgl_id($p->tgl_dikeluarkan)}}</td>
									<td>{{$p->status_dikeluarga}}</td>
									<td>{{$p->kewarganegaraan}}</td>
									<td>{{$p->ayah}}</td>
									<td>{{$p->ibu}}</td>
									<td>{{$p->tgl_didesa}}</td>
									{{-- <td>{{$p->keterangan}}</td> --}}
									
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-ktp-dan-kk/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-ktp-dan-kk/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-ktp-dan-kk', $p->id)}}" method="post" style="display: inline-block;">
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
		<form action="{{url('data-ktp-dan-kk')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Kartu Tanda Penduduk dan Kartu Keluarga</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('nama')) has-error @endif'>
							<label class='control-label'>Nama / NIK</label>
							<select name="nama" id="nama" class="form-control search-select">
								<option value="">-- Pilih --</option>
								@foreach ($datainduk as $d)
									<option value="{{$d->id}}">{{$d->nama}}/{{$d->nik}}</option>
								@endforeach
							</select>

							@if ($errors->has('nama'))
								<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
							@endif
						</div>	
						<div class="row">
							<div class="col-md-8">
								<div class='form-group @if($errors->has('tmp_dikeluarkan')) has-error @endif'>
									<label class='control-label'>Tempat Dikeluarkan</label>
									<input type='text' placeholder='Tempat Dikeluarkan' class='form-control limited' id='tmp_dikeluarkan' name='tmp_dikeluarkan' maxlength='100' value='@if(count($errors) > 0){{old('tmp_dikeluarkan')}}@endif' required>

									@if ($errors->has('tmp_dikeluarkan'))
										<span for="tmp_dikeluarkan" class="help-block">{{ $errors->first('tmp_dikeluarkan') }}</span>
									@endif
								</div>
							</div>
							<div class="col-md-4">
								<div class='form-group @if($errors->has('tgl_dikeluarkan')) has-error @endif'>
									<label class='control-label'>Tanggal Dikeluarkan</label>
									<div class="input-group">
										<input name="tgl_dikeluarkan" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_dikeluarkan')}}@endif" required>
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
								<option value="Ayah" @if(count($errors) > 0) @if($errors->first('status_dikeluarga') == "Ayah") selected @endif @endif>Ayah</option>
								<option value="Ibu" @if(count($errors) > 0) @if($errors->first('status_dikeluarga') == "Ibu") selected @endif @endif>Ibu</option>
								<option value="Anak" @if(count($errors) > 0) @if($errors->first('status_dikeluarga') == "Anak") selected @endif @endif>Anak</option>
								<option value="Lainnya" @if(count($errors) > 0) @if($errors->first('status_dikeluarga') == "Lainnya") selected @endif @endif>Lainnya</option>
							</select>

							@if ($errors->has('status_dikeluarga'))
								<span for="status_dikeluarga" class="help-block">{{ $errors->first('status_dikeluarga') }}</span>
							@endif
						</div>					
						<div class='form-group @if($errors->has('ayah')) has-error @endif'>
							<label class='control-label'>Nama Ayah</label>
							<input type='text' placeholder='Nama Ayah' class='form-control limited' id='ayah' name='ayah' maxlength='100' value='@if(count($errors) > 0){{old('ayah')}}@endif'>

							@if ($errors->has('ayah'))
								<span for="ayah" class="help-block">{{ $errors->first('ayah') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('ibu')) has-error @endif'>
							<label class='control-label'>Nama Ibu</label>
							<input type='text' placeholder='Nama Ibu' class='form-control limited' id='ibu' name='ibu' maxlength='100' value='@if(count($errors) > 0){{old('ibu')}}@endif'>

							@if ($errors->has('ibu'))
								<span for="ibu" class="help-block">{{ $errors->first('ibu') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('tgl_didesa')) has-error @endif'>
							<div class="input-group">
								<input name="tgl_didesa" type="text" data-date-format="dd-mm-yyyy" data-date-viewmode="years" class="form-control date-picker" value="@if(count($errors) > 0){{old('tgl_didesa')}}@endif" required>
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
							</div>

							@if ($errors->has('tgl_didesa'))
								<span for="tgl_didesa" class="help-block">{{ $errors->first('tgl_didesa') }}</span>
							@endif
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
