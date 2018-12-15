@extends('layouts.template')

@section('title', 'Edit Data Tanah Di Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Edit Data Tanah Di Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-tanah-di-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">				
			<div class="panel panel-default">
				<div class="panel-body">	
					<form action="{{ url('data-tanah-di-desa/'. $kd->id) }}" method="post" enctype="multipart/form-data">				
						<div class="row">
							<div class="col-md-12">
								@include('errors/pesan_muncul')								
							</div>
							<div class="col-md-12">
								<div class='form-group @if($errors->has('nama')) has-error @endif'>
									<label class='control-label'>Nama Perorangan / Badan Hukum</label>
									<input type='text' placeholder='Nama Perorangan / Badan Hukum' class='form-control limited' id='nama' name='nama' maxlength='100' value='@if(count($errors) > 0){{old('nama')}}@else{{$kd->nama}}@endif'
									required>

									@if ($errors->has('nama'))
										<span for="nama" class="help-block">{{ $errors->first('nama') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('jumlah')) has-error @endif'>
									<label class='control-label'>Jumlah (m<sup>2</sup>)</label>
									<input type='text' placeholder='luas tanah dalam meter persegi' class='form-control limited' id='jumlah' name='jumlah' maxlength='100' value='@if(count($errors) > 0){{old('jumlah')}}@else{{$kd->jumlah}}@endif'
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
												<input type='radio' name='status' class='square-green' value='HM' @if($kd->status == "HM") checked @endif>
												Hak Milik
											</label>
											<label class='radio'>
												<input type='radio' name='status' class='square-green' value='HGM' @if($kd->status == "HGM") checked @endif>
												Hak Guna Bangun
											</label>
											<label class='radio'>
												<input type='radio' name='status' class='square-green' value='HP' @if($kd->status == "HP") checked @endif>
												Hak Pakai
											</label>
											<label class='radio'>
												<input type='radio' name='status' class='square-green' value='HGU' @if($kd->status == "HGU") checked @endif>
												Hak Guna Usaha
											</label>
											<label class='radio'>
												<input type='radio' name='status' class='square-green' value='HPL' @if($kd->status == "HPL") checked @endif>
												Hak Pengelolaan
											</label>
										</div>
										<div class="col-md-6">
											<label class='control-label'>Belum Bersertifikat</label>
											<br>
											<label class='radio'>
												<input type='radio' name='status' class='square-green' value='MA' @if($kd->status == "MA") checked @endif>
												Hak Milik Adat
											</label>
											<label class='radio'>
												<input type='radio' name='status' class='square-green' value='VI' @if($kd->status == "VI") checked @endif>
												Hak Verdoping Indonesia(Milik Pribumi)
											</label>
											<label class='radio'>
												<input type='radio' name='status' class='square-green' value='TN' @if($kd->status == "TN") checked @endif>
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
									<input type='text' placeholder='Luas Hak Tanah' class='form-control limited' id='luas' name='luas' maxlength='100' value='@if(count($errors) > 0){{old('luas')}}@else{{$kd->luas}}@endif'
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
												<input type='radio' name='penggunaan' class='square-green' value='Perumahan' @if($kd->penggunaan_tanah == "Perumahan") checked @endif>
												Perumahan
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Perdagangan' @if($kd->penggunaan_tanah == "Perdagangan") checked @endif>
												Perdagangan Dan Jasa
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Perkantoran' @if($kd->penggunaan_tanah == "Perkantoran") checked @endif>
												Perkantoran
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Industri' @if($kd->penggunaan_tanah == "Industri") checked @endif>
												Industri
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Fasilitas' @if($kd->penggunaan_tanah == "Fasilitas") checked @endif>
												Fasilitas Umum
											</label>
										</div>
										<div class="col-md-6">
											<label class='control-label'>Penggunaan Tanah Pertanian</label>
											<br>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Sawah' @if($kd->penggunaan_tanah == "Sawah") checked @endif>
												Sawah
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Tegalan' @if($kd->penggunaan_tanah == "Tegalan") checked @endif>
												Tegalan
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Perkebunan' @if($kd->penggunaan_tanah == "Perkebunan") checked @endif>
												Perkebunan
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Peternakan' @if($kd->penggunaan_tanah == "Peternakan") checked @endif>
												Peternakan/Perikanan
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Hutan' @if($kd->penggunaan_tanah == "Hutan") checked @endif>
												Hutan Belukar
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Hutan Lindung' @if($kd->penggunaan_tanah == "Hutan Lindung") checked @endif>
												Hutan Lebat/Lindung
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Mutasi' @if($kd->penggunaan_tanah == "Mutasi") checked @endif>
												Mutasi Tanah Di Desa
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Kosong' @if($kd->penggunaan_tanah == "Kosong") checked @endif>
												Tanah Kosong
											</label>
											<label class='radio'>
												<input type='radio' name='penggunaan' class='square-green' value='Lain-Lain' @if($kd->penggunaan_tanah == "Lain-Lain") checked @endif>
												Lain-Lain
											</label>
										</div>
									</div>
									

									@if ($errors->has('penggunaan'))
										<span for="status" class="help-block">{{ $errors->first('penggunaan') }}</span>
									@endif
								</div>
								<div class='form-group @if($errors->has('luas_penggunaan')) has-error @endif'>
									<label class='control-label'>Luas Penggunaan Tanah (M<sup>2</sup>)</label>
									<input type='text' placeholder='Luas Penggunaan Tanah' class='form-control limited' id='luas_penggunaan' name='luas_penggunaan' maxlength='100' value='@if(count($errors) > 0){{old('luas_penggunaan')}}@else{{$kd->luas_penggunaan}}@endif'
									required>

									@if ($errors->has('luas_penggunaan'))
										<span for="luas_penggunaan" class="help-block">{{ $errors->first('luas_penggunaan') }}</span>
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
