<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Laporan Data Pengembalian Barang Pegawai</title>
</head>
<body>
<style type="text/css">
    table {
        width: 100%; /* Ubah lebar tabel menjadi 100% */
        margin-bottom: 0; /* Menghilangkan margin bawah */
        
    }
    table tr td,
    table tr th {
        font-size: 9pt;
        padding: 5px; /* Menambahkan padding agar teks tidak terlalu dekat dengan tepi tabel */
    }
    .container {
        padding: 0; /* Menghilangkan padding di dalam container */
    }
</style>
       <div class="row justify-content-center">
        <div class="col text-center">
            <h5>Laporan Data Pengembalian Barang Pegawai</h5>
            <br></br>
            <table class="table table-striped mt-2 float-start">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Type Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Merk Barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Serial Number</th>
                    <th scope="col">Kelengkapan Barang</th>
                    <th scope="col">Tanggal Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $no = 0;
                @endphp
                @foreach ($data_pengembalian as $barang)
                <tr>
                    <th scope="row">{{ ++$no }}</th>
                    <td>{{ $barang->nama_pegawai }}</td>
                    <td>{{ $barang->jabatan }}</td>
                    <td>{{ $barang->type_barang }}</td>
                    <td>{{ $barang->jenis_barang }}</td>
                    <td>{{ $barang->merk_barang }}</td>
                    <td>{{ $barang->jumlah_barang }}</td>
                    <td>{{ $barang->serial_number }}</td>
                    <td>{{ $barang->kelengkapan_barang }}</td>
                    <td>{{ $barang->tanggal_pengembalian }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
