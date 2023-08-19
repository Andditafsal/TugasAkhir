<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal </th>
            <th>Kantor Instansi/Yang Dituju</th>
            <th>Perihal</th>
            <th>Pengaju Surat</th>
            <th>Keterangan Surat</th>


        </tr>
    </thead>
    <tbody>
        @foreach ($suratkeluar as $suratkeluar)
            <tr>
                <td>{{ $suratkeluar->id }}</td>
                <td>{{ $suratkeluar->tanggal_surat }}</td>
                <td>{{ $suratkeluar->kepada }}</td>
                <td>{{ $suratkeluar->perihal }}</td>
                <td>{{ $suratkeluar->nama_pengaju }}</td>
                <td>{{ $suratkeluar->keterangan_surat }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
