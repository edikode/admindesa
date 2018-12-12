@extends('layouts.template')

@section('title', 'Data Rencana Kerja Pembangunan Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Rencana Kerja Pembangunan Desa</li>
@endsection

@section('button', '')
@section('main')

	<div class="row">
		<div class="col-sm-12">	
			@include('errors/pesan_muncul')				
			<div class="clear panel panel-default">						
				<div class="panel-body">
					<div class="row">
						<div class="col-md-8">
							<h4>Data Rencana Kerja Pembangunan Desa</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('rencana-kerja-pembangunan-desa/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>
								<th rowspan="2" class="no">Nomor Urut</th>
								<th rowspan="2">Nama<br>Proyek/<br>Kegiatan</th>
								<th rowspan="2">Lokasi</th>
								<th colspan="4">Sumber Biaya</th>
								<th rowspan="2">J<br>u<br>m<br>l<br>a<br>h</th>
								<th rowspan="2">Pelaksana</th>
								<th rowspan="2">Manfaat</th>
								{{-- <th rowspan="2">KET.</th> --}}
								<th rowspan="2">Opsi</th>
							</tr>
							<tr>
								<th>Pemerintah</th>
								<th>Provinsi</th>
								<th>Kab/Kota</th>
								<th>Swadaya</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($rencanakerja as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->nama}}</td>
									<td>{{$p->lokasi}}</td>
									<td>{{angkaRupiah($p->pemerintah)}}</td>
									<td>{{angkaRupiah($p->provinsi)}}</td>
									<td>{{angkaRupiah($p->kota)}}</td>
									<td>{{angkaRupiah($p->swadaya)}}</td>
									<td>{{angkaRupiah($p->pemerintah+$p->provinsi+$p->kota+$p->swadaya)}}</td>
									<td>{{$p->pelaksana}}</td>
									<td>{{$p->manfaat}}</td>
									{{-- <td>{{$p->keterangan}}</td> --}}
									
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('rencana-kerja-pembangunan-desa/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('rencana-kerja-pembangunan-desa/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('rencana-kerja-pembangunan-desa', $p->id)}}" method="post" style="display: inline-block;">
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
				<form action="{{url('rencana-kerja-pembangunan-desa')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Tambah Data Rencana Kerja Pembangunan Desa</h4>
					</div>		
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nama')) has-error @endif'>
									<label class='control-label'>Nama Proyek/Kegiatan</label>
									<input type='text' placeholder='Nama Proyek/Kegiatan' class='form-control limited' id='nama' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@endif'
									required>

									@if ($errors->has('nama'))
										<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('lokasi')) has-error @endif'>
									<label class='control-label'>Lokasi</label>
									<input type='text' placeholder='Lokasi' class='form-control limited' id='lokasi' name='lokasi' maxlength='100' value='@if(count($errors) > 0){{old('lokasi')}}@endif'
									required>

									@if ($errors->has('lokasi'))
										<span for="lokasi" class="help-block">{{ $errors->first('lokasi') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('biaya')) has-error @endif'>
									<label class='control-label'>Sumber Biaya</label>
									<div class="row">
										<div class="col-md-3">
											<input type='number' placeholder='Dari Pemerintah' class='form-control limited' id='pemerintah' name='pemerintah' maxlength='10' value='@if(count($errors) > 0){{old('pemerintah')}}@endif' required>

											@if ($errors->has('pemerintah'))
												<span for="pemerintah" class="help-block">{{ $errors->first('pemerintah') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Dari Provinsi' class='form-control limited' id='provinsi' name='provinsi' maxlength='10' value='@if(count($errors) > 0){{old('provinsi')}}@endif' required>

											@if ($errors->has('provinsi'))
												<span for="provinsi" class="help-block">{{ $errors->first('provinsi') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Dari Kabupaten' class='form-control limited' id='kota' name='kota' maxlength='10' value='@if(count($errors) > 0){{old('kota')}}@endif' required>

											@if ($errors->has('kota'))
												<span for="kota" class="help-block">{{ $errors->first('kota') }}</span>
											@endif
										</div>
										<div class="col-md-3">
											<input type='number' placeholder='Swadaya' class='form-control limited' id='swadaya' name='swadaya' maxlength='10' value='@if(count($errors) > 0){{old('swadaya')}}@endif' required>

											@if ($errors->has('swadaya'))
												<span for="swadaya" class="help-block">{{ $errors->first('swadaya') }}</span>
											@endif
										</div>
									</div>
								</div>
								<div class='form-group @if($errors->has('pelaksana')) has-error @endif'>
									<label class='control-label'>Pelaksana</label>
									<input type='text' placeholder='Pelaksana' class='form-control limited' id='pelaksana' name='pelaksana' maxlength='100' value='@if(count($errors) > 0){{old('pelaksana')}}@endif'
									required>

									@if ($errors->has('pelaksana'))
										<span for="pelaksana" class="help-block">{{ $errors->first('pelaksana') }}</span>
									@endif
								</div>
								<div class='form-group'>
									<label class='control-label'>Manfaat</label>
									<textarea class='form-control limited' id='manfaat' cols='10' rows='4' name='manfaat' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('manfaat')}}@endif</textarea>
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

@endsection
