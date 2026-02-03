<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; color: #333; }
        .header { border-bottom: 2px solid #5C4033; padding-bottom: 20px; margin-bottom: 30px; }
        .logo { font-size: 24px; font-weight: bold; color: #5C4033; text-transform: uppercase; }
        .status { float: right; font-weight: bold; color: #16a34a; border: 2px solid #16a34a; padding: 5px 15px; border-radius: 5px; text-transform: uppercase; }
        
        .content { margin-bottom: 30px; }
        .row { display: table; width: 100%; margin-bottom: 15px; }
        .col { display: table-cell; width: 50%; vertical-align: top; }
        
        .label { font-size: 10px; text-transform: uppercase; color: #888; margin-bottom: 5px; font-weight: bold; }
        .value { font-size: 14px; font-weight: bold; margin-bottom: 15px; }
        .big-value { font-size: 18px; font-weight: bold; color: #5C4033; }
        
        .qr-section { text-align: center; margin-top: 50px; border-top: 1px dashed #ccc; padding-top: 30px; }
        .footer { position: fixed; bottom: 0; left: 0; right: 0; text-align: center; font-size: 10px; color: #aaa; border-top: 1px solid #eee; padding-top: 10px; }
    </style>
</head>
<body>

    <div class="header">
        <span class="logo">Tripio Travel</span>
        <span class="status">CONFIRMED</span>
    </div>

    <div class="content">
        <div class="row">
            <div class="col">
                <div class="label">Booking ID</div>
                <div class="value">#TRIP-<?= str_pad($data['id'], 6, '0', STR_PAD_LEFT) ?></div>

                <div class="label">Nama Penumpang</div>
                <div class="value"><?= $data['user_name'] ?></div>
                
                <div class="label">Email Kontak</div>
                <div class="value"><?= $data['user_email'] ?></div>
            </div>
            <div class="col">
                <div class="label">Paket Wisata</div>
                <div class="big-value"><?= $data['tour_name'] ?></div>
                
                <div class="label" style="margin-top: 10px;">Lokasi</div>
                <div class="value"><?= $data['location'] ?></div>

                <div class="label">Durasi</div>
                <div class="value"><?= $data['duration'] ?> Hari Perjalanan</div>
            </div>
        </div>

        <div class="row" style="background: #f9f9f9; padding: 15px; border-radius: 10px;">
            <div class="col">
                <div class="label">Tanggal Booking</div>
                <div class="value"><?= date('d F Y', strtotime($data['booking_date'])) ?></div>
            </div>
            <div class="col">
                <div class="label">Status Pembayaran</div>
                <div class="value" style="color: #16a34a;">LUNAS (PAID)</div>
            </div>
        </div>
    </div>

    <div class="qr-section">
        <img src="https://quickchart.io/qr?text=TIKET-VALID-<?= $data['id'] ?>&size=150" width="120">
        <p style="font-size: 10px; color: #888; margin-top: 10px;">Tunjukkan QR Code ini kepada petugas saat check-in.</p>
    </div>

    <div class="footer">
        © 2026 Tripio Travel System. E-Ticket ini adalah bukti pembayaran yang sah.
    </div>

</body>
</html>