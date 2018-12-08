<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Data Aparat Pemerintah Desa</title>
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
                    <h1><u>BUKU DATA APARAT PEMERINTAH DESA</u>&nbsp;&nbsp;</h1>
                </center>  
            </div>
            <br>
            <table class="tg">
                <tr>
                    <th class="tg-3wr7">Nomor Urut</th>
                    <th class="tg-3wr7">Nama</th>
                    <th class="tg-3wr7">NIP</th>
                    <th class="tg-3wr7">NIAP</th>				
                    <th class="tg-3wr7">Jenis Kelamin</th>			
                    <th class="tg-3wr7">Tempat dan Tgl Lahir</th>
                    <th class="tg-3wr7">Agama</th>	
                    <th class="tg-3wr7">Pangkat Golongan</th>
                    <th class="tg-3wr7">Jabatan</th>
                    <th class="tg-3wr7">Pendidikan Terakhir</th>
                    <th class="tg-3wr7">Nomor dan Tanggal Keputusan Pengangkatan</th>
                    <th class="tg-3wr7">Nomor dan Tanggal Keputusan Pemberhentian</th>
                    <th class="tg-3wr7">KET.</th>
                </tr>
             
                @php $i = 1; @endphp

                @foreach($pd as $p)

                    <tr>
                        <td class="tg-rv4w" width="10%" align="center">{{$i++}}</td>
                        <td>{{$p->nama}}</td>
                        <td>@if($p->niap != ""){{$p->niap}}@else-@endif</td>
                        <td>@if($p->nip != ""){{$p->nip}}@else-@endif</td>
                        <td>{{$p->jenis_kelamin}}</td>
                        <td>{{$p->ttl}}</td>
                        <td>{{$p->agama}}</td>
                        <td>{{$p->pangkat}}</td>
                        <td>{{$p->jabatan}}</td>
                        <td>{{$p->pendidikan_terakhir}}</td>
                        <td>{{$p->nomor_pengangkatan}}</td>
                        <td>@if($p->nomor_pemberhentian != ""){{$p->nomor_pemberhentian}}@else-@endif</td>
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