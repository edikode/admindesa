@extends('layouts.template')

@section('title', 'Data Inventaris Hasil-Hasil Pembangunan')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Inventaris Hasil-Hasil Pembangunan</li>
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
							<h4>Data Inventaris Hasil-Hasil Pembangunan</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('inventaris-hasil-pembangunan/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>
								<th class="no">Nomor Urut</th>
								<th>Jenis/Nama Hasil<br>Pembangunan</th>
								<th>Volume</th>
								<th>Biaya</th>
								<th>Lokasi</th>
								<th>Keterangan</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($inventarispembangunan as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->nama}}</td>
									<td>{{$p->volume}}</td>
									<td>{{angkaRupiah($p->biaya)}}</td>
									<td>{{$p->lokasi}}</td>
									<td>{{$p->keterangan}}</td>
									
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('inventaris-hasil-pembangunan/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('inventaris-hasil-pembangunan/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('inventaris-hasil-pembangunan', $p->id)}}" method="post" style="display: inline-block;">
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
				<form action="{{url('inventaris-hasil-pembangunan')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Tambah Data Inventaris Hasil-Hasil Pembangunan</h4>
					</div>		
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nama')) has-error @endif'>
									<label class='control-label'>Jenis/Nama Hasil Pembangunan</label>
									<input type='text' placeholder='Jenis/Nama Hasil Pembangunan' class='form-control limited' id='nama' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@endif'
									required>

									@if ($errors->has('nama'))
										<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('volume')) has-error @endif'>
									<label class='control-label'>Volume</label>
									<input type='text' placeholder='Volume' class='form-control limited' id='volume' name='volume' maxlength='100' value='@if(count($errors) > 0){{old('volume')}}@endif'
									required>

									@if ($errors->has('volume'))
										<span for="volume" class="help-block">{{ $errors->first('volume') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('biaya')) has-error @endif'>
									<label class='control-label'>Biaya</label>
									
									<input type='number' placeholder='Biaya' class='form-control limited' id='biaya' name='biaya' maxlength='10' value='@if(count($errors) > 0){{old('biaya')}}@endif' required>

									@if ($errors->has('biaya'))
										<span for="biaya" class="help-block">{{ $errors->first('biaya') }}</span>
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
