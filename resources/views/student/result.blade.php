<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
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
        font-size: 18pt;
        margin-top: 10px;
    }

    .gambar {
        position: relative;
        top: 100px;
        left: 80px;
    }

    .footer {
        text-align: center;
        padding: 10px;
        background-color: #f2f2f2;
    }
</style>

<body>
    <script>
        window.print()
    </script>
    <header>
        <header>
            <img class="gambar"
                src="https://lh3.googleusercontent.com/pw/AM-JKLWV3Ay9WoCetoK6IyCemuKVcWNWJ7DbvOnBljUfgvsDWUM7r6hXBgAROg2kOsOJm4jbPdFrNTsgAGfzbbmreQmjz2yApoCyks2E8xVoA0U_K7xXTTW_tCJ7osnbWYMjlDoovqdgaQVvxDj54p3t8Br_=w351-h379-no?authuser=1"
                alt="logo lpkia" height="100px" style="right: 10em">
            <p class="center-text title"><strong>INSTITUT DIGITAL EKONOMI LPKIA BANDUNG</strong>
            <p class="center-text">Jl. Soekarno Hatta No. 456 Bandung 40266 <br> Telepon: (022)7564283/84, Fax:
                (022)7564282</p>

            <p class="center-text" style="font-size: 16pt; margin-top: 4em"><b>INFORMASI KEMAJUAN STUDI</b></p>
        </header>
    </header>
    <div class="row">
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
        <div class="col-md-6">
            <p style="margin-left: 16%"><b>Kelas</b></p>
        </div>
        <div class="col-md-6">
            @foreach ($students as $kelas)
                @if ($loop->first)
                    <p style="text-align: right; margin-right: 15%"><b>{{ $kelas->kelas }}</b></p>
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
                            {{-- @if ($student->statusPembayaran == 0)
                                <td>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </td>
                            @else
                                <td>
                                    {{ $student->tugasQuiz }} </td>
                                <td>
                                    {{ $student->uts }} </td>
                                <td>
                                    {{ $student->uas }} </td>
                            @endif --}}
                            <td>
                                {{ $student->tugasQuiz }} </td>
                            <td>
                                {{ $student->uts }} </td>
                            <td>
                                {{ $student->uas }} </td>
                            <td>
                                {{ $student->kehadiran }} %</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach ($students as $bayar)
                @if ($loop->first)
                    {{-- @if ($bayar->statusPembayaran == 1)
                        <p>Indeks Prestasi: <strong>{{ number_format((float) $getIP, 2, '.', '') }}</strong></p>
                    @else
                        <p>Indeks Prestasi: <strong><i class="fa fa-times" aria-hidden="true"></i></strong></p>
                    @endif --}}
                    <p>Indeks Prestasi: <strong>{{ number_format((float) $getIP, 2, '.', '') }}</strong></p>
                @endif
            @endforeach
        </div>

        <div class="col-md-12">
            <hr class="new">
            <p style="margin-left: 8%">
                <b>Rincian Tunggakan:</b> <br>
            </p>

            @foreach ($students as $tunggakanMhs)
                @php
                    $tunggakan = str_replace(';', '<br>', $tunggakanMhs->tunggakan);
                @endphp
                @if ($loop->first)
                    @if ($tunggakanMhs->tunggakan == 0)
                        <p style="margin-left: 8%">Sudah melakukan pelunasan pembayaran</p>
                    @else
                        <p style="margin-left: 8%">{!! $tunggakan !!}</p>
                        <p>Data tagihan diambil pada tanggal <strong>{{ $student->created_at->format('d F Y H:i') }}</strong></p>
                    @endif
                @endif
            @endforeach

            <br />
            <p>Dalam rangka Pertemuan Orang Tua Siswa</p>
            <footer><i>Dalam Rangka Digitalisasi,
                    Bapak/Ibu Orangtua/Wali Mahasiswa/i IDE LPKIA<br />
                    dapat memantau kemajuan studi putra/i
                    melalui Aplikasi atau Website SiAkad.<br />
                    Silahkan lengkapi data Orangtua pada Biodata Mahasiswa/i
                    <br />atau melalui link berikut: <b>lpkia.ac.id/pertemuanortu</b></i></footer>
        </div>
    </div>
    <footer class="footer">
        <p>
            <strong>&copy; {{ date('Y') }} IDE LPKIA.</strong>
            All rights reserved. | Dicetak pada:
            <span id="timestamp"></span>
        </p>
    </footer>
    <script>
        // Mengatur timestamp pada elemen span dengan id "timestamp"
        var timestampElement = document.getElementById('timestamp');
        var currentDate = new Date();
        var timestamp = currentDate.toLocaleString();
        timestampElement.innerHTML = timestamp;
    </script>
</body>

</html>
