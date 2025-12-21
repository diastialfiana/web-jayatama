<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kontak Baru - Jayatama</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #007bff; color: white; padding: 20px; text-align: center; }
        .content { background: #f8f9fa; padding: 20px; border-radius: 0 0 5px 5px; }
        .field { margin-bottom: 15px; }
        .field-label { font-weight: bold; color: #495057; }
        .field-value { color: #212529; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #dee2e6; font-size: 12px; color: #6c757d; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Pesan Kontak Baru</h2>
        </div>
        <div class="content">
            <div class="field">
                <div class="field-label">Nama:</div>
                <div class="field-value">{{ $data['name'] }}</div>
            </div>
            
            <div class="field">
                <div class="field-label">Email:</div>
                <div class="field-value">{{ $data['email'] }}</div>
            </div>
            
            @if(isset($data['phone']) && $data['phone'])
            <div class="field">
                <div class="field-label">Telepon:</div>
                <div class="field-value">{{ $data['phone'] }}</div>
            </div>
            @endif
            
            @if(isset($data['company']) && $data['company'])
            <div class="field">
                <div class="field-label">Perusahaan:</div>
                <div class="field-value">{{ $data['company'] }}</div>
            </div>
            @endif
            
            <div class="field">
                <div class="field-label">Subjek:</div>
                <div class="field-value">{{ $data['subject'] }}</div>
            </div>
            
            <div class="field">
                <div class="field-label">Pesan:</div>
                <div class="field-value" style="white-space: pre-wrap;">{{ $data['message'] }}</div>
            </div>
            
            <div class="field">
                <div class="field-label">Tanggal:</div>
                <div class="field-value">{{ now()->format('d F Y H:i') }}</div>
            </div>
        </div>
        
        <div class="footer">
            <p>Email ini dikirim secara otomatis dari formulir kontak website Jayatama.</p>
            <p>© {{ date('Y') }} PT Jasa Swadaya Utama (Jayatama). All rights reserved.</p>
        </div>
    </div>
</body>
</html>