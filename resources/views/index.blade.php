<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Skor Siswa</title>

    <style>
        body {
            background: #f4f6f8;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #2563eb;
            color: white;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background: #f9fafb;
        }

        tbody tr:hover {
            background: #e0e7ff;
        }

        .empty {
            text-align: center;
            margin-top: 15px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Skor Siswa</h1>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Total</th>
                <th>Rata-rata</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $score)
            <tr>
                <td>{{ $score->nama }}</td>
                <td>{{ $score->tugas }}</td>
                <td>{{ $score->uts }}</td>
                <td>{{ $score->uas }}</td>
                <td>{{ $score->tugas + $score->uts + $score->uas }}</td>
                <td>{{ round(($score->tugas + $score->uts + $score->uas) / 3, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if ($data->isEmpty())
        <div class="empty">Belum ada data skor siswa</div>
    @endif
</div>

</body>
</html>
