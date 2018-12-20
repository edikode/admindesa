
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Data Tanah Di Desa</title>
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
                    <h1><u>BUKU DATA TANAH DI DESA</u>&nbsp;&nbsp;</h1>
                </center>  
            </div>
            <br>
            <table class="tg">
                <tr>
                    <th class="tg-3wr7" class="no" rowspan="3">Nomor<br>Urut</th>
                    <th class="tg-3wr7" rowspan="3">Nama<br>Per-<br>Orangan<br>/ Badan<br>Hukum</th>
                    <th class="tg-3wr7" rowspan="3">Jumlah<br>(m<sup>2</sup>)</th>
                    <th class="tg-3wr7" colspan="8">Status Hak Tanah (m<sup>2</sup>)</th>
                    <th class="tg-3wr7" colspan="14">Penggunaan Tanah (m<sup>2</sup>)</th>
                    <th class="tg-3wr7" rowspan="3">KET.</th>
                </tr>
                <tr>
                    <th class="tg-3wr7" colspan="5">Sudah Bersertifikat</th>
                    <th class="tg-3wr7" colspan="3">Belum<br>Bersertifikat</th>	
                    <th class="tg-3wr7" colspan="5">Non Pertanian</th>
                    <th class="tg-3wr7" colspan="9">Pertanian</th>
                </tr>
                <tr>
                    <th class="tg-3wr7">HM</th>
                    <th class="tg-3wr7">HGM</th>
                    <th class="tg-3wr7">HP</th>
                    <th class="tg-3wr7">HGU</th>
                    <th class="tg-3wr7">HPL</th>
                    <th class="tg-3wr7">MA</th>
                    <th class="tg-3wr7">VI</th>
                    <th class="tg-3wr7">TN</th>
                    <th class="tg-3wr7">Perumahan</th>
                    <th class="tg-3wr7">Perdagangan<br>Dan Jasa</th>
                    <th class="tg-3wr7">Perkantoran</th>
                    <th class="tg-3wr7">Industri</th>
                    <th class="tg-3wr7">Fasilitas<br>Umum</th>
                    <th class="tg-3wr7">Sawah</th>
                    <th class="tg-3wr7">Tegalan</th>
                    <th class="tg-3wr7">Perkebunan</th>
                    <th class="tg-3wr7">Peternakan<br>/<br>Perikanan</th>
                    <th class="tg-3wr7">Hutan<br>Belukar</th>
                    <th class="tg-3wr7">Hutan<br>Lebat /<br>Lindung</th>
                    <th class="tg-3wr7">Mutasi<br>Tanah<br>Di<br>Desa</th>
                    <th class="tg-3wr7">Tanah<br>Kosong</th>
                    <th class="tg-3wr7">Lain-<br>Lain</th>
                </tr>
             
                @php $i = 1; @endphp

                @foreach($pd as $p)

                    <tr>
                        <td class="tg-rv4w" width="10%" align="center">{{$i++}}</td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->jumlah}}</td>
                        <td>@if($p->status == "HM"){{$p->luas}}@else 0 @endif</td>
                        <td>@if($p->status == "HGM"){{$p->luas}}@else 0 @endif</td>
                        <td>@if($p->status == "HP"){{$p->luas}}@else 0 @endif</td>
                        <td>@if($p->status == "HGU"){{$p->luas}}@else 0 @endif</td>
                        <td>@if($p->status == "HPL"){{$p->luas}}@else 0 @endif</td>
                        <td>@if($p->status == "MA"){{$p->luas}}@else 0 @endif</td>
                        <td>@if($p->status == "VI"){{$p->luas}}@else 0 @endif</td>
                        <td>@if($p->status == "TN"){{$p->luas}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Perumahan"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Perdagangan"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Perkantoran"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Industri"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Fasilitas"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Sawah"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Tegalan"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Perkebunan"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Perternakan"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Hutan"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Hutan Lindung"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Mutasi"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Kosong"){{$p->luas_penggunaan}}@else 0 @endif</td>
                        <td>@if($p->penggunaan_tanah == "Lain-Lain"){{$p->luas_penggunaan}}@else 0 @endif</td>
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