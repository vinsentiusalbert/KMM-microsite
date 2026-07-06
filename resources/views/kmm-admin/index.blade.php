<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KMM Admin - Data Pendaftaran</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            color: #171126;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f4f7;
        }
        .page {
            width: min(1180px, calc(100% - 28px));
            margin: 0 auto;
            padding: 24px 0 40px;
        }
        .topbar {
            display: flex;
            gap: 14px;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }
        h1 {
            margin: 0;
            color: #34207f;
            font-size: 26px;
        }
        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
            justify-content: flex-end;
        }
        .button,
        button {
            min-height: 40px;
            padding: 10px 14px;
            border: 0;
            border-radius: 6px;
            color: #fff;
            background: #34207f;
            font: inherit;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }
        .button.export {
            color: #24145f;
            background: #d6b15e;
        }
        .panel {
            padding: 18px;
            border-radius: 8px;
            background: #fff;
            border: 1px solid #e6ddf0;
            box-shadow: 0 14px 34px rgba(24, 15, 77, .08);
            overflow-x: auto;
        }
        table.dataTable thead th {
            color: #34207f;
        }
        .empty-note {
            margin: 0;
            color: #6d647a;
            font-size: 14px;
        }
        @media (max-width: 640px) {
            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
            .actions {
                width: 100%;
                justify-content: stretch;
            }
            .button,
            button {
                flex: 1;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <div class="topbar">
            <div>
                <h1>Data Pendaftaran</h1>
                <p class="empty-note">Total data: {{ $registrations->count() }}</p>
            </div>

            <div class="actions">
                <a class="button export" href="{{ route('kmm-admin.export') }}">Export Excel</a>
                <form method="POST" action="{{ route('kmm-admin.logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>

        <section class="panel">
            <table id="registrationTable" class="display stripe" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Whatsapp</th>
                        <th>Tanggal Submit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $registration)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $registration->name }}</td>
                            <td>{{ $registration->email }}</td>
                            <td>{{ $registration->whatsapp }}</td>
                            <td>{{ optional($registration->created_at)->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $('#registrationTable').DataTable({
                pageLength: 10,
                order: [[4, 'desc']],
                language: {
                    search: 'Cari:',
                    lengthMenu: 'Tampilkan _MENU_ data',
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    infoEmpty: 'Belum ada data',
                    zeroRecords: 'Data tidak ditemukan',
                    paginate: {
                        first: 'Awal',
                        last: 'Akhir',
                        next: 'Berikutnya',
                        previous: 'Sebelumnya'
                    }
                }
            });
        });
    </script>
</body>
</html>
