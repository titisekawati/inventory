<style>
    .tb {
        border-collapse: collapse;
        width: 100%;
    }

    .tb tbody td,
    .tb thead th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .tb tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
<div>
    <center>
        <h4 style="margin-bottom: 10px;">Laporan Barang Masuk</h4>
        <table class="tb">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Barang</th>
                    <th>Kategori</th>
                    <th>Tgl</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $k => $i)
                    <tr>
                        <td>{{ $k + 1 }}</td>
                        <td>{{ $i->no_transaksi }}</td>
                        <td>{{ $i->nama_barang }}</td>
                        <td>{{ $i->nama_kategori }}</td>
                        <td>{{ $i->tanggal }}</td>
                        <td>{{ $i->stok }}</td>
                        <td>{{ $i->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</div>
<script>
    window.onload = function() {
        window.print();
    };
</script>
