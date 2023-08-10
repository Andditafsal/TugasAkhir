<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Diterima</th>
            <th>Asal Surat</th>
            <th>Nomor Surat</th>
            <th>Tanggal Surat</th>
            <th>Perihal</th>
            <th>Diajukan Kepada</th>
            <th>Ket</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suratmasuk as $suratmasuk)
            <tr>
                <td>{{ $suratmasuk->id }}</td>
                <td>{{ $suratmasuk->tanggal }}</td>
                <td>{{ $suratmasuk->alamat_surat }}</td>
                <td>{{ $suratmasuk->nomor_surat }}</td>
                <td>{{ $suratmasuk->perihal }}</td>
                <td>{{ $suratmasuk->tanggal_surat }}</td>
                <td>{{ $suratmasuk->diajukan }}</td>
                <td>{{ $suratmasuk->keterangan_surat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
