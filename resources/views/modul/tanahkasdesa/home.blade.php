@extends('layouts.template')

@section('title', 'Data Tanah Kas Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Tanah Kas Desa</li>
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
							<h4>Data Tanah Kas Desa</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('data-tanah-kas-desa/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>
								<th class="no" rowspan="3">Nomor<br>Urut</th>
								<th rowspan="3">Asal<br>Tanah<br>Kas<br>Desa</th>
								<th rowspan="3">Nomor<br>Serti-<br>fikat<br>Buku<br>Letter<br>C/<br>Persil</th>
								<th rowspan="3">Luas<br>(m)</th>
								<th rowspan="3">Kelas</th>
								<th colspan="6">Perolehan TKD</th>
								<th colspan="5">Jenis TKD</th>
								<th colspan="2">Patok<br>Tanda<br>Batas</th>
								<th colspan="2">Papan<br>Nama</th>
								<th rowspan="3">Lokasi</th>
								<th rowspan="3">Peruntukan</th>
								<th rowspan="3">Mutasi</th>
								{{-- <th rowspan="3">KET.</th> --}}
								<th rowspan="3">Opsi</th>
							</tr>
							<tr>
								<th rowspan="2">Asli<br>Milik<br>Desa</th>
								<th colspan="3">
									Bantuan
								</th>	
								<th rowspan="2">Lain-<br>Lain</th>
								<th rowspan="2">Tgl<br>Perolehan</th>
								<th rowspan="2">Sa<br>wah</th>
								<th rowspan="2">Te<br>gal</th>
								<th rowspan="2">Ke<br>bun</th>
								<th rowspan="2">Tambak/<br>Kolam</th>
								<th rowspan="2">Tanah<br>Kering/<br>Darat</th>
								<th rowspan="2">Ada</th>
								<th rowspan="2">Tdk<br>Ada</th>
								<th rowspan="2">Ada</th>
								<th rowspan="2">Tdk<br>Ada</th>
							</tr>
							<tr>
								<th>Peme<br>rintah</th>
								<th>Prov</th>
								<th>Kab/<br>Kota</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($tanahkasdesa as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->asal}}</td>
									<td>{{$p->nomor_sertifikat}}</td>
									<td>{{$p->luas}}</td>
									<td>{{$p->kelas}}</td>
									<td>{{$p->asli}}</td>
									<td>{{$p->pemerintah}}</td>
									<td>{{$p->provinsi}}</td>
									<td>{{$p->kota}}</td>
									<td>{{$p->lainlain}}</td>
									<td>{{tgl_id($p->tgl_perolehan)}}</td>
									<td>{{$p->sawah}}</td>
									<td>{{$p->tegal}}</td>
									<td>{{$p->kebun}}</td>
									<td>{{$p->tambak}}</td>
									<td>{{$p->darat}}</td>
									<td>@if($p->patok_batas == "Sudah Ada"){{$p->patok_batas}}@endif</td>
									<td>@if($p->patok_batas == "Belum Ada"){{$p->patok_batas}}@endif</td>
									<td>@if($p->papan_nama == "Sudah Ada"){{$p->papan_nama}}@endif</td>
									<td>@if($p->papan_nama == "Belum Ada"){{$p->papan_nama}}@endif</td>
									<td>{{$p->lokasi}}</td>
									<td>{{$p->peruntukan}}</td>
									<td>{{$p->mutasi}}</td>
									{{-- <td>{{$p->keterangan}}</td> --}}
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-tanah-kas-desa/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-tanah-kas-desa/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-tanah-kas-desa', $p->id)}}" method="post" style="display: inline-block;">
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
		<form action="{{url('data-tanah-kas-desa')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Tanah Kas Desa</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('asal')) has-error @endif'>
							<label class='control-label'>Asal Tanah Kas Desa</label>
							<input type='text' placeholder='Asal Tanah Kas Desa' class='form-control limited' id='asal' name='asal' maxlength='100' value='@if(count($errors) > 0){{old('asal')}}@endif'
							required>

							@if ($errors->has('asal'))
								<span for="asal" class="help-block">{{ $errors->first('asal') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('nomor_sertifikat')) has-error @endif'>
							<label class='control-label'>Nomor Sertifikat</label>
							<input type='text' placeholder='nomor sertifikat, atau buku Letter C, atau Persil' class='form-control limited' id='nomor_sertifikat' name='nomor_sertifikat' maxlength='100' value='@if(count($errors) > 0){{old('asal')}}@endif'
							required>

							@if ($errors->has('nomor_sertifikat'))
								<span for="nomor_sertifikat" class="help-block">{{ $errors->first('nomor_sertifikat') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('luas')) has-error @endif'>
							<label class='control-label'>Luas Tanah</label>
							<input type='text' placeholder='luas tanah kas Desa dalam meter persegi (M2)' class='form-control limited' id='luas' name='luas' maxlength='100' value='@if(count($errors) > 0){{old('luas')}}@endif'
							required>

							@if ($errors->has('luas'))
								<span for="luas" class="help-block">{{ $errors->first('luas') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('kelas')) has-error @endif'>
							<label class='control-label'>Kelas</label>
							<br>
							<label class='radio-inline'>
								<input type='radio' name='kelas' class='square-green' value='S1'>
								S1
							</label>
							<label class='radio-inline'>
								<input type='radio' name='kelas' class='square-green' value='D1'>
								D1
							</label>
							<label class='radio-inline'>
								<input type='radio' name='kelas' class='square-green' value='Lainnya'>
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
									<input type='number' placeholder='Asli Milik Desa' class='form-control limited' id='asli' name='asli' maxlength='10' value='@if(count($errors) > 0){{old('asli')}}@endif' required>

									@if ($errors->has('asli'))
										<span for="asli" class="help-block">{{ $errors->first('asli') }}</span>
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
									<input type='number' placeholder='Bantuan Lainnya' class='form-control limited' id='lainlain' name='lainlain' maxlength='10' value='@if(count($errors) > 0){{old('lainlain')}}@endif' required>

									@if ($errors->has('lainlain'))
										<span for="lainlain" class="help-block">{{ $errors->first('lainlain') }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class='form-group @if($errors->has('tgl_perolehan')) has-error @endif'>
							<label class='control-label'>Tanggal Lahir</label>
							
							<input style="width:150px" type="date" name="tgl_perolehan" id="tgl_perolehan" class="form-control" value="@if(count($errors) > 0){{old('tgl_perolehan')}}@endif" required>
						</div>
						<div class='form-group @if($errors->has('jenis_tkd')) has-error @endif'>
							<label class='control-label'>Jenis TKD</label>
							<div class="row">
								<div class="col-md-3">
									<input type='number' placeholder='Sawah' class='form-control limited' id='sawah' name='sawah' maxlength='10' value='@if(count($errors) > 0){{old('sawah')}}@endif' required>

									@if ($errors->has('sawah'))
										<span for="sawah" class="help-block">{{ $errors->first('sawah') }}</span>
									@endif
								</div>
								<div class="col-md-3">
									<input type='number' placeholder='Tegal' class='form-control limited' id='tegal' name='tegal' maxlength='10' value='@if(count($errors) > 0){{old('tegal')}}@endif' required>

									@if ($errors->has('tegal'))
										<span for="tegal" class="help-block">{{ $errors->first('tegal') }}</span>
									@endif
								</div>
								<div class="col-md-3">
									<input type='number' placeholder='Kebun' class='form-control limited' id='kebun' name='kebun' maxlength='10' value='@if(count($errors) > 0){{old('kebun')}}@endif' required>

									@if ($errors->has('kebun'))
										<span for="kebun" class="help-block">{{ $errors->first('kebun') }}</span>
									@endif
								</div>
								<div class="col-md-3">
									<input type='number' placeholder='Tambak/Kolam' class='form-control limited' id='tambak' name='tambak' maxlength='10' value='@if(count($errors) > 0){{old('tambak')}}@endif' required>

									@if ($errors->has('tambak'))
										<span for="tambak" class="help-block">{{ $errors->first('tambak') }}</span>
									@endif
								</div>
								<div class="col-md-3" style="margin-top:10px">
									<input type='number' placeholder='Tanah Kering' class='form-control limited' id='darat' name='darat' maxlength='10' value='@if(count($errors) > 0){{old('darat')}}@endif' required>

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
								<input type='radio' name='patok_batas' class='square-green' value='Sudah Ada'>
								Sudah Ada
							</label>
							<label class='radio-inline'>
								<input type='radio' name='patok_batas' class='square-green' value='Belum Ada'>
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
								<input type='radio' name='papan_nama' class='square-green' value='Sudah Ada'>
								Sudah Ada
							</label>
							<label class='radio-inline'>
								<input type='radio' name='papan_nama' class='square-green' value='Belum Ada'>
								Belum Ada
							</label>

							@if ($errors->has('papan_nama'))
								<span for="papan_nama" class="help-block">{{ $errors->first('papan_nama') }}</span>
							@endif
						</div>	
						<div class='form-group'>
							<label class='control-label'>Lokasi</label>
							<textarea class='form-control limited' id='lokasi' cols='10' rows='4' name='lokasi' style='height:75px; resize:none;' maxlength='160'>@if(count($errors) > 0){{old('lokasi')}}@endif</textarea>
						</div>	
						<div class='form-group @if($errors->has('peruntukan')) has-error @endif'>
							<label class='control-label'>Peruntukan</label>
							<input type='text' placeholder='Peruntukan/pemanfaatan tanah kas Desa' class='form-control limited' id='peruntukan' name='peruntukan' maxlength='100' value='@if(count($errors) > 0){{old('peruntukan')}}@endif'
							required>

							@if ($errors->has('asal'))
								<span for="peruntukan" class="help-block">{{ $errors->first('peruntukan') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('mutasi')) has-error @endif'>
							<label class='control-label'>Mutasi</label>
							<input type='text' placeholder='Diisi setiap terjadi mutasi tanah kas Desa' class='form-control limited' id='mutasi' name='mutasi' maxlength='100' value='@if(count($errors) > 0){{old('mutasi')}}@endif'
							required>

							@if ($errors->has('mutasi'))
								<span for="mutasi" class="help-block">{{ $errors->first('mutasi') }}</span>
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
