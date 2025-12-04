<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kode Verifikasi RiauPort</title>
</head>

<body style="font-family: Arial, sans-serif; background: #f7f9fc; padding: 30px;">
    <div
        style="max-width: 480px; margin: auto; background: white; padding: 30px; border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);">

        <h2 style="text-align: center; color: #0E586D; margin-bottom: 10px;">
            Verifikasi Email Anda
        </h2>

        <p style="font-size: 15px; color: #444;">
            Halo, berikut adalah kode verifikasi untuk akun <strong>RiauPort</strong> Anda:
        </p>

        <div style="text-align: center; margin: 30px 0;">
            <div
                style="font-size: 32px; font-weight: bold; letter-spacing: 8px; 
                color: #0E586D; padding: 15px 0;">
                {{ $otp }}
            </div>
        </div>

        <p style="font-size: 14px; color: #555;">
            Kode ini berlaku selama <strong>1 menit</strong>.
            Jangan berikan kepada siapa pun untuk menghindari penyalahgunaan.
        </p>

        <p style="margin-top: 25px; font-size: 13px; color: #888; text-align: center;">
            © {{ date('Y') }} RiauPort — Semua Hak Dilindungi
        </p>
    </div>
</body>

</html>
