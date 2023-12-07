<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Surat Berita Acara</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @foreach($data_penerimas as $item)
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            line-height: 1.5;
            margin-left: 2cm;
            margin-right: 2cm;
        }

        header, footer {
            text-align: center;
            margin-bottom: 20px;
        }

        h6 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        hr {
            margin: 10px 0;
            border: none;
            border-top: 2px solid #333;
        }

        p {
            text-align: justify;
            margin-bottom: 12px;
            .text-right {
            text-align: right;
        }


        }

        .content, .subject {
            margin-top: 10px;
        }

        .signature-container {
            margin-top: 20px;
        }
    </style>
    @endforeach
</head>
<body>

    <header>
        <h6>BERITA ACARA SERAH TERIMA BARANG</h6>
        <h6>PENGGUNAAN NOTEBOOK PT.PLN(PERSERO)</h6>
        <h6>UNIT INDUK DISTRIBUSI JAWA TENGAH DAN D.I. YOGYAKARTA</h6>
        <hr>
    </header>

    <div class="content">
    <p>Pada hari {{ \Carbon\Carbon::now()->translatedFormat('l') }}, tanggal {{ tanggalToWord(\Carbon\Carbon::now()->format('d')) }},
        Bulan {{ \Carbon\Carbon::now()->translatedFormat('F') }}, Tahun {{ numberToWord(\Carbon\Carbon::now()->format('Y')) }} ( {{ \Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}), kami yang bertanda tangan di bawah ini:
    </p>
        <div class="signatories">
    <table>
        <tr>
            <td><strong>Pihak Pertama:</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: Soleh</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Jabatan:</td>
            <td>: Staff</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>: 4270298902</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        @if ($data_penerimas && is_object($data_penerimas))
            <tr>
                <td><strong>Pihak Kedua:</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: {{ $data_penerimas->nama_pegawai }}</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:  {{ $data_penerimas->jabatan }}</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:  {{ $data_penerimas->NIP }}</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        @endif
    </table>
</div>


    <div class="subject">
        @if ($data_penerimas && is_object($data_penerimas))
            <p>PIHAK PERTAMA telah menyerahkan {{ str_replace(' ', '<br>', $data_penerimas->jenis_barang) }} beserta kelengkapannya kepada PIHAK KEDUA dan PIHAK KEDUA telah menerima penyerahan dari PIHAK PERTAMA sebuah {{ str_replace(' ', '<br>', $data_penerimas->merk_barang) }} SN: {{ $data_penerimas->serial_number }}. Berikut kelengkapannya: {{ str_replace(' ', '   ', $data_penerimas->kelengkapan_barang) }} dan selanjutnya 1 (satu) set barang tersebut menjadi tanggung jawab PIHAK KEDUA serta tunduk dan menyetujui pada ketentuan sebagai berikut:
            </p>
        @endif
    </div>

    <div class="content">
        <p>1. HAK PENGGUNA NOTEBOOK:<br>
            a. Mempergunakan selama PIHAK KEDUA menjabat pada jabatan sebagaimana dimaksud angka II.<br>
            b. Mendapat perawatan rutin terhadap Notebook yang digunakan apabila diminta<br>
            c. Mendapat perbaikan apabila Notebook mengalami kerusakan / keluhan<br>
            d. Mengembalikan Notebook atas permintaan PIHAK PERTAMA.
        </p>

        <p>2. Kewajiban Pengguna Notebook:<br>
            a. Mengembalikan Notebook ke PIHAK PERTAMA apabila PIHAK KEDUA mutasi ke Unit lain, atau tidak menjabat lagi pada jabatan sebagaimana dimaksud pada angka II, atau Purna Karya.<br>
            b. Pengembalian sebagaimana dimaksud pada butir 2.a di atas paling lambat 3 (tiga) hari kalender setelah Surat Keputusan Mutasi atau lainnya diterima.<br>
            c. Mengganti biaya klaim apabila terjadi kehilangan (dengan didahului investigasi), kerusakan diluar jaminan, kelalaian pengguna (jatuh, banjir, dll) yang dikarenakan oleh PIHAK KEDUA.<br>
            d. Notebook digunakan untuk keperluan Dinas dan merawat agar kondisi Notebook dalam kondisi tetap baik dan tidak diperkenankan mengalihkan penggunaan Notebook kepada orang lain tanpa pemberitahuan kepada PIHAK PERTAMA.<br>
            e. PIHAK KEDUA wajib mengembalikan Notebook apabila PIHAK PERTAMA membutuhkan dengan mendahului adanya pemberitahuan sebelumnya.
        </p>

        <p>Demikian Berita Acara Serah Terima ini kami buat untuk dilaksanakan dengan penuh tanggung jawab.</p>
    </div>
    <table style="width: 100%;">
    <tr>
        <td style="width: 50%;">
            <div class="signature-container">
                @if ($data_penerimas && is_object($data_penerimas))
                    <p class="signature-party">PIHAK PERTAMA</p>
                    <br>
                    <br>
                    <br>
                    <p class="signature-party">Sobar</p>
                @endif
            </div>
        </td>

        <td style="width: 10%;">
            <div class="signature-container">
                @if ($data_penerimas && is_object($data_penerimas))
                    <p class="signature-party text-left">PIHAK KEDUA</p>
                    <br>
                    <br>
                    <br>
                    <p class="signature-party text-center">{{ $data_penerimas->nama_pegawai }}</p>
                @endif
            </div>
        </td>
    </tr>
</table>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

<?php
function numberToWord($number)
{
    $words = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
    if ($number < 12) {
        return $words[$number];
    } elseif ($number < 20) {
        return numberToWord($number - 10) . " Belas";
    } elseif ($number < 100) {
        return numberToWord($number / 10) . " Puluh " . numberToWord($number % 10);
    } elseif ($number < 200) {
        return "Seratus " . numberToWord($number - 100);
    } elseif ($number < 1000) {
        return numberToWord($number / 100) . " Ratus " . numberToWord($number % 100);
    } elseif ($number < 2000) {
        return "Seribu " . numberToWord($number - 1000);
    } elseif ($number < 1000000) {
        return numberToWord($number / 1000) . " Ribu " . numberToWord($number % 1000);
    } elseif ($number < 1000000000) {
        return numberToWord($number / 1000000) . " Juta " . numberToWord($number % 1000000);
    } elseif ($number < 1000000000000) {
        return numberToWord($number / 1000000000) . " Miliar " . numberToWord($number % 1000000000);
    } else {
        return numberToWord($number / 1000000000000) . " Triliun " . numberToWord($number % 1000000000000);
    }
}
function tanggalToWord($tanggal)
{
    $tanggal = intval($tanggal);
    $angka = [
        '', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas',
        'Dua Belas', 'Tiga Belas', 'Empat Belas', 'Lima Belas', 'Enam Belas', 'Tujuh Belas', 'Delapan Belas', 'Sembilan Belas'
    ];
    $bulan = [
        '', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    if ($tanggal < 20) {
        return $angka[$tanggal];
    } elseif ($tanggal < 30) {
        return 'Dua Puluh ' . $angka[$tanggal - 20];
    } else {
        return $angka[$tanggal - 30] . ' Puluh';
    }
}

?>