<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Banter</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .hero-section {
            position: relative;
            width: 100%;
            height: 400px;

            /* Gambar + overlay gelap */
            background:
                linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)),
                url('{{ asset('images/riauport-logo.png') }}');

            background-size: cover;
            /* memenuhi seluruh area */
            background-position: center;
            background-repeat: no-repeat;

            display: flex;
            align-items: center;
            justify-content: flex-start;
            /* biar teks tetap ke kiri */
            padding-left: 40px;
            /* jarak kiri */
            color: white;
        }
        .hero-content {
            max-width: 800px;
            padding: 0 20px;
            text-align: left;
        }

        .about-label {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .hero-content h1 {
            font-size: 42px;
            font-weight: 600;
            line-height: 1.3;
            margin: 0;
        }

        .content-section {
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
        }

        .content-column {
            font-size: 15px;
            color: #4a5568;
        }

        .content-column p {
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .content-column ul {
            list-style: none;
            margin: 20px 0;
            padding-left: 0;
        }

        .content-column ul li {
            padding-left: 20px;
            margin-bottom: 12px;
            position: relative;
        }

        .content-column ul li:before {
            content: "•";
            position: absolute;
            left: 0;
            color: #cbd5e0;
            font-size: 20px;
        }

        .quote-box {
            background: #f7fafc;
            border-left: 4px solid #e2e8f0;
            padding: 24px;
            margin: 30px 0;
            font-style: italic;
            color: #2d3748;
            line-height: 1.8;
        }

        a {
            color: #2563eb;
            text-decoration: underline;
        }

        a:hover {
            color: #1e40af;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 32px;
            }

            .content-section {
                grid-template-columns: 1fr;
                gap: 40px;
                margin: 40px auto;
                padding: 0 20px;
            }
        }
    </style>
</head>

<body>
    <div class="hero-section">
        <div class="hero-content">
            <div class="about-label">ABOUT BANTER</div>
            <h1>Illuminating today's stories on culture, business, and science through great journalism.</h1>
        </div>
    </div>

    <div class="content-section">
        <div class="content-column">
            <p><strong>Q</strong>uam venenatis gravida et urna molestie leo adipiscing dolore leo euismod quam. Aenean
                porta curabitur convallis pellentesque velit platea at neque phasellus. Aliquet pellentesque senectus
                velit magna ultrices iaculis justo habitasse vitae neque ornare nullam leo. Est facilisis mauris purus
                senectus non convallis praesent pharetra dictum dui molestie iaculis.</p>

            <p>Lorem ipsum dolor sit amet quis at praesent erat. Egestas justo ut tempus elementum aenean luctus <a
                    href="#">an awesome link</a> fusce curabitur at malesuada.</p>

            <ul>
                <li>Urna magna mauris hendrerit molestie rhoncus enim magna tempor nisi.</li>
                <li>Lorem ipsum dolor sit amet tempus bibendum dolore ida.</li>
                <li>Eget consectetur orci sodales purus ac egestas consequat erat mattis mi sapien adipiscing hac.</li>
            </ul>

            <p>Lorem ipsum dolor sit amet netus viverra neque quisque nisi mattis dapibus dictumat. Erat venenatis
                iaculis a tellus a auctor cursus morbi neque molestie incididunt faucibus.</p>

            <p>Lorem ipsum dolor sit amet lobortis risus nisl lacus quisque porttitor fermentum arcu adipiscing.</p>
        </div>

        <div class="content-column">
            <p>Lorem ipsum dolor sit amet **bold text** quam luctus praesent id.Gravida donec morbi incididunt enim sed
                sollicitudin malesuada tempus. Lorem ipsum dolor sit amet lectus quisque mauris scelerisque orci.
                Vulputate leo dolore leo tristique viverra posuere diam pellentesque nec sepien.</p>

            <div class="quote-box">
                "Lorem ipsum dolor sit pretium nullam diam facilisi. Lacus volutpat malesuada fusce quis est integer
                euismod cras est suspendisse facilisi morbi."
            </div>

            <p>Lorem ipsum dolor sit amet quis at praesent erat. Egestas justo ut tempus elementum aenean luctus <a
                    href="#">another awesome link</a> fusce curabitur at malesuada.</p>

            <p>Lorem ipsum dolor sit amet fermentum eget porta. Semper auctor tellus laoreet ut vulputate ullamcorper
                fringilla gravida dictum. Malesuada arcu aliquet cras molestie viverra vulputate netus dolore aliquam
                dictum ornare ullamcorper. Erat pretium bibendum dolore quis dictum vivamus libero curabitur consequat
                donec.</p>

            <p>Lorem ipsum dolor sit amet quis habitasse rhoncus ac lobortis sapien. Mattis donec posuere facilisis do
                faucibus laoreet tellus interdum ultricies vulputate a fringilla senectus consequat.</p>
        </div>
    </div>
</body>

</html>
