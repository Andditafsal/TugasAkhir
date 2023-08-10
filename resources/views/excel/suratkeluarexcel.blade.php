<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kantor Instansi/Yang Dituju</th>
            <th>Nomor Surat</th>
            <th>Perihal</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($suratkeluar as $suratkeluar)
            <tr>
                <td>{{ $suratkeluar->id }}</td>
                <td>{{ $suratkeluar->tanggal_surat }}</td>
                <td>{{ $suratkeluar->kepada }}</td>
                <td>{{ $suratkeluar->perihal }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
