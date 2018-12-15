<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Data Kartu Tanda Penduduk dan Kartu Keluarga</title>
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
                    <h1><u>BUKU DATA KARTU TANDA PENDUDUK DAN KARTU KELUARGA</u>&nbsp;&nbsp;</h1>
                </center>  
            </div>
            <br>
            <table class="tg">
                <tr>
                    <th class="tg-3wr7" rowspan="2">Nomor Urut</th>
                    <th class="tg-3wr7" rowspan="2">No. KK</th>
                    <th class="tg-3wr7" rowspan="2">Nama<br>Lengkap</th>
                    <th class="tg-3wr7" rowspan="2">NIK</th>
                    <th class="tg-3wr7" rowspan="2">Jenis Kelamin</th>
                    <th class="tg-3wr7" rowspan="2">Tempat / Tanggal Lahir</th>
                    <th class="tg-3wr7" rowspan="2">Gol.  Darah</th>
                    <th class="tg-3wr7" rowspan="2">Agama</th>
                    <th class="tg-3wr7" rowspan="2">Pendidikan</th>
                    <th class="tg-3wr7" rowspan="2">Pekerjaan</th>
                    <th class="tg-3wr7" rowspan="2">Alamat</th>
                    <th class="tg-3wr7" rowspan="2">Status<br>Perkawinan</th>
                    <th class="tg-3wr7" rowspan="2">Tempat dan Tanggal Dikeluarkan</th>
                    <th class="tg-3wr7" rowspan="2">Status Hub. Keluarga</th>
                    <th class="tg-3wr7" rowspan="2">Kewarganegaraan</th>
                    <th class="tg-3wr7" colspan="2">Orang Tua</th>
                    <th class="tg-3wr7" rowspan="2">TGL Mulai Tinggal Di Desa</th>
                    <th class="tg-3wr7" rowspan="2">KET.</th>
                </tr>
                <tr>
                    <th class="tg-3wr7"h>Ayah</th>
                    <th class="tg-3wr7">Ibu</th>
                </tr>
             
                @php $i = 1; @endphp

                @foreach($pd as $p)

                    <tr>
                        <td class="tg-rv4w" width="10%" align="center">{{$i++}}</td>
                        <td>{{$p->no_kk}}</td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->nik}}</td>
                        <td>{{$p->jenis_kelamin}}</td>
                        <td>{{$p->tmp_lahir}}, {{tgl_id($p->tgl_lahir)}}</td>
                        <td>{{$p->gol_darah}}</td>
                        <td>{{$p->agama}}</td>
                        <td>{{$p->pendidikan_terakhir}}</td>
                        <td>{{$p->pekerjaan}}</td>
                        <td>{{$p->alamat}}</td>
                        <td>{{$p->status}}</td>
                        <td>{{$p->tmp_dikeluarkan}}, {{tgl_id($p->tgl_dikeluarkan)}}</td>
                        <td>{{$p->status_dikeluarga}}</td>
                        <td>{{$p->kewarganegaraan}}</td>
                        <td>{{$p->ayah}}</td>
                        <td>{{$p->ibu}}</td>
                        <td>{{$p->tgl_didesa}}</td>
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