<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Data Inventaris Kekayaan Desa</title>
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
                    <h1><u>BUKU DATA INVENTARIS KEKAYAAN DESA</u>&nbsp;&nbsp;</h1>
                </center>  
            </div>
            <br>
            <table class="tg">
                <tr>
                    <th class="no" class="tg-3wr7" rowspan="3">Nomor Urut</th>
                    <th rowspan="3" class="tg-3wr7">Jenis Barang/Bangunan</th>
                    <th colspan="5" class="tg-3wr7">Asal Barang/Bangunan</th>
                    <th colspan="2" class="tg-3wr7">Keadaan Barang/Bangunan Awal Tahun</th>
                    <th colspan="4" class="tg-3wr7">Penghapusan Barang dan Bangunan</th>
                    <th colspan="2" class="tg-3wr7">Keadaan Barang/<br>Bangunan <br>Akhir Tahun</th>
                    {{-- <th rowspan="3">KET.</th> --}}
                    <th rowspan="3" class="tg-3wr7">KET.</th>
                </tr>
                <tr>
                    <th rowspan="2" class="tg-3wr7">Di<br>be<br>li<br> Sen<br>di<br>ri</th>
                    <th colspan="3" class="tg-3wr7">
                        Bantuan
                    </th>	
                    <th rowspan="2" class="tg-3wr7">Sum<br>ba<br>ng<br>an</th>
                    <th rowspan="2" class="tg-3wr7">Ba<br>ik</th>
                    <th rowspan="2" class="tg-3wr7">Ru<br>sak</th>
                    <th rowspan="2" class="tg-3wr7">Ru<br>sak</th>
                    <th rowspan="2" class="tg-3wr7">Di<br>jual</th>
                    <th rowspan="2" class="tg-3wr7">Di<br>sum<br>bang<br>kan</th>
                    <th rowspan="2" class="tg-3wr7">Tgl Peng<br>hapusan</th>
                    <th rowspan="2" class="tg-3wr7">Ba<br>ik</th>
                    <th rowspan="2" class="tg-3wr7">Ru<br>sak</th>
                </tr>
                <tr>
                    <th class="tg-3wr7">Pe<br>me<br>rin<br>tah</th>
                    <th class="tg-3wr7">Pro<br>vin<br>si</th>
                    <th class="tg-3wr7">Kab<br>/<br>Kota</th>
                </tr>
             
                @php $i = 1; @endphp

                @foreach($pd as $p)

                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$p->jenis}}</td>
                        <td>{{$p->beli_sendiri}}</td>
                        <td>{{$p->pemerintah}}</td>
                        <td>{{$p->provinsi}}</td>
                        <td>{{$p->kota}}</td>
                        <td>{{$p->sumbangan}}</td>
                        <td>{{$p->awal_baik}}</td>
                        <td>{{$p->awal_rusak}}</td>
                        <td>{{$p->rusak}}</td>
                        <td>{{$p->dijual}}</td>
                        <td>{{$p->disumbangkan}}</td>
                        <td>{{tgl_id($p->tgl_hapus)}}</td>
                        <td>{{$p->akhir_baik}}</td>
                        <td>{{$p->akhir_rusak}}</td>
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