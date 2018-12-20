
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Data Agenda</title>
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
                    <h1><u>BUKU DATA AGENDA</u>&nbsp;&nbsp;</h1>
                </center>  
            </div>
            <br>
            <table class="tg">
                <tr>			
                    <th class="no" rowspan="2" class="tg-3wr7">Nomor Urut</th>
                    <th rowspan="2" class="tg-3wr7">Tanggal Penerimaan/ Pengiriman Surat</th>
                    <th colspan="4" class="tg-3wr7">Surat Masuk</th>
                    <th colspan="4" class="tg-3wr7">Surat Keluar</th>				
                    <th rowspan="2" class="tg-3wr7">KET.</th>			
                </tr>
                <tr>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Pengirim</th>
                    <th>Isi Singkat</th>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Pengirim</th>
                    <th>Isi Singkat</th>
                </tr>
             
                @php $i = 1; @endphp

                @foreach($pd as $p)

                    <tr>
                        <td class="tg-rv4w" width="10%" align="center">{{$i++}}</td>
                        @if ($p->jenis == "Surat Masuk")
                            <td>{{$p->tanggal_surat}}</td>
                            <td>{{$p->nomor}}</td>
                            <td>{{$p->tanggal}}</td>
                            <td>{{$p->pengirim}}</td>
                            <td>{{$p->isi}}</td>
                            <td align="center">-</td>
                            <td align="center">-</td>
                            <td align="center">-</td>
                            <td align="center">-</td>
                            <td>{{$p->keterangan}}</td>
                        @else
                            <td>{{$p->tanggal_surat}}</td>
                            <td align="center">-</td>
                            <td align="center">-</td>
                            <td align="center">-</td>
                            <td align="center">-</td>
                            <td>{{$p->nomor}}</td>
                            <td>{{$p->tanggal}}</td>
                            <td>{{$p->pengirim}}</td>
                            <td>{{$p->isi}}</td>
                            <td>{{$p->keterangan}}</td>
                        @endif
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