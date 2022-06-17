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
                        <th class="nowrap rjust">% Hadir</th>
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
                                {{ $student->kehadiran }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            <hr class="new">
            @foreach ($students as $status)
                @if ($loop->first)
                    <p style="margin-left: 8%">Tunggakan Administrasi:

                        @if ($status->statusPembayaran == 0)
                            <b>Belum melakukan pembayaran <= 60%</b><br />
                                @else
                                    <b>Telah melakukan pembayaran >= 60%</b><br />
                        @endif
                @endif
            @endforeach
            Dicetak pada tanggal: {{ date('d-m-Y', time()) }}<br />
            Dalam rangka pertemuan orang tua siswa</p>
            <br />
            <p><i>Dalam Rangka digitalisasi,
                    Bapak/Ibu orangtua/wali mahasiswa/i IDE LPKIA<br />
                    dapat memantau kemajuan studi putra/i
                    melalui aplikasi atau website siakad.<br />
                    silahkan lengkapi data orangtua pada Biodata Mahasiswa/i
                    <br />atau melalui link berikut: <b>lpkia.ac.id/pertemuanortu</b></i></p>
        </div>
    </div>
</body>

</html>
