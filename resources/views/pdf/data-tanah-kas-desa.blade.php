
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Data Tanah Kas Desa</title>
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
                    <h1><u>BUKU DATA TANAH KAS DESA</u>&nbsp;&nbsp;</h1>
                </center>  
            </div>
            <br>
            <table class="tg">
                <tr>
                    <th class="tg-3wr7" class="no" rowspan="3">Nomor<br>Urut</th>
                    <th class="tg-3wr7" rowspan="3">Asal<br>Tanah<br>Kas<br>Desa</th>
                    <th class="tg-3wr7" rowspan="3">Nomor<br>Serti-<br>fikat<br>Buku<br>Letter<br>C/<br>Persil</th>
                    <th class="tg-3wr7" rowspan="3">Luas<br>(m)</th>
                    <th class="tg-3wr7" rowspan="3">Kelas</th>
                    <th class="tg-3wr7" colspan="6">Perolehan TKD</th>
                    <th class="tg-3wr7" colspan="5">Jenis TKD</th>
                    <th class="tg-3wr7" colspan="2">Patok<br>Tanda<br>Batas</th>
                    <th class="tg-3wr7" colspan="2">Papan<br>Nama</th>
                    <th class="tg-3wr7" rowspan="3">Lokasi</th>
                    <th class="tg-3wr7" rowspan="3">Peruntukan</th>
                    <th class="tg-3wr7" rowspan="3">Mutasi</th>
                    {{-- <th class="tg-3wr7" rowspan="3">KET.</th> --}}
                </tr>
                <tr>
                    <th class="tg-3wr7" rowspan="2">Asli<br>Milik<br>Desa</th>
                    <th class="tg-3wr7" colspan="3">
                        Bantuan
                    </th>	
                    <th class="tg-3wr7" rowspan="2">Lain-<br>Lain</th>
                    <th class="tg-3wr7" rowspan="2">Tgl<br>Perolehan</th>
                    <th class="tg-3wr7" rowspan="2">Sa<br>wah</th>
                    <th class="tg-3wr7" rowspan="2">Te<br>gal</th>
                    <th class="tg-3wr7" rowspan="2">Ke<br>bun</th>
                    <th class="tg-3wr7" rowspan="2">Tambak/<br>Kolam</th>
                    <th class="tg-3wr7" rowspan="2">Tanah<br>Kering/<br>Darat</th>
                    <th class="tg-3wr7" rowspan="2">Ada</th>
                    <th class="tg-3wr7" rowspan="2">Tdk<br>Ada</th>
                    <th class="tg-3wr7" rowspan="2">Ada</th>
                    <th class="tg-3wr7" rowspan="2">Tdk<br>Ada</th>
                </tr>
                <tr>
                    <th class="tg-3wr7">Peme<br>rintah</th>
                    <th class="tg-3wr7">Prov</th>
                    <th class="tg-3wr7">Kab/<br>Kota</th>
                </tr>
             
                @php $i = 1; @endphp

                @foreach($pd as $p)

                    <tr>
                        <td class="tg-rv4w" width="10%" align="center">{{$i++}}</td>
                        <td>{{$p->asal}}</td>
                        <td>{{$p->nomor_sertifikat}}</td>
                        <td>{{$p->luas}}</td>
                        <td>{{$p->kelas}}</td>
                        <td>{{$p->asli}}</td>
                        <td>{{$p->pemerintah}}</td>
                        <td>{{$p->provinsi}}</td>
                        <td>{{$p->kota}}</td>
                        <td>{{$p->lainlain}}</td>
                        <td>{{tgl_id($p->tgl_perolehan)}}</td>
                        <td>{{$p->sawah}}</td>
                        <td>{{$p->tegal}}</td>
                        <td>{{$p->kebun}}</td>
                        <td>{{$p->tambak}}</td>
                        <td>{{$p->darat}}</td>
                        <td>@if($p->patok_batas == "Sudah Ada"){{$p->patok_batas}}@endif</td>
                        <td>@if($p->patok_batas == "Belum Ada"){{$p->patok_batas}}@endif</td>
                        <td>@if($p->papan_nama == "Sudah Ada"){{$p->papan_nama}}@endif</td>
                        <td>@if($p->papan_nama == "Belum Ada"){{$p->papan_nama}}@endif</td>
                        <td>{{$p->lokasi}}</td>
                        <td>{{$p->peruntukan}}</td>
                        <td>{{$p->mutasi}}</td>
                        {{-- <td>{{$p->keterangan}}</td> --}}
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