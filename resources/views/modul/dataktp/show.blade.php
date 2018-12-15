@extends('layouts.template')

@section('title', 'Detail Data Kartu Tanda Penduduk dan Kartu Keluarga')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Kartu Tanda Penduduk dan Kartu Keluarga</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-ktp-dan-kk') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Kartu Tanda Penduduk dan Kartu Keluarga</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="30%">No. KK</td>
						<td>{{$pd->no_kk}}</td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td>{{$pd->nama}}</td>
					</tr>
					<tr>
						<td>NIK</td>
						<td>{{$pd->nik}}</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>{{$pd->jenis_kelamin}}</td>
					</tr>
					<tr>
						<td>Tempat, Tanggal Lahir</td>
						<td>{{$pd->tmp_lahir}}, {{tgl_id($pd->tgl_lahir)}}</td>
					</tr>
					<tr>
						<td>Gol. Darah</td>
						<td>{{$pd->gol_darah}}</td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>{{$pd->agama}}</td>
					</tr>
					<tr>
						<td>Pendidikan</td>
						<td>{{$pd->pendidikan_terakhir}}</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>{{$pd->pekerjaan}}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>{{$pd->alamat}}</td>
					</tr>
					<tr>
						<td>Status Perkawinan</td>
						<td>{{$pd->status}}</td>
					</tr>
					<tr>
						<td>Tempat dan Tanggal Dikeluarkan</td>
						<td>{{$pd->tmp_dikeluarkan}}, {{tgl_id($pd->tgl_dikeluarkan)}}</td>
					</tr>
					<tr>
						<td>Status Hubungan Keluarga</td>
						<td>{{$pd->status_dikeluarga}}</td>
					</tr>
					<tr>
						<td>Kewarganegaraan</td>
						<td>
							@if ($pd->kewarganegaraan == 'WNI')
								Warga Negara Indonesia
							@elseif ($pd->kewarganegaraan == 'WNA')
								Warga Negara Asing
							@endif
						</td>
					</tr>
					<tr>
						<td>Nama Ayah</td>
						<td>{{$pd->ayah}}</td>
					</tr>
					<tr>
						<td>Nama Ibu</td>
						<td>{{$pd->ibu}}</td>
					</tr>
					<tr>
						<td>Tanggal Mulai Tinggal DiDesa</td>
						<td>{{tgl_id($pd->tgl_didesa)}}</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>{{$pd->keterangan}}</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
