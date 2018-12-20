@extends('layouts.template')

@section('title', 'Halaman Setting')

@section('bread')
<li><a href="{{ url('/') }}"><i class="icon-laptop"></i> Home</a></li>
<li class="active">Halaman Setting</li>
@endsection

@section('button')

@endsection

@section('main')

	<div class="row">
		<div class="col-sm-12">
            @include('errors/pesan_muncul')
        </div>
        <div class="col-sm-12">
            <div class="tab-content">
                <div id="panel_overview" class="tab-pane active">
                    <div class="row">
                        <div class="col-sm-5 col-md-4" style="margin-bottom:20px">
                            <div class="user-left">
                                <div class="center">
                                    <h4>Setting Data Pengguna</h4>
                                    <div class="wrap-image">
                                        <img src="{{url('upload/gambar/'.$setting->foto)}}" class="img-responsive" title="Logo Pengguna" alt="{{$setting->name}}" >
                                    </div>
                                    <hr>
                                </div>
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>Informasi Pengguna</th>
                                            <th><a href="{{asset('setting/pengguna')}}" style="float:right"><i class="fa fa-pencil edit-user-info"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nama Administrator</td>
                                            <td>
                                                {{$setting->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                {{$setting->email}}
                                            </td>
                                        </tr>
                                        <tr>
                                                <td>Ganti Password</td>
                                                <td>
                                                    <a href="{{asset('setting/ganti-password')}}" class="btn btn-sm btn-danger">Lanjut</a>
                                                </td>
                                            </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <span class="label label-sm label-info">{{$setting->level}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-offset-1 col-md-offset-1 col-sm-6 col-md-7 ">
                            <div class="user-left">
                                <div class="center">
                                    <h4>Setting Data Desa</h4>
                                    <div class="wrap-image">
                                        <img src="{{url('upload/gambar/'.$setting->logo_desa)}}" class="img-responsive" title="Logo Desa" alt="{{$setting->nama_desa}}" >
                                    </div>
                                    <hr>
                                </div>
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>Informasi Desa</th>
                                            <th><a href="{{asset('setting/info-desa')}}" style="float:right"><i class="fa fa-pencil edit-user-info"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nama Desa</td>
                                            <td>
                                                {{$setting->nama_desa}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kode Desa</td>
                                            <td>
                                                {{$setting->kode_desa}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kode Pos</td>
                                            <td>
                                                {{$setting->kode_pos}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Kepala Desa</td>
                                            <td>
                                                {{$setting->nama_kades}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>NIP Kepala Desa</td>
                                            <td>
                                                {{$setting->nip_kades}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telepon Kantor</td>
                                            <td>
                                                {{$setting->telepon}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Kantor</td>
                                            <td>
                                                {{$setting->alamat_kantor}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

@endsection
