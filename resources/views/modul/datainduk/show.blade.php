@extends('layouts.template')

@section('title', 'Detail Data Induk Penduduk Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Induk Penduduk Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-induk-penduduk-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th colspan="3">Detail Data Induk Penduduk Desa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="30%">Nama</td>
						<td>{{$pd->nama}}</td>
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
						<td>Agama</td>
						<td>{{$pd->agama}}</td>
					</tr>
					<tr>
						<td>Pendidikan Terakhir</td>
						<td>{{$pd->pendidikan_terakhir}}</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>{{$pd->pekerjaan}}</td>
					</tr>
					<tr>
						<td>Dapat Membaca Huruf</td>
						<td>
							@if ($pd->dapat_membaca == 'L')
								Latin
							@elseif ($pd->dapat_membaca == 'D')
								Daerah
							@elseif ($pd->dapat_membaca == 'A')
								Arab
							@elseif ($pd->dapat_membaca == 'AL')
								Arab dan Latin
							@elseif ($pd->dapat_membaca == 'AD')
								Arab dan Daerah
							@elseif ($pd->dapat_membaca == 'ALD')
								Arab, Latin, Daerah
							@endif
						</td>
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
						<td>Alamat Lengkap</td>
						<td>{{$pd->alamat}}</td>
					</tr>
					<tr>
						<td>Kedudukan dalam Keluarga</td>
						<td>
							@if ($pd->kedudukan == 'KK')
								Kepala Keluarga
							@elseif ($pd->kedudukan == 'Ist')
								Istri
							@elseif ($pd->kedudukan == 'AK')
								Anak Kandung
							@elseif ($pd->kedudukan == 'AA')
								Anak Angkat
							@elseif ($pd->kedudukan == 'Pemb')
								Pembantu
							@endif
						</td>
					</tr>
					<tr>
						<td>NIK</td>
						<td>{{$pd->nik}}</td>
					</tr>
					<tr>
						<td>No KK</td>
						<td>{{$pd->no_kk}}</td>
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
