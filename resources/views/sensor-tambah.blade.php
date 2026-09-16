<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Data Sensor | AGUS RESEARCH</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #060b14;
            --bg-secondary: #0a1220;
            --card: rgba(15, 24, 39, 0.72);
            --card-hover: rgba(20, 32, 52, 0.85);

            --border: rgba(255,255,255,0.09);

            --text: #f4f7fb;
            --text-soft: #91a0b5;

            --green: #43e58c;
            --cyan: #35d6ff;
            --purple: #9b7cff;
            --red: #ff5c6c;

            --shadow: 0 20px 60px rgba(0,0,0,0.35);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 15% 20%, rgba(67,229,140,0.08), transparent 30%),
                radial-gradient(circle at 85% 10%, rgba(53,214,255,0.08), transparent 30%),
                radial-gradient(circle at 50% 100%, rgba(155,124,255,0.06), transparent 35%),
                var(--bg);

            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Grid Background */
        body::before {
            content: "";
            position: fixed;
            inset: 0;

            background-image:
                linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);

            background-size: 45px 45px;

            pointer-events: none;
            z-index: -1;
        }

        /* Navbar */
        .navbar {
            width: 100%;
            padding: 16px 0 6px;
        }

        .nav-container {
            width: min(1150px, 92%);
            margin: auto;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1px;

            background: linear-gradient(
                90deg,
                var(--green),
                var(--cyan)
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 10px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-soft);

            padding: 9px 15px;
            border-radius: 10px;

            font-size: 14px;
            font-weight: 500;

            transition: 0.3s;
        }

        .nav-links a:hover {
            color: var(--text);
            background: rgba(255,255,255,0.05);
        }

        .nav-links a.active {
            color: var(--green);
            background: rgba(67,229,140,0.08);
            border: 1px solid rgba(67,229,140,0.15);
        }

        /* Main */
        .main {
            width: min(850px, 92%);
            margin: auto;
            padding: 45px 0 70px;
        }

        /* Header */
        .header {
            margin-bottom: 28px;
        }

        .eyebrow {
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            color: var(--green);
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .header h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(30px, 5vw, 44px);
            line-height: 1.1;
            margin-bottom: 12px;
        }

        .header p {
            color: var(--text-soft);
            line-height: 1.7;
            font-size: 15px;
            max-width: 650px;
        }

        /* Status */
        .status {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            margin-top: 18px;

            padding: 7px 12px;
            border-radius: 999px;

            background: rgba(67,229,140,0.07);
            border: 1px solid rgba(67,229,140,0.15);

            color: var(--green);

            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--green);
            box-shadow: 0 0 12px var(--green);

            animation: pulse 1.8s infinite;
        }

        @keyframes pulse {
            0%,100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .5;
                transform: scale(.8);
            }
        }

        /* Form Card */
        .form-card {
            position: relative;

            background: var(--card);
            border: 1px solid var(--border);

            border-radius: 22px;

            padding: 30px;

            box-shadow: var(--shadow);

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            overflow: hidden;
        }

        .form-card::before {
            content: "";

            position: absolute;
            top: 0;
            left: 0;
            right: 0;

            height: 2px;

            background: linear-gradient(
                90deg,
                var(--green),
                var(--cyan),
                var(--purple)
            );
        }

        .form-title {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 25px;
        }

        .form-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: rgba(67,229,140,0.08);
            border: 1px solid rgba(67,229,140,0.15);

            font-size: 20px;
        }

        .form-title h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
        }

        .form-title p {
            color: var(--text-soft);
            font-size: 12px;
            margin-top: 3px;
        }

        /* Alert */
        .alert-success {
            padding: 13px 15px;

            margin-bottom: 22px;

            border-radius: 12px;

            background: rgba(67,229,140,0.08);
            border: 1px solid rgba(67,229,140,0.18);

            color: var(--green);

            font-size: 13px;
        }

        .alert-error {
            padding: 15px;

            margin-bottom: 22px;

            border-radius: 12px;

            background: rgba(255,92,108,0.07);
            border: 1px solid rgba(255,92,108,0.18);

            color: #ff8d99;

            font-size: 13px;
        }

        .alert-error strong {
            display: block;
            margin-bottom: 8px;
            color: var(--red);
        }

        .alert-error ul {
            padding-left: 18px;
        }

        .alert-error li {
            margin-bottom: 4px;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            display: block;

            margin-bottom: 8px;

            color: #dce4ef;

            font-size: 13px;
            font-weight: 600;
        }

        .label-code {
            font-family: 'JetBrains Mono', monospace;
            color: var(--cyan);
            margin-right: 5px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;

            left: 14px;
            top: 50%;

            transform: translateY(-50%);

            color: var(--text-soft);

            font-size: 15px;

            pointer-events: none;
        }

        .form-control {
            width: 100%;

            padding: 13px 15px 13px 42px;

            background: rgba(5, 11, 20, 0.75);

            border: 1px solid rgba(255,255,255,0.09);

            border-radius: 12px;

            color: var(--text);

            font-family: 'Inter', sans-serif;
            font-size: 14px;

            outline: none;

            transition: 0.3s;
        }

        .form-control::placeholder {
            color: #536176;
        }

        .form-control:hover {
            border-color: rgba(255,255,255,0.15);
        }

        .form-control:focus {
            border-color: var(--green);

            box-shadow:
                0 0 0 3px rgba(67,229,140,0.08),
                0 0 25px rgba(67,229,140,0.05);

            background: rgba(7,15,27,0.95);
        }

        /* Number Input */
        input[type="number"] {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 12px;

            margin-top: 30px;
        }

        .btn {
            border: none;
            text-decoration: none;

            padding: 12px 19px;

            border-radius: 11px;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            transition: 0.3s;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            color: #04100a;

            background: linear-gradient(
                135deg,
                var(--green),
                #6cf2ae
            );

            box-shadow: 0 8px 25px rgba(67,229,140,0.15);
        }

        .btn-primary:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 30px rgba(67,229,140,0.22);
        }

        .btn-secondary {
            color: var(--text-soft);

            background: rgba(255,255,255,0.04);

            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            color: var(--text);

            background: rgba(255,255,255,0.08);

            transform: translateY(-2px);
        }

        /* Info */
        .info-box {
            margin-top: 20px;

            padding: 14px 16px;

            border-radius: 12px;

            background: rgba(53,214,255,0.05);
            border: 1px solid rgba(53,214,255,0.12);

            color: var(--text-soft);

            font-size: 12px;
            line-height: 1.6;
        }

        .info-box strong {
            color: var(--cyan);
        }

        /* Footer */
        footer {
            width: min(850px, 92%);
            margin: auto;

            padding: 20px 0 30px;

            border-top: 1px solid rgba(255,255,255,0.06);

            color: #59677b;

            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;

            text-align: center;
        }

        /* Responsive */
        @media (max-width: 700px) {

            .navbar {
                padding-top: 14px;
            }

            .nav-container {
                flex-direction: column;
                gap: 14px;
            }

            .nav-links {
                width: 100%;
                justify-content: center;
            }

            .main {
                padding-top: 35px;
            }

            .form-card {
                padding: 22px;
                border-radius: 18px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 450px) {

            .nav-links a {
                padding: 8px 10px;
                font-size: 12px;
            }

            .header h1 {
                font-size: 30px;
            }

            .form-card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">

            <div class="brand">
                AGUS RESEARCH
            </div>

            <div class="nav-links">
                <a href="/">
                    Home
                </a>

                <a href="/dashboard-sensor" class="active">
                    Dashboard Sensor
                </a>
            </div>

        </div>
    </nav>


    <!-- MAIN -->
    <main class="main">

        <!-- HEADER -->
        <div class="header">

            <div class="eyebrow">
                // sensor_input
            </div>

            <h1>
                Tambah Data Sensor
            </h1>

            <p>
                Masukkan data hasil pengukuran sensor secara manual
                untuk kebutuhan percobaan dan pengujian sistem IoT.
            </p>

            <div class="status">
                <span class="status-dot"></span>
                SYSTEM ONLINE
            </div>

        </div>


        <!-- FORM CARD -->
        <div class="form-card">

            <div class="form-title">

                <div class="form-icon">
                    +
                </div>

                <div>
                    <h2>
                        Input Data Percobaan
                    </h2>

                    <p>
                        Sensor Temperature & Humidity
                    </p>
                </div>

            </div>


            <!-- SUCCESS -->
            @if(session('sukses'))

                <div class="alert-success">
                    ✓ {{ session('sukses') }}
                </div>

            @endif


            <!-- ERROR -->
            @if($errors->any())

                <div class="alert-error">

                    <strong>
                        ⚠ Terjadi Kesalahan
                    </strong>

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- FORM -->
            <form action="/sensor/simpan" method="POST">

                @csrf


                <!-- DEVICE ID -->
                <div class="form-group">

                    <label>
                        <span class="label-code">01.</span>
                        Device ID
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            ◉
                        </span>

                        <input
                            type="text"
                            name="device_id"
                            class="form-control"
                            placeholder="Contoh: ESP8266_01"
                            value="{{ old('device_id') }}"
                            required
                        >

                    </div>

                </div>


                <!-- SUHU -->
                <div class="form-group">

                    <label>
                        <span class="label-code">02.</span>
                        Suhu (°C)
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            ℃
                        </span>

                        <input
                            type="number"
                            step="0.1"
                            name="suhu"
                            class="form-control"
                            placeholder="Contoh: 27.5"
                            value="{{ old('suhu') }}"
                        >

                    </div>

                </div>


                <!-- KELEMBAPAN -->
                <div class="form-group">

                    <label>
                        <span class="label-code">03.</span>
                        Kelembapan (%)
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            %
                        </span>

                        <input
                            type="number"
                            step="0.1"
                            name="kelembapan"
                            class="form-control"
                            placeholder="Contoh: 75.5"
                            value="{{ old('kelembapan') }}"
                        >

                    </div>

                </div>


                <!-- BUTTON -->
                <div class="button-group">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        ✓ Simpan Data
                    </button>

                    <a
                        href="/dashboard-sensor"
                        class="btn btn-secondary"
                    >
                        ← Kembali ke Dashboard
                    </a>

                </div>

            </form>


            <!-- INFO -->
            <div class="info-box">
                <strong>INFO:</strong>
                Data yang disimpan akan masuk ke database dan
                dapat dilihat pada halaman Dashboard Sensor.
            </div>

        </div>

    </main>


    <!-- FOOTER -->
    <footer>
        AGUS RESEARCH • IoT & Smart Agriculture •
        <span id="year"></span>
    </footer>


    <script>
        document.getElementById("year").textContent =
            new Date().getFullYear();
    </script>

</body>
</html>

