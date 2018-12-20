@extends('layouts.template')

@section('title', 'Detail Data Inventaris Kekayaan Desa')

@section('bread')
<li><a href="{{ url('admin') }}"><i class="icon-laptop"></i> Dashboard</a></li>
<li class="active">Detail Data Inventaris Kekayaan Desa</li>
@endsection

@section('button')

	<a class="btn btn-large btn-red item" href="{{ url('data-inventaris-kekayaan-desa') }}">Kembali</a>

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<br><br>
			<table class="table table-condensed table-hover">
				<tbody>
					<tr>
						<th colspan="3">Detail Data Inventaris Kekayaan Desa</th>
					</tr>
					<tr>
						<td width="25%">Jenis</td>
						<td>{{$data->jenis}}</td>
					</tr>
					<tr>
						<th>Asal Barang / Bangunan</th>
						<th></th>
					</tr>
					<tr>
						<td>Beli Sendiri</td>
						<td>
							{{$data->beli_sendiri}}
						</td>
					</tr>
					<tr>
						<td>Bantuan Pemerintah</td>
						<td>
							{{$data->pemerintah}}
						</td>
					</tr>
					<tr>
						<td>Bantuan Provinsi</td>
						<td>
							{{$data->provinsi}}
						</td>
					</tr>
					<tr>
						<td>Bauntuan Kota</td>
						<td>
							{{$data->kota}}
						</td>
					</tr>
					<tr>
						<td>Sumbangan</td>
						<td>
							{{$data->sumbangan}}
						</td>
					</tr>
					<tr>
						<td>Kondisi Awal Tahun (Baik)</td>
						<td>
							{{$data->awal_baik}}
						</td>
					</tr>
					<tr>
						<td>Kondisi Awal Tahun (Rusak)</td>
						<td>
							{{$data->awal_rusak}}
						</td>
					</tr>
					<tr>
						<th>Penghapusan Barang/Bangunan</th>
						<th>
						</th>
					</tr>
					<tr>
						<td>Rusak</td>
						<td>
							{{$data->rusak}}
						</td>
					</tr>
					<tr>
						<td>Dijual</td>
						<td>
							{{$data->dijual}}
						</td>
					</tr>
					<tr>
						<td>DiSumbangkan</td>
						<td>
							{{$data->disumbangkan}}
						</td>
					</tr>
					<tr>
						<td>Tanggal Penghapusan</td>
						<td>
							{{tgl_id($data->tgl_hapus)}}
						</td>
					</tr>
					<tr>
						<td>Kondisi Akhir Tahun (Baik)</td>
						<td>
							{{$data->akhir_baik}}
						</td>
					</tr>
					<tr>
						<td>Kondisi Akhir Tahun (Rusak)</td>
						<td>
							{{$data->akhir_rusak}}
						</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>
							{{$data->keterangan}}
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
