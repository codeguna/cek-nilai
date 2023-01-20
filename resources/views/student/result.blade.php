<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <title>Result - Mahasiswa</title>
</head>
<style>
    .center-text {
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }

    hr.new {
        height: 5px;
        border-top: 1px solid black;
        border-bottom: 2px solid black;
        width: 100%;
    }

    .title {
        font-size: 20pt;
    }
</style>

<body>
    <script>
        window.print()
    </script>
    <div class="row">
        <div class="col-md-12">
            <p class="center-text title"><strong>INSTITUT DIGITAL EKONOMI LPKIA BANDUNG</strong></p>
            <p class="center-text">Jl. Soekarno Hatta No. 456 Bandung 40266 Telepon: (022)7564283/84, Fax: (022)7564282
            </p>
            <p class="center-text" style="font-size: 15pt"><b>INFORMASI KEMAJUAN STUDI</b></p>
            <br />
        </div>
        <div class="col-md-6">
            <p style="margin-left: 16%;"><b>Nama</b></p>
        </div>
        <div class="col-md-6">
            @foreach ($students as $nama)
                @if ($loop->first)
                    <p style="text-align: right; margin-right: 15%"><b>{{ $nama->nama }}</b></p>
                @endif
            @endforeach
        </div>
        <div class="col-md-6">
            <p style="margin-left: 16%"><b>NRP</b></p>
        </div>
        <div class="col-md-6">
            @foreach ($students as $nim)
                @if ($loop->first)
                    <p style="text-align: right; margin-right: 15%"><b>{{ $nim->nim }}</b></p>
                @endif
            @endforeach
        </div>
        <div class="col-lg-12">
            <table class="table">
                <thead>

                    <tr>
                        <th class="rjust">No</th>
                        <th class="fill">Mata Kuliah</th>
                        <th class="rjust">Tugas/Quiz</th>
                        <th class="rjust">UTS</th>
                        <th class="rjust">UAS</th>
                        <th>Kehadiran</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($students as $student)
                        <tr>

                            <td>{{ ++$i }}</td>
                            <td>
                                {{ $student->namaMK }}</td>
                            @if ($student->statusPembayaran == 0)
                                <td>
                                    x</td>
                                <td>
                                    x</td>
                                <td>
                                    x</td>
                            @else
                                <td>
                                    {{ $student->tugasQuiz }} </td>
                                <td>
                                    {{ $student->uts }} </td>
                                <td>
                                    {{ $student->uas }} </td>
                            @endif

                            <td>
                                {{ $student->kehadiran }} %</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Indeks Prestasi: <strong>{{ number_format((float) $getIP, 2, '.', '') }}</strong></p>
        </div>

        <div class="col-md-12">
            <hr class="new">

            @foreach ($students as $status)
                @php
                    $tunggakan = 'Rp ' . number_format($status->tunggakan, 2, ',', '.');
                @endphp
                @if ($loop->first)
                    <p style="margin-left: 8%">Tunggakan Administrasi:

                        @if ($status->statusPembayaran == 0)
                            <b>Belum melakukan pembayaran <= 50%</b><br />
                                    <b>Jumlah Tunggakan: {{ $tunggakan }}</b>
                                @else
                                    <b>Telah melakukan pembayaran >= 50%</b><br />
                                    <b>Jumlah Tunggakan: {{ $tunggakan }}</b>
                        @endif
                @endif
            @endforeach
            <br />
            Dicetak pada tanggal: {{ date('d-m-Y H:i:s') }}<br />
            Dalam rangka Pertemuan Orang Tua Siswa</p>
            <footer><i>Dalam Rangka Digitalisasi,
                    Bapak/Ibu Orangtua/Wali Mahasiswa/i IDE LPKIA<br />
                    dapat memantau kemajuan studi putra/i
                    melalui Aplikasi atau Website SiAkad.<br />
                    Silahkan lengkapi data Orangtua pada Biodata Mahasiswa/i
                    <br />atau melalui link berikut: <b>lpkia.ac.id/pertemuanortu</b></i></footer>
        </div>
    </div>
</body>

</html>
