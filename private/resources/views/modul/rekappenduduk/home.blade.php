@extends('layouts.template')

@section('title', 'Data Rekapitulasi Jumlah Penduduk')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Data Rekapitulasi Jumlah Penduduk</li>
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
							<h4>Data Rekapitulasi Jumlah Penduduk</h4>
						</div>
						<div class="col-md-6">
							{{-- <a class="btn btn-large btn-warning item" href="{{url('data-rekapitulasi-penduduk/cetak/semua')}}" style="margin-left:10px" target="_blank"><i class="clip-file-pdf"></i> Cetak</a> --}}
							<a class="btn btn-large btn-red item" href="#"  data-target="#hapus" data-toggle="modal" style="margin-left:10px"><i class="clip-exit"></i> Pengurangan</a>
							<a class="btn btn-large btn-green item" href="#"  data-target="#tambah" data-toggle="modal"><i class="clip-plus-circle"></i> Penambahan</a>
						</div>
					</div>
					<hr style="margin-top:0px">
					<div class="row">
						<form action="{{url('data-rekapitulasi-penduduk/cari')}}" method="post">
							{{ csrf_field() }}
							<div class="col-md-2">
								<div class="form-group">
									<!-- panggil fungsi tahun -->
									<label class="control-label">Pilih Bulan</label>
									<select name="bulan" id="bulan" class="form-control search-select" required>
										<option value="">-- Pilih --</option>
										<option value="1" @if($bulan == 1)selected @else @endif>Januari</option>
										<option value="2"  @if($bulan == 2)selected @else @endif>Februari</option>
										<option value="3"  @if($bulan == 3)selected @else @endif>Maret</option>
										<option value="4"  @if($bulan == 4)selected @else @endif>April</option>
										<option value="5"  @if($bulan == 5)selected @else @endif>Mei</option>
										<option value="6"  @if($bulan == 6)selected @else @endif>Juni</option>
										<option value="7"  @if($bulan == 7)selected @else @endif>Juli</option>
										<option value="8"  @if($bulan == 8)selected @else @endif>Agustus</option>
										<option value="9"  @if($bulan == 9)selected @else @endif>September</option>
										<option value="10"  @if($bulan == 10)selected @else @endif>Oktober</option>
										<option value="11"  @if($bulan == 11)selected @else @endif>November</option>
										<option value="12"  @if($bulan == 12)selected @else @endif>Desember</option>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label">Pilih Tahun</label>
									<select name="tahun" id="tahun" class="form-control search-select" required>
										<option value="">-- Pilih --</option>
										@for ($i = 2018; $i < date('Y')+3; $i++)
											<option value="{{$i}}" @if($tahun == $i)selected @else @endif>{{$i}}</option>
										@endfor
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<button type="submit" class="btn btn-green fright" style="margin-top: 25px;">Tampilkan</button>
							</div>
						</form>
					</div>
					<hr>
					
					<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
						<thead>
							<tr>			
								<th class="no" rowspan="4">Nomor Urut</th>
								<th rowspan="4">Nama Dusun/<br>Lingkungan</th>
								<th colspan="7">Jumlah Penduduk Awal Bulan</th>
								<th colspan="8">Tambahan Bulan Ini</th>
								<th colspan="8">Pengurangan Bulan Ini</th>
								<th colspan="7" rowspan="2">Jumlah Penduduk Akhir Bulan</th>
								{{-- <th rowspan="4">KET.</th> --}}
								<th class="pilihan" rowspan="4">Opsi</th>
							</tr>
							<tr>
								<th colspan="2">WNA</th>
								<th colspan="2">WNI</th>
								<th rowspan="3">JLH KK</th>
								<th rowspan="3">JML Anggota Keluarga</th>
								<th rowspan="3">JML Jiwa (7+8)</th>
								<th colspan="4">Lahir</th>
								<th colspan="4">Datang</th>
								<th colspan="4">Meninggal</th>
								<th colspan="4">Pindah</th>
							</tr>
							<tr>
								<th rowspan="2">L</th>
								<th rowspan="2">P</th>
								<th rowspan="2">L</th>
								<th rowspan="2">P</th>
								<th colspan="2">WNA</th>
								<th colspan="2">WNI</th>
								<th colspan="2">WNA</th>
								<th colspan="2">WNI</th>
								<th colspan="2">WNA</th>
								<th colspan="2">WNI</th>
								<th colspan="2">WNA</th>
								<th colspan="2">WNI</th>
								<th colspan="2">WNA</th>
								<th colspan="2">WNI</th>
								<th rowspan="2">Jml KK</th>
								<th rowspan="2">JML Anggota Keluarga</th>
								<th rowspan="2">JML Jiwa (31+32)</th>
							</tr>
							<tr>
								<th>L</th>
								<th>P</th>
								<th>L</th>
								<th>P</th>
								<th>L</th>
								<th>P</th>
								<th>L</th>
								<th>P</th>
								<th>L</th>
								<th>P</th>
								<th>L</th>
								<th>P</th>
								<th>L</th>
								<th>P</th>
								<th>L</th>
								<th>P</th>
								<th>L</th>
								<th>P</th>
								<th>L</th>
								<th>P</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@foreach ($rekappenduduk as $p)
								<tr>
									<td align="center">{{$i++}}</td>
									<td>{{$p->dusun}}</td>
									<td>@php echo PendudukAwal('WNA','L',$p->dusun,$awalbulan); @endphp</td>
									<td>@php echo PendudukAwal('WNA','P',$p->dusun,$awalbulan); @endphp</td>
									<td>@php echo PendudukAwal('WNI','L',$p->dusun,$awalbulan); @endphp</td>
									<td>@php echo PendudukAwal('WNI','P',$p->dusun,$awalbulan); @endphp</td>
									<td>@php echo JumlahKK($p->dusun,$awalbulan); @endphp</td>
									<td>@php echo JumlahAnggota($p->dusun,$awalbulan); @endphp</td>
									<td>@php echo JumlahKK($p->dusun,$awalbulan)+JumlahAnggota($p->dusun,$awalbulan); @endphp</td>

									<td>@php echo PendudukBlnIni('WNA','L',$p->dusun,$awalbulan,$akhirbulan,"lahir"); @endphp</td>
									<td>@php echo PendudukBlnIni('WNA','P',$p->dusun,$awalbulan,$akhirbulan,"lahir"); @endphp</td>
									<td>@php echo PendudukBlnIni('WNI','L',$p->dusun,$awalbulan,$akhirbulan,"lahir"); @endphp</td>
									<td>@php echo PendudukBlnIni('WNI','P',$p->dusun,$awalbulan,$akhirbulan,"lahir"); @endphp</td>
									<td>@php echo PendudukBlnIni('WNA','L',$p->dusun,$awalbulan,$akhirbulan,"datang"); @endphp</td>
									<td>@php echo PendudukBlnIni('WNA','P',$p->dusun,$awalbulan,$akhirbulan,"datang"); @endphp</td>
									<td>@php echo PendudukBlnIni('WNI','L',$p->dusun,$awalbulan,$akhirbulan,"datang"); @endphp</td>
									<td>@php echo PendudukBlnIni('WNI','P',$p->dusun,$awalbulan,$akhirbulan,"datang"); @endphp</td>
									<td>@php echo PendudukMeninggal('WNA','L',$p->dusun,$awalbulan,$akhirbulan,"meninggal"); @endphp</td>
									<td>@php echo PendudukMeninggal('WNA','P',$p->dusun,$awalbulan,$akhirbulan,"meninggal"); @endphp</td>
									<td>@php echo PendudukMeninggal('WNI','L',$p->dusun,$awalbulan,$akhirbulan,"meninggal"); @endphp</td>
									<td>@php echo PendudukMeninggal('WNI','P',$p->dusun,$awalbulan,$akhirbulan,"meninggal"); @endphp</td>
									<td>@php echo PendudukPindah('WNA','L',$p->dusun,$awalbulan,$akhirbulan,"pindah"); @endphp</td>
									<td>@php echo PendudukPindah('WNA','P',$p->dusun,$awalbulan,$akhirbulan,"pindah"); @endphp</td>
									<td>@php echo PendudukPindah('WNI','L',$p->dusun,$awalbulan,$akhirbulan,"pindah"); @endphp</td>
									<td>@php echo PendudukPindah('WNI','P',$p->dusun,$awalbulan,$akhirbulan,"pindah"); @endphp</td>

									<td>@php echo PendudukAkhir('WNA','L',$p->dusun,$akhirbulan); @endphp</td>
									<td>@php echo PendudukAkhir('WNA','P',$p->dusun,$akhirbulan); @endphp</td>
									<td>@php echo PendudukAkhir('WNI','L',$p->dusun,$akhirbulan); @endphp</td>
									<td>@php echo PendudukAkhir('WNI','P',$p->dusun,$akhirbulan); @endphp</td>
									<td>@php echo JumlahKKAkhir($p->dusun,$akhirbulan); @endphp</td>
									<td>@php echo JumlahAnggotaAkhir($p->dusun,$akhirbulan); @endphp</td>
									<td>@php echo JumlahKKAkhir($p->dusun,$akhirbulan)+JumlahAnggotaAkhir($p->dusun,$akhirbulan); @endphp</td>
									
									<td>
										<a data-original-title='Detail' class='btn btn-green btn-sm tooltips' href='{{ url('data-rekapitulasi-penduduk/'. $p->id)}}'>
											<i class='clip-eye'></i>
										</a>

										<a data-original-title='Edit' class='btn btn-sm btn-blue tooltips' href='{{ url('data-rekapitulasi-penduduk/'. $p->id .'/edit')}}'>
											<i class='clip-pencil'></i>
										</a>
										
										<form action="{{url('data-rekapitulasi-penduduk', $p->id)}}" method="post" style="display: inline-block;">
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

@endsection
