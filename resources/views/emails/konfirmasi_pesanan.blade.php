<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pesanan Anda telah dikonfirmasi!</h1>
        </div>
        <div class="content">
            <p>Yth,
            <br>{{ $pelanggan }},</p>
            <p>Kami dari Bali Temple Tour memberitahukan bahwa pesanan Anda dengan nomor pesanan {{ sprintf('%06d', $nomor_pesanan) }} telah berhasil dikonfirmasi.</p>
            <p>Terima kasih telah menggunakan layanan kami. Kami harap Anda dapat menikmati pengalaman tour pada Bali Temple Tour.</p>
            <p>Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut.</p>
        </div>
        <div class="footer">
            <p>Salam hormat,</p>
            <p>Bali Temple Tour</p>
        </div>
    </div>
</body>
</html>
