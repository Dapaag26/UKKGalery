
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        /* Gaya khusus untuk cetak */
        @media print {
            /* Atur ukuran kertas dan orientasi halaman */
            @page {
                size: 80mm 600mm; /* Atur lebar dan panjang kertas dalam milimeter */
                /* Anda juga bisa menentukan orientasi halaman, misalnya:
                   orientation: landscape; untuk mode landscape */
            }

            /* Pastikan konten tetap di dalam kertas */
            body {
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th colspan="4" class="text-center">Nota Penjualan</th>
        </tr>
        <tr>
            <th colspan="4" class="text-center">Toko Blabla</th>
        </tr>
        <tr>
            <th colspan="4" class="text-center">Jln jln</th>
        </tr>
        <tr>
            <th colspan="4"><hr></th>
        </tr>
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($data_barang as $i)
        <tr>
            <td class="text-center">{{ $i->photo->nama }}</td>
            <td class="text-center">{{ $i->photo->created_at }}</td>
        </tr>
        @endforeach
    </table>
    <br>
    <br>
    <div style="width: 100%; display: flex; flex-direction: column; align-items: flex-end; margin-right: 5%;">
        <label style="margin-top: 2%;">Kediri, {{ now() }}</label>
        <div id="qrcode" style="margin-top: 2%;"></div>
        <label style="margin-top: 2%;">{{ Auth::user()->name }}</label>
    </div>
</body>
</html>

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include qrcode.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<!-- JavaScript to generate QR code -->
<script>
    $(document).ready(function() {
        // Generate QR code
        var username = "{{ Auth::user()->name }} \n"+" Tanggal : {{ now() }}"; // Mendapatkan nama pengguna dari auth Laravel
        var qrText = "Ditanda tangan di PT PENJUALAN\n" + username;
        var qr = new QRCode(document.getElementById("qrcode"), {
            text: qrText,
            width: 90,  // Set the width of QR code
            height: 90  // Set the height of QR code
        });

        // Menunda pencetakan dengan setTimeout
        setTimeout(function() {
            window.print(); // Mencetak saat halaman dimuat
        }, 500); // Menunda pencetakan selama 500 milidetik (0.5 detik)
    });
</script>
