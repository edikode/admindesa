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
						<td>{{$pd->jenis}}</td>
					</tr>
					<tr>
						<th>Asal Barang / Bangunan</th>
						<th></th>
					</tr>
					<tr>
						<td>Beli Sendiri</td>
						<td>
							{{$pd->beli_sendiri}}
						</td>
					</tr>
					<tr>
						<td>Bantuan Pemerintah</td>
						<td>
							{{$pd->pemerintah}}
						</td>
					</tr>
					<tr>
						<td>Bantuan Provinsi</td>
						<td>
							{{$pd->provinsi}}
						</td>
					</tr>
					<tr>
						<td>Bauntuan Kota</td>
						<td>
							{{$pd->kota}}
						</td>
					</tr>
					<tr>
						<td>Sumbangan</td>
						<td>
							{{$pd->sumbangan}}
						</td>
					</tr>
					<tr>
						<td>Kondisi Awal Tahun (Baik)</td>
						<td>
							{{$pd->awal_baik}}
						</td>
					</tr>
					<tr>
						<td>Kondisi Awal Tahun (Rusak)</td>
						<td>
							{{$pd->awal_rusak}}
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
							{{$pd->rusak}}
						</td>
					</tr>
					<tr>
						<td>Dijual</td>
						<td>
							{{$pd->dijual}}
						</td>
					</tr>
					<tr>
						<td>DiSumbangkan</td>
						<td>
							{{$pd->disumbangkan}}
						</td>
					</tr>
					<tr>
						<td>Tanggal Penghapusan</td>
						<td>
							{{tgl_id($pd->tgl_hapus)}}
						</td>
					</tr>
					<tr>
						<td>Kondisi Akhir Tahun (Baik)</td>
						<td>
							{{$pd->akhir_baik}}
						</td>
					</tr>
					<tr>
						<td>Kondisi Akhir Tahun (Rusak)</td>
						<td>
							{{$pd->akhir_rusak}}
						</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>
							{{$pd->keterangan}}
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>		
	</div>

@endsection
