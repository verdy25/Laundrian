<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Transaksi</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $item)
        <tr>
            <td>{{$item->created_at->format('d F Y')}}</td>
            <td>{{$item->transaksi}}</td>
            <td>Rp {{$item->pemasukan}}</td>
            <td>Rp {{$item->pengeluaran}}</td>
        </tr>
        @endforeach
    </tbody>
    {{-- <tfoot>
        <tr>
            <td colspan="2"></td>
            <td><strong>Rp {{$pemasukan}}</strong></td>
            <td><strong>Rp {{$pengeluaran}}</strong></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><strong>Pendapatan</strong></td>
            <td><strong>Rp {{$pendapatan}}</strong></td>
        </tr>
    </tfoot> --}}
</table>
