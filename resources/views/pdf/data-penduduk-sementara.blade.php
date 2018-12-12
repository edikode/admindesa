<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Data Penduduk Sementara</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:black;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;color:#333;background-color:white;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>
  
            <div style="font-family:Arial; font-size:12px;">
                <center>
                    <h1><u>BUKU DATA PENDUDUK SEMENTARA</u>&nbsp;&nbsp;</h1>
                </center>  
            </div>
            <br>
            <table class="tg">
                <tr>			
                    <th class="tg-3wr7" rowspan="2" class="no">Nomor Urut</th>
                    <th class="tg-3wr7" rowspan="2">Nama Lengkap</th>
                    <th class="tg-3wr7" colspan="2">Jenis Kelamin</th>
                    <th class="tg-3wr7" rowspan="2">Nomor<br>Identitas /<br>Tanda Pengenal</th>
                    <th class="tg-3wr7" rowspan="2">Tempat dan<br> Tanggal<br>Lahir / Umur</th>
                    <th class="tg-3wr7" rowspan="2">Pekerjaan</th>
                    <th class="tg-3wr7" colspan="2">Kewarganegaraan</th>
                    <th class="tg-3wr7" rowspan="2">Datang Dari</th>
                    <th class="tg-3wr7" rowspan="2">Maksud dan Tujuan<br>Kedatangan</th>
                    <th class="tg-3wr7" rowspan="2">Nama dan<br>Alamat yg<br>Didatangi</th>
                    <th class="tg-3wr7" rowspan="2">Datang<br>Tanggal</th>
                    <th class="tg-3wr7" rowspan="2">Pergi<br>Tanggal</th>
                    <th class="tg-3wr7" rowspan="2">KET.</th>
                </tr>
                <tr>
                    <th class="tg-3wr7">L</th>
                    <th class="tg-3wr7">P</th>
                    <th class="tg-3wr7">Kebangsaan</th>	
                    <th class="tg-3wr7">Keturunan</th>	
                </tr>
                
                @php $i = 1; @endphp

                @foreach($pd as $p)

                    <tr>
                        <td class="tg-rv4w" width="10%" align="center">{{$i++}}</td>
                        <td>{{$p->nama}}</td>
                        <td>@if($p->jenis_kelamin == 'L')L @endif</td>
                        <td>@if($p->jenis_kelamin == 'P')P @endif</td>
                        <td>{{$p->nomor_identitas}}</td>
                        <td>{{$p->tmp_lahir}}, {{$p->tgl_lahir}}</td>
                        <td>{{$p->pekerjaan}}</td>
                        <td>@if($p->kewarganegaraan == 'WNI')WNI @endif</td>
                        <td>@if($p->kewarganegaraan == 'WNA')WNA @endif</td>
                        <td>{{$p->datang_dari}}</td>
                        <td>{{$p->tujuan}}</td>
                        <td>{{$p->nama_didatangi}},<br>{{$p->alamat_didatangi}}</td>
                        <td>{{$p->datang_tgl}}</td>
                        <td>{{$p->pergi_tgl}}</td>
                        <td>{{$p->keterangan}}</td>
                    </tr>

                @endforeach
            </table>
            <br><br>
            <table width="100%" >
                <tr>
                    <td width="width:20%" align="center">
                        <h4 style="margin-bottom:0px">Mengetahui</h4>
                        <h4 style="margin-top:0px">Kepala Desa ............</h4>
                        <br>
                        <br>
                        <br>
                        <br>
                        <u>Nama Kepala Desa</u>
                    </td>
                    <td width="width:60%"></td>
                    <td width="" align="center">
                        <h4 style="margin-bottom:0px">.....,........,......</h4>
                        <h4 style="margin-top:0px">Sekertaris Desa ............</h4>
                        <br>
                        <br>
                        <br>
                        <br>
                        <u>Nama Sekertaris</u>
                    </td>
                </tr>
            </table>

        </body>
    </head>
</html>