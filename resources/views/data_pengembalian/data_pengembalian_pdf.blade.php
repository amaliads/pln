<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Surat Berita Acara</title>
</head>
@foreach($data_pengembalian as $item)
<body>
    <div class="container">
        <div class="header text-center mt-5">
            <h4>BERITA ACARA SERAH TERIMA BARANG</h4>
            <hr> </hr>
            <svg height="2" width="200">
            <line x1="0" y1="0" x2="200" y2="0" style="stroke: black; stroke-width: 25;" />
            </svg>

        </div>

        <div class="content mt-4">
            <p>Pada hari ..... tanggal ..... bulan ..... tahun ..... kami yang bertanda tangan dibawah ini:</p>
            <p>Nama: Soleh </p>
            <p>Jabatan: Staff</p>
            <p>NIPEG: 4270298902 </p>
            <p>Alamat: Semarang </p>
            <p>Selanjutnya disebut Pihak Pertama</p>
            @if ($item(id))
            <p>Nama: {{ $item(id)->nama_pegawai }} </p>
            <p>Jabatan: {{ $item(id)->jabatan }}</p>
            <p>NIPEG: {{ $item(id)->NIP }}</p>
            <p>Alamat: {{ $item(id)->alamat }}</p>
            <p>Selanjutnya disebut Pihak Kedua</p>
        </div>
       @endif
        <div class="subject mt-4">
        <p>PIHAK PERTAMA telah menyerahkan {{ $item(id)->jenis_barang }} {{$item(id)->merk_barang }}
            SN: {{ $item(id)->serial_number }} berikut kelengkapannya 
            {{ $item->kelengkapan_barang }} dan selanjutnya 1 (satu) set barang tersebut menjadi tanggung jawab PIHAK KEDUA
            serta tunduk dan menyetujui pada ketentuan sebagai berikut:</p>
        </div>

        <div class="content mt-4">
            <p>1.HAK PENGGUNA NOTEBOOK:
                <br>a. Mempergunakan selama PIHAK KEDUA menjabat pada jabatan sebagaimana dimaksud angka II.
                <br>b. Mendapat perawatan rutin terhadap Notebook yang digunakan apabila diminta.
                <br>c. Mendapat perbaikan apabila Notebook mengalami kerusakan / keluhan
                <br>d. Mengembalikan Notebook atas permintaan PIHAK PERTAMA.
            </p>

            <p>2.Kewajiban Pengguna Notebook:
                <br>a.Mengembalikan Notebook ke PIHAK PERTAMA apabila PIHAK KEDUA mutasi ke Unit lain, atau tidak menjabat lagi pada jabatan sebagaimana dimaksud pada angka II, atau Purna Karya.
                <br>b.Pengembalian sebagaimana dimaksud pada butir 2.a di atas paling lambat 3 (tiga) hari kalender setelah Surat Keputusan Mutasi atau lainnya diterima.
                <br>c.Mengganti biaya klaim apabila terjadi kehilangan (dengan didahului investigasi), kerusakan diluar jaminan, kelalaian pengguna (jatuh, banjir, dll) yang dikarenakan oleh PIHAK KEDUA.
                <br>d.Notebook digunakan untuk keperluan Dinas dan merawat agar kondisi Notebook dalam kondisi tetap baik dan tidak diperkenankan mengalihkan penggunaan Notebook kepada orang lain tanpa pemberitahuan kepada PIHAK PERTAMA.
                <br>e.PIHAK KEDUA wajib mengembalikan Notebook apabila PIHAK PERTAMA membutuhkan dengan mendahului adanya pemberitahuan sebelumnya.
            </p>

            <p>Demikian Berita Acara Serah Terima ini kami buat untuk dilaksanakan dengan penuh tanggung jawab.</p>
        </div>

        <div class="content mt-4">
            <p>PIHAK PERTAMA                                                        PIHAK KEDUA </p>
            <br>
            <br>
            <p>Sobar                                                                {{ $item->nama_pegawai }}</p>
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
@endforeach