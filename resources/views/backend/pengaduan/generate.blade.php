<!doctype html>
<html lang="en">
    <head>
        {{-- <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}

        <title></title>
    </head>
    <body>
        <h4>LAPORAN PENGADUAN MASYARAKAT</h4>
        <div>
            <h5>Informasi Pelapor</h5>
            <table>
                <tr>
                    <td style="width : 200px">NIK</td>
                    <td>:</td>
                    <td>{{ $pengaduan->user->nik }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $pengaduan->user->name }}</td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td>{{ $pengaduan->user->username }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $pengaduan->user->email }}</td>
                </tr>
                <tr>
                    <td>Telp</td>
                    <td>:</td>
                    <td>{{ $pengaduan->user->telp }}</td>
                </tr>
            </table>
        </div>
        <div>
            <h5>Pengaduan</h5>
            <table>
                <tr>
                    <td style="width : 200px">Tanggal</td>
                    <td>:</td>
                    <td>{{ $pengaduan->created_at->format('d/m/y') }}</td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>:</td>
                    <td>{{ $pengaduan->judul }}</td>
                </tr>
            </table>
            <p>Isi laporan : </p>
            <p>{{ $pengaduan->isi_laporan }}</p>
            <img src="{{ public_path($pengaduan->foto) }}" width="700px" alt="bukti_pengaduan">
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> --}}

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        -->
    </body>
</html>