<table>
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
