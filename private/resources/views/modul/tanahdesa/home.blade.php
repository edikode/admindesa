@extends('layouts.template')

@section('title', 'Data Tanah Di Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Tanah Di Desa</li>
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
							<h4>Data Tanah Di Desa</h4>
						</div>
						<div class="col-md-4">
							<a class="btn btn-large btn-warning item" href="{{url('data-tanah-di-desa/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Tambah</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>
								<th class="no" rowspan="3">Nomor<br>Urut</th>
								<th rowspan="3">Nama<br>Per-<br>Orangan<br>/ Badan<br>Hukum</th>
								<th rowspan="3">JML<br>(m<sup>2</sup>)</th>
								<th colspan="8">Status Hak Tanah (m<sup>2</sup>)</th>
								<th colspan="14">Penggunaan Tanah (m<sup>2</sup>)</th>
								{{-- <th rowspan="3">KET.</th> --}}
								<th rowspan="3">Opsi</th>
							</tr>
							<tr>
								<th colspan="5">Sudah Bersertifikat</th>
								<th colspan="3">Belum<br>Bersertifikat</th>	
								<th colspan="5">Non Pertanian</th>
								<th colspan="9">Pertanian</th>
							</tr>
							<tr>
								<th>HM</th>
								<th>HGM</th>
								<th>HP</th>
								<th>HGU</th>
								<th>HPL</th>
								<th>MA</th>
								<th>VI</th>
								<th>TN</th>
								<th>Perumahan</th>
								<th>Perdagangan<br>Dan Jasa</th>
								<th>Perkantoran</th>
								<th>Industri</th>
								<th>Fasilitas<br>Umum</th>
								<th>Sawah</th>
								<th>Tegalan</th>
								<th>Perkebunan</th>
								<th>Peternakan<br>/<br>Perikanan</th>
								<th>Hutan<br>Belukar</th>
								<th>Hutan<br>Lebat /<br>Lindung</th>
								<th>Mutasi<br>Tanah<br>Di<br>Desa</th>
								<th>Tanah<br>Kosong</th>
								<th>Lain-<br>Lain</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($tanahdesa as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->nama}}</td>
									<td>{{$p->jumlah}}</td>
									<td>@if($p->status == "HM"){{$p->luas}}@else 0 @endif</td>
									<td>@if($p->status == "HGM"){{$p->luas}}@else 0 @endif</td>
									<td>@if($p->status == "HP"){{$p->luas}}@else 0 @endif</td>
									<td>@if($p->status == "HGU"){{$p->luas}}@else 0 @endif</td>
									<td>@if($p->status == "HPL"){{$p->luas}}@else 0 @endif</td>
									<td>@if($p->status == "MA"){{$p->luas}}@else 0 @endif</td>
									<td>@if($p->status == "VI"){{$p->luas}}@else 0 @endif</td>
									<td>@if($p->status == "TN"){{$p->luas}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Perumahan"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Perdagangan"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Perkantoran"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Industri"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Fasilitas"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Sawah"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Tegalan"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Perkebunan"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Perternakan"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Hutan"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Hutan Lindung"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Mutasi"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Kosong"){{$p->luas_penggunaan}}@else 0 @endif</td>
									<td>@if($p->penggunaan_tanah == "Lain-Lain"){{$p->luas_penggunaan}}@else 0 @endif</td>
									{{-- <td>{{$p->keterangan}}</td> --}}
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-tanah-di-desa/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-tanah-di-desa/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-tanah-di-desa', $p->id)}}" method="post" style="display: inline-block;">
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
		<form action="{{url('data-tanah-di-desa')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Tanah Di Desa</h4>
			</div>		
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class='form-group @if($errors->has('nama')) has-error @endif'>
							<label class='control-label'>Nama Perorangan / Badan Hukum</label>
							<input type='text' placeholder='Nama Perorangan / Badan Hukum' class='form-control limited' id='nama' name='nama' maxlength='45' value='@if(count($errors) > 0){{old('nama')}}@endif'
							required>

							@if ($errors->has('nama'))
								<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('jumlah')) has-error @endif'>
							<label class='control-label'>Jumlah (m<sup>2</sup>)</label>
							<input type='number' placeholder='luas tanah dalam meter persegi' class='form-control limited' id='jumlah' name='jumlah' maxlength='10' value='@if(count($errors) > 0){{old('jumlah')}}@endif'
							required>

							@if ($errors->has('jumlah'))
								<span for="jumlah" class="help-block">{{ $errors->first('jumlah') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('status')) has-error @endif'>
							{{-- <label class='control-label'>Status Hak Tanah (M<sup>2</sup>)</label> --}}
							<div class="row">
								<div class="col-md-6">
									<label class='control-label'>Sudah Bersertifikat</label>
									<br>
									<label class='radio'>
										<input type='radio' name='status' class='square-green' value='HM' @if(count($errors) > 0) @if(old('status') == 'HM') checked @endif @endif>
										Hak Milik
									</label>
									<label class='radio'>
										<input type='radio' name='status' class='square-green' value='HGM' @if(count($errors) > 0)  @if(old('status') == 'HGM') checked @endif  @endif>
										Hak Guna Bangun
									</label>
									<label class='radio'>
										<input type='radio' name='status' class='square-green' value='HP' @if(count($errors) > 0)  @if(old('status') == 'HP') checked @endif  @endif>
										Hak Pakai
									</label>
									<label class='radio'>
										<input type='radio' name='status' class='square-green' value='HGU' @if(count($errors) > 0)  @if(old('status') == 'HGU') checked @endif  @endif>
										Hak Guna Usaha
									</label>
									<label class='radio'>
										<input type='radio' name='status' class='square-green' value='HPL' @if(count($errors) > 0)  @if(old('status') == 'HPL') checked @endif  @endif>
										Hak Pengelolaan
									</label>
								</div>
								<div class="col-md-6">
									<label class='control-label'>Belum Bersertifikat</label>
									<br>
									<label class='radio'>
										<input type='radio' name='status' class='square-green' value='MA' @if(count($errors) > 0)  @if(old('status') == 'MA') checked @endif  @endif>
										Hak Milik Adat
									</label>
									<label class='radio'>
										<input type='radio' name='status' class='square-green' value='VI' @if(count($errors) > 0)  @if(old('status') == 'VI') checked @endif  @endif>
										Hak Verdoping Indonesia(Milik Pribumi)
									</label>
									<label class='radio'>
										<input type='radio' name='status' class='square-green' value='TN' @if(count($errors) > 0)  @if(old('status') == 'TN') checked @endif  @endif>
										Tanah Negara
									</label>
								</div>
							</div>
							

							@if ($errors->has('status'))
								<span for="status" class="help-block">{{ $errors->first('status') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('luas')) has-error @endif'>
							<label class='control-label'>Luas Hak Tanah (M<sup>2</sup>)</label>
							<input type='number' placeholder='Luas Hak Tanah' class='form-control limited' id='luas' name='luas' maxlength='10' value='@if(count($errors) > 0){{old('luas')}}@endif'
							required>

							@if ($errors->has('luas'))
								<span for="luas" class="help-block">{{ $errors->first('luas') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('penggunaan')) has-error @endif'>
							{{-- <label class='control-label'>Status Hak Tanah (M<sup>2</sup>)</label> --}}
							<div class="row">
								<div class="col-md-6">
									<label class='control-label'>Penggunaan Tanah Non Pertanian</label>
									<br>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Perumahan' @if(count($errors) > 0)  @if(old('penggunaan') == 'Perumahan') checked @endif  @endif>
										Perumahan
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Perdagangan' @if(count($errors) > 0)   @if(old('penggunaan') == 'Perdagangan') checked @endif  @endif>
										Perdagangan Dan Jasa
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Perkantoran' @if(count($errors) > 0)   @if(old('penggunaan') == 'Perkantoran') checked @endif  @endif>
										Perkantoran
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Industri' @if(count($errors) > 0)   @if(old('penggunaan') == 'Industri') checked @endif  @endif>
										Industri
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Fasilitas' @if(count($errors) > 0)   @if(old('penggunaan') == 'Fasilitas') checked @endif  @endif>
										Fasilitas Umum
									</label>
								</div>
								<div class="col-md-6">
									<label class='control-label'>Penggunaan Tanah Pertanian</label>
									<br>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Sawah' @if(count($errors) > 0)   @if(old('penggunaan') == 'Sawah') checked @endif  @endif>
										Sawah
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Tegalan' @if(count($errors) > 0)   @if(old('penggunaan') == 'Tegalan') checked @endif  @endif>
										Tegalan
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Perkebunan' @if(count($errors) > 0)   @if(old('penggunaan') == 'Perkebunan') checked @endif  @endif>
										Perkebunan
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Peternakan' @if(count($errors) > 0)   @if(old('penggunaan') == 'Peternakan') checked @endif  @endif>
										Peternakan/Perikanan
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Hutan' @if(count($errors) > 0)   @if(old('penggunaan') == 'Hutan') checked @endif  @endif>
										Hutan Belukar
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Hutan Lindung' @if(count($errors) > 0)   @if(old('penggunaan') == 'Hutan Lindung') checked @endif  @endif>
										Hutan Lebat/Lindung
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Mutasi' @if(count($errors) > 0)   @if(old('penggunaan') == 'Mutasi') checked @endif  @endif>
										Mutasi Tanah Di Desa
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Kosong' @if(count($errors) > 0)   @if(old('penggunaan') == 'Kosong') checked @endif  @endif>
										Tanah Kosong
									</label>
									<label class='radio'>
										<input type='radio' name='penggunaan' class='square-green' value='Lain-Lain' @if(count($errors) > 0)   @if(old('penggunaan') == 'Lain-lain') checked @endif  @endif>
										Lain-Lain
									</label>
								</div>
							</div>
							

							@if ($errors->has('status'))
								<span for="status" class="help-block">{{ $errors->first('status') }}</span>
							@endif
						</div>
						<div class='form-group @if($errors->has('luas_penggunaan')) has-error @endif'>
							<label class='control-label'>Luas Penggunaan Tanah (M<sup>2</sup>)</label>
							<input type='number' placeholder='Luas Penggunaan Tanah' class='form-control limited' id='luas_penggunaan' name='luas_penggunaan' maxlength='10' value='@if(count($errors) > 0){{old('luas_penggunaan')}}@endif'
							required>

							@if ($errors->has('luas_penggunaan'))
								<span for="luas_penggunaan" class="help-block">{{ $errors->first('luas_penggunaan') }}</span>
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
