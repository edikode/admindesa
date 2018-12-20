
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Data Rencana Kerja Pembangunan Desa</title>
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
                    <h1><u>BUKU DATA RENCANA KERJA PEMBANGUNAN DESA</u>&nbsp;&nbsp;</h1>
                </center>  
            </div>
            <br>
            <table class="tg">
                <tr>
                    <th class="tg-3wr7" rowspan="2">Nomor Urut</th>
                    <th class="tg-3wr7" rowspan="2">Nama<br>Proyek/<br>Kegiatan</th>
                    <th class="tg-3wr7" rowspan="2">Lokasi</th>
                    <th class="tg-3wr7" colspan="4">Sumber Biaya</th>
                    <th class="tg-3wr7" rowspan="2">J<br>u<br>m<br>l<br>a<br>h</th>
                    <th class="tg-3wr7" rowspan="2">Pelaksana</th>
                    <th class="tg-3wr7" rowspan="2">Manfaat</th>
                    <th class="tg-3wr7" rowspan="2">KET.</th>
                </tr>
                <tr>
                    <th class="tg-3wr7">Pemerintah</th>
                    <th class="tg-3wr7">Provinsi</th>
                    <th class="tg-3wr7">Kab/Kota</th>
                    <th class="tg-3wr7">Swadaya</th>
                </tr>
             
                @php $i = 1; @endphp

                @foreach($pd as $p)

                    <tr>
                        <td class="tg-rv4w" width="10%" align="center">{{$i++}}</td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->lokasi}}</td>
                        <td>{{$p->pemerintah}}</td>
                        <td>{{$p->provinsi}}</td>
                        <td>{{$p->kota}}</td>
                        <td>{{$p->swadaya}}</td>
                        <td>{{angkaRupiah($p->pemerintah+$p->provinsi+$p->kota+$p->swadaya)}}</td>
                        <td>{{$p->pelaksana}}</td>
                        <td>{{$p->manfaat}}</td>
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