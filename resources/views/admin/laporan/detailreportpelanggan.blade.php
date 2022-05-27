<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pengaduan PDAM Tirta Lestari Tuban</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <table border = "0" class="table" align="center" rules="all" style="border-bottom: 2px solid #9e9e9e">
            <tr>
                <td width="25%">
                    <center>
                        <img src="{{asset('assets/img/logo-pdam-judul.png')}}" style="width:100%;">
                </td>
                <td>
                    <center>
                        <strong>
                            <font size="4" face="times new roman">PERUSAHAAN UMUM DAERAH AIR MINUM</font><br>
                            <font size="4" face="times new roman">"TIRTA LESTARI"</font><br>
                            <font size="4" face="times new roman">KABUPATEN TUBAN</font><br>
                            <font size="3" face="times new roman">Jalan Dr. Wahidin Sudiro H No. 34 Tuban</font><br>
                        </strong>
                </td>
                <!-- <td><center>
                    <img src="{{'/img/logo.png'}}" style="width:50%;"> 
                </td>        -->
            </tr>
        </table><br>

        <h3>
            <center> <strong>
                    <font size="5" face="times new roman">LAPORAN DATA PELANGGAN</font>
                </strong><br>
        </h3><br>
        <table class="table table-bordered" align="center" rules="all">
            <tr>
                <th><b>No</b></th>
                <th><b>Nama</b></th>
                <th><b>Telepon</b></th>
                <th><b>No Sambungan</b></th>
                <th><b>Alamat</b></th>
                <th><b>Pendaftaran</b></th>
            </tr>
            @php $id=0; @endphp

            @foreach($data as $key => $value)
            @php $id++; @endphp
            <tr>
                <td>{{$id}}</td>
                <td>{{ $value->namalengkap }}</td>
                <td>{{ $value->telp }}</td>
                <td>{{ $value->nosambungan }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ date('d F Y H.i A', strtotime($value->created_at)) }}</td>
            </tr>
            @endforeach

        </table>


    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>