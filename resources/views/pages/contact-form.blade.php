<!DOCTYPE html>
<html>
<head>
    <title>Pesan Kontak Baru</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #007bff; color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #333; }
        .value { color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pesan Kontak Baru</h1>
            <p>Website Jayatama</p>
        </div>
        <div class="content">
            <div class="field">
                <span class="label">Nama:</span>
                <span class="value">{{ $data['name'] }}</span>
            </div>
            <div class="field">
                <span class="label">Email:</span>
                <span class="value">{{ $data['email'] }}</span>
            </div>
            <div class="field">
                <span class="label">Telepon:</span>
                <span class="value">{{ $data['phone'] ?? 'Tidak diisi' }}</span>
            </div>
            <div class="field">
                <span class="label">Subjek:</span>
                <span class="value">{{ $data['subject'] }}</span>
            </div>
            <div class="field">
                <span class="label">Pesan:</span>
                <div class="value">{{ $data['message'] }}</div>
            </div>
            <div class="field">
                <span class="label">Tanggal:</span>
                <span class="value">{{ now()->format('d F Y H:i') }}</span>
            </div>
        </div>
    </div>
</body>
</html>