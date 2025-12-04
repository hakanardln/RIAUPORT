<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang RiauPort</title>

    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
</head>

<body>

    @include('components.navbar')

    <section id="about" class="hero-section">
        <div class="hero-content">
            <div class="about-label">TENTANG RIAUPORT</div>
            <h1>Sistem Informasi Layanan Travel berbasis website untuk mempermudah perjalanan Anda</h1>
        </div>
    </section>

    <section class="content-section">
        <div class="content-column">
            <h2>Tentang RiauPort</h2>
            <p><strong>S</strong>istem Informasi Layanan Travel berbasis website berfungsi untuk mempermudah masyarakat
                dalam memperoleh informasi terkait perjalanan travel, khususnya untuk kebutuhan mudik.</p>
            <p>Website ini menyediakan informasi terpusat tentang nama travel, jadwal keberangkatan, destinasi, harga,
                jenis kendaraan, dan kontak yang bisa dihubungi.</p>
        </div>

        <div class="content-column">
            <div class="highlight-box">
                Temukan berbagai Travel dalam satu platform RiauPort
            </div>
        </div>
    </section>

    @include('components.footer')

    <script src="{{ asset('js/about.js') }}"></script>
</body>

</html>
