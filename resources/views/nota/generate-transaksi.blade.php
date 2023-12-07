<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Nota Pemesanan & Pengembalian Kendaraan</title>
</head>

<body>
    <div class="container" style="padding: 24px;">
        <table>
            <tbody>
                <tr>
                    <td style="width: 300px;">
                        <img src="{{ public_path('assets/img/brand/brand-text.png') }}"
                            alt="Brand Indo Rental Logo Teks" width="220" style="margin-bottom: 22px;">
                    </td>
                    <td style="width: 300px;">
                        <span style="font-weight: bold; line-height: 150%">
                            PT. INDO RENTAL
                            <br>
                            INDO RENTAL TRANSPORT
                        </span>
                        <span style="line-height: 150%">
                            pt.indorental@gmail.com
                            <br>
                            HP: 08123456789
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>

        <hr>

        <table style="margin-top: 62px">
            <tbody>
                {{-- <tr>
                    <td style="padding: 3px; width: 300px;">Nama Sopir</td>
                    <td style="padding: 3px; width: 10px;">:</td>
                    <td style="padding: 3px; width: 300px; text-align: end;">
                        {{ $pemesanan->pembayaran_pemesanan->sopir ? $pemesanan->pembayaran_pemesanan->sopir->nama : '-' }}
                    </td>
                </tr> --}}
                <tr>
                    <td style="padding: 3px; width: 300px;">Unit</td>
                    <td style="padding: 3px; width: 10px;">:</td>
                    <td style="padding: 3px; width: 300px; text-align: end;">
                        {{ $pemesanan->kendaraan->brand_kendaraan ? $pemesanan->kendaraan->brand_kendaraan->nama : '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 3px; width: 300px;">Nomor Plat Kendaraan</td>
                    <td style="padding: 3px; width: 10px;">:</td>
                    <td style="padding: 3px; width: 300px; text-align: end;">
                        {{ $pemesanan->kendaraan ? $pemesanan->kendaraan->nomor_plat : '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 3px; width: 300px;">Waktu Sewa</td>
                    <td style="padding: 3px; width: 10px;">:</td>
                    <td style="padding: 3px; width: 300px; text-align: end;">
                        {{ $pemesanan->pembayaran_pemesanan ? $pemesanan->pembayaran_pemesanan->waktu_sewa : '-' }}
                        hari
                    </td>
                </tr>
                <tr>
                    <td style="padding: 3px; width: 300px;">Biaya Tambahan</td>
                    <td style="padding: 3px; width: 10px;">:</td>
                    <td style="padding: 3px; width: 300px; text-align: end;">
                        {{ $pengembalian->biaya_tambahan ? 'Rp. ' . $pengembalian->biaya_tambahan : 'Rp. 0' }}
                    </td>
                </tr>
                <tr>
                    <td style="padding: 3px; width: 300px;">Total Tarif Sewa</td>
                    <td style="padding: 3px; width: 10px;">:</td>
                    <td style="padding: 3px; width: 300px; text-align: end;">
                        {{ $pemesanan->pembayaran_pemesanan ? 'Rp. ' . $pemesanan->pembayaran_pemesanan->total_tarif_sewa : 'Rp. 0' }}
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="margin-top: 82px">
            <tbody>
                <tr>
                    <td style="width: 300px; text-align: center;">
                        {{ $pemesanan->pemesanan->pelanggan ? $pemesanan->pemesanan->pelanggan->nama : '-' }}</td>
                </tr>
                <tr>
                    <td style="width: 300px; text-align: center;">Penyewa</td>
                </tr>
                <tr>
                    <td style="width: 300px; text-align: center; padding-top: 62px;">(..............)</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
