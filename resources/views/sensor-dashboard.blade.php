<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Sensor | Agroteknologi 23</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        :root {

            --bg: #060b14;
            --bg-secondary: #0a1220;

            --card: rgba(15, 24, 39, 0.72);

            --border: rgba(255,255,255,0.09);

            --text: #f4f7fb;
            --text-soft: #91a0b5;

            --green: #43e58c;
            --green-dark: #1c9c5b;

            --cyan: #35d6ff;
            --purple: #9b7cff;

            --danger: #ff647c;

            --orange: #ffb86b;

            --display: 'Space Grotesk', sans-serif;
            --body: 'Inter', sans-serif;
            --mono: 'JetBrains Mono', monospace;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {

            font-family: var(--body);

            color: var(--text);

            min-height: 100vh;

            overflow-x: hidden;

            background:

                radial-gradient(
                    circle at 10% 10%,
                    rgba(67,229,140,0.08),
                    transparent 28%
                ),

                radial-gradient(
                    circle at 90% 20%,
                    rgba(53,214,255,0.08),
                    transparent 30%
                ),

                radial-gradient(
                    circle at 50% 100%,
                    rgba(155,124,255,0.07),
                    transparent 35%
                ),

                var(--bg);
        }

        body::before {

            content: "";

            position: fixed;

            inset: 0;

            background-image:

                linear-gradient(
                    rgba(255,255,255,0.025) 1px,
                    transparent 1px
                ),

                linear-gradient(
                    90deg,
                    rgba(255,255,255,0.025) 1px,
                    transparent 1px
                );

            background-size: 40px 40px;

            mask-image:
                linear-gradient(
                    to bottom,
                    black 0%,
                    rgba(0,0,0,0.5) 50%,
                    transparent 100%
                );

            pointer-events: none;

            z-index: -1;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        .container {

            width: min(
                1120px,
                calc(100% - 40px)
            );

            margin: auto;
        }

        .navbar {

            padding: 16px 0 8px;
        }

        .nav-inner {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 10px 16px;

            background:
                rgba(8,15,27,0.78);

            border:
                1px solid var(--border);

            border-radius: 18px;

            backdrop-filter: blur(18px);

            box-shadow:
                0 10px 40px rgba(0,0,0,0.25);

            transition: .3s ease;
        }

        .nav-inner:hover {

            border-color:
                rgba(67,229,140,0.20);

            box-shadow:
                0 15px 50px rgba(0,0,0,0.32);
        }

        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

            font-family: var(--display);

            font-weight: 700;

            font-size: 14px;
        }

        .brand-logo {

            width: 55px;

            height: 55px;

            object-fit: contain;

            border-radius: 12px;

            background:
                rgba(255,255,255,0.05);

            padding: 5px;

            border:
                1px solid
                rgba(67,229,140,0.20);

            box-shadow:
                0 0 25px
                rgba(67,229,140,0.15);

            transition: .3s ease;
        }

        .brand:hover .brand-logo {

            transform:
                scale(1.05);

            border-color:
                rgba(67,229,140,0.45);

            box-shadow:
                0 0 30px
                rgba(67,229,140,0.25);
        }

        .brand-text {

            line-height: 1.3;
        }

        .brand-text strong {

            display: block;

            color: var(--green);

            font-size: 14px;
        }

        .brand-text small {

            display: block;

            color: var(--text-soft);

            font-size: 10px;

            font-family: var(--mono);

            margin-top: 2px;
        }

        .nav-links {

            display: flex;

            align-items: center;

            gap: 5px;
        }

        .nav-links a {

            padding: 10px 14px;

            color: var(--text-soft);

            font-size: 13px;

            font-weight: 500;

            border-radius: 9px;

            transition: .25s ease;
        }

        .nav-links a:hover {

            color: white;

            background:
                rgba(255,255,255,0.06);
        }

        .nav-links a.active {

            color: var(--green);

            background:
                rgba(67,229,140,0.08);
        }

        .logout-form {

            display: inline;

            margin: 0;
        }

        .logout-button {

            padding: 10px 14px;

            border:
                1px solid
                rgba(255,100,124,0.20);

            border-radius: 9px;

            background:
                rgba(255,100,124,0.06);

            color:
                var(--danger);

            font-size: 13px;

            font-weight: 500;

            cursor: pointer;

            transition: .25s ease;
        }

        .logout-button:hover {

            color: white;

            background:
                var(--danger);

            border-color:
                var(--danger);

            box-shadow:
                0 0 20px
                rgba(255,100,124,0.20);
        }

        .hero {

            padding:
                45px 0 30px;
        }

        .hero-top {

            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            gap: 20px;
        }

        .hero-title {

            font-family:
                var(--display);

            font-size:
                clamp(32px, 5vw, 54px);

            line-height: 1.05;

            letter-spacing: -2px;
        }

        .hero-title span {

            background:

                linear-gradient(
                    90deg,
                    var(--green),
                    var(--cyan),
                    var(--purple)
                );

            -webkit-background-clip: text;

            background-clip: text;

            color: transparent;
        }

        .hero-description {

            margin-top: 12px;

            max-width: 650px;

            color:
                var(--text-soft);

            font-size: 13px;

            line-height: 1.8;
        }

        .system-status {

            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding:
                8px 15px;

            border:
                1px solid
                rgba(67,229,140,0.18);

            background:
                rgba(67,229,140,0.06);

            border-radius: 100px;

            color: var(--green);

            font-family: var(--mono);

            font-size: 11px;

            margin-bottom: 18px;
        }

        .status-dot {

            width: 7px;

            height: 7px;

            background:
                var(--green);

            border-radius: 50%;

            animation:
                pulse 2s infinite;
        }

        @keyframes pulse {

            0% {

                box-shadow:
                    0 0 0 0
                    rgba(67,229,140,0.5);
            }

            70% {

                box-shadow:
                    0 0 0 9px
                    rgba(67,229,140,0);
            }

            100% {

                box-shadow:
                    0 0 0 0
                    rgba(67,229,140,0);
            }
        }

        .clock-box {

            min-width: 180px;

            padding: 15px 18px;

            border:
                1px solid var(--border);

            border-radius: 15px;

            background:
                rgba(12,20,33,0.65);

            backdrop-filter:
                blur(15px);

            text-align: right;
        }

        .clock-label {

            color:
                var(--text-soft);

            font-size: 9px;

            font-family:
                var(--mono);

            text-transform:
                uppercase;

            letter-spacing: 1px;
        }

        .clock-value {

            margin-top: 5px;

            color:
                var(--green);

            font-family:
                var(--mono);

            font-size: 18px;
        }

        .stats-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 14px;

            margin-top: 30px;
        }

        .stat-card {

            position: relative;

            padding: 20px;

            overflow: hidden;

            border:
                1px solid var(--border);

            border-radius: 18px;

            background:
                rgba(15,24,39,0.65);

            backdrop-filter:
                blur(15px);

            transition: .3s ease;
        }

        .stat-card::before {

            content: "";

            position: absolute;

            width: 100px;

            height: 100px;

            top: -50px;

            right: -30px;

            border-radius: 50%;

            background:
                var(--green);

            opacity: .07;

            filter: blur(30px);
        }

        .stat-card:hover {

            transform:
                translateY(-4px);

            border-color:
                rgba(67,229,140,.25);

            box-shadow:
                0 15px 40px
                rgba(0,0,0,.25);
        }

        .stat-label {

            color:
                var(--text-soft);

            font-family:
                var(--mono);

            font-size: 9px;

            text-transform:
                uppercase;

            letter-spacing: 1px;
        }

        .stat-value {

            margin-top: 10px;

            font-family:
                var(--display);

            font-size: 30px;

            font-weight: 700;
        }

        .stat-unit {

            font-family:
                var(--mono);

            font-size: 11px;

            color:
                var(--text-soft);
        }

        .stat-icon {

            margin-top: 8px;

            font-size: 11px;

            color:
                var(--green);

            font-family:
                var(--mono);
        }

        .content-grid {

            display: grid;

            grid-template-columns:
                1.55fr .8fr;

            gap: 15px;

            margin-top: 18px;
        }

        .panel {

            border:
                1px solid var(--border);

            border-radius: 20px;

            background:
                rgba(15,24,39,0.65);

            backdrop-filter:
                blur(18px);

            overflow: hidden;

            box-shadow:
                0 20px 60px
                rgba(0,0,0,.20);
        }

        .panel-header {

            display: flex;

            justify-content:
                space-between;

            align-items: center;

            padding:
                19px 21px;

            border-bottom:
                1px solid var(--border);
        }

        .panel-title {

            font-family:
                var(--display);

            font-size: 17px;

            font-weight: 600;
        }

        .panel-subtitle {

            margin-top: 3px;

            color:
                var(--text-soft);

            font-size: 10px;
        }

        .chart-wrapper {

            height: 350px;

            padding: 20px;
        }

        #sensorChart {

            width: 100% !important;

            height: 100% !important;
        }

        .table-wrapper {

            overflow-x: auto;
        }

        table {

            width: 100%;

            border-collapse:
                collapse;

            min-width: 700px;
        }

        th {

            padding:
                13px 16px;

            text-align: left;

            color:
                var(--text-soft);

            font-family:
                var(--mono);

            font-size: 9px;

            text-transform:
                uppercase;

            letter-spacing:
                .8px;

            border-bottom:
                1px solid var(--border);
        }

        td {

            padding:
                14px 16px;

            border-bottom:
                1px solid
                rgba(255,255,255,.045);

            color:
                #dfe7f2;

            font-size: 12px;
        }

        tr {

            transition: .2s ease;
        }

        tbody tr:hover {

            background:
                rgba(67,229,140,.035);
        }

        .device {

            color:
                var(--green);

            font-family:
                var(--mono);

            font-size: 11px;
        }

        .temperature {

            color:
                var(--orange);

            font-family:
                var(--mono);

            font-weight: 600;
        }

        .humidity {

            color:
                var(--cyan);

            font-family:
                var(--mono);

            font-weight: 600;
        }

        .distance {

            color:
                var(--purple);

            font-family:
                var(--mono);

            font-weight: 600;
        }

        .date {

            color:
                var(--text-soft);

            font-family:
                var(--mono);

            font-size: 10px;
        }

        .add-button {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding:
                9px 13px;

            border:
                1px solid
                rgba(67,229,140,.20);

            border-radius: 9px;

            background:
                rgba(67,229,140,.07);

            color:
                var(--green);

            font-size: 11px;

            font-weight: 600;

            transition: .25s ease;
        }

        .add-button:hover {

            background:
                var(--green);

            color:
                #06110b;

            box-shadow:
                0 0 20px
                rgba(67,229,140,.20);
        }

        .info-list {

            padding:
                5px 0;
        }

        .info-item {

            display: flex;

            justify-content:
                space-between;

            align-items: center;

            gap: 15px;

            padding:
                16px 20px;

            border-bottom:
                1px solid
                rgba(255,255,255,.045);
        }

        .info-item:last-child {

            border-bottom: none;
        }

        .info-item-label {

            color:
                var(--text-soft);

            font-size: 10px;

            font-family:
                var(--mono);
        }

        .info-item-value {

            color:
                white;

            font-size: 12px;

            font-weight: 600;

            text-align: right;
        }

        .online {

            color:
                var(--green);
        }

        .legend {

            display: flex;

            gap: 15px;

            padding:
                0 20px 18px;

            flex-wrap: wrap;
        }

        .legend-item {

            display: flex;

            align-items: center;

            gap: 7px;

            color:
                var(--text-soft);

            font-size: 10px;

            font-family:
                var(--mono);
        }

        .legend-dot {

            width: 8px;

            height: 8px;

            border-radius: 50%;
        }

        .legend-temperature {

            background:
                var(--orange);
        }

        .legend-humidity {

            background:
                var(--cyan);
        }

        .legend-distance {

            background:
                var(--purple);
        }

        .empty {

            text-align: center;

            padding: 40px 20px;

            color:
                var(--text-soft);

            font-family:
                var(--mono);

            font-size: 11px;
        }

        footer {

            margin-top: 50px;

            border-top:
                1px solid var(--border);

            padding:
                25px 0 35px;

            color:
                var(--text-soft);

            font-family:
                var(--mono);

            font-size: 10px;

            text-align: center;
        }

        footer span {

            color:
                var(--green);
        }

        .fade {

            opacity: 0;

            transform:
                translateY(20px);

            animation:
                fadeUp .7s ease forwards;
        }

        .delay-1 {
            animation-delay: .1s;
        }

        .delay-2 {
            animation-delay: .2s;
        }

        .delay-3 {
            animation-delay: .3s;
        }

        @keyframes fadeUp {

            to {

                opacity: 1;

                transform:
                    translateY(0);
            }
        }

        @media (max-width: 950px) {

            .stats-grid {

                grid-template-columns:
                    repeat(2, 1fr);
            }

            .content-grid {

                grid-template-columns:
                    1fr;
            }

        }

        @media (max-width: 650px) {

            .container {

                width:
                    min(
                        calc(100% - 24px),
                        1120px
                    );
            }

            .navbar {

                padding-top: 10px;

                padding-bottom: 5px;
            }

            .nav-inner {

                flex-direction:
                    column;

                gap: 12px;

                padding: 12px;
            }

            .brand {

                width: 100%;

                justify-content:
                    center;
            }

            .nav-links {

                width: 100%;

                justify-content:
                    center;

                flex-wrap: wrap;
            }

            .nav-links a {

                font-size: 12px;

                padding:
                    8px 10px;
            }

            .logout-button {

                font-size: 12px;

                padding:
                    8px 11px;
            }

            .hero {

                padding:
                    30px 0 25px;
            }

            .hero-top {

                display: block;
            }

            .hero-title {

                font-size:
                    clamp(
                        34px,
                        11vw,
                        48px
                    );

                letter-spacing:
                    -1px;
            }

            .hero-description {

                font-size: 12px;
            }

            .clock-box {

                margin-top: 20px;

                text-align: left;

                width: 100%;
            }

            .stats-grid {

                grid-template-columns:
                    1fr 1fr;

                gap: 10px;
            }

            .stat-card {

                padding: 16px;
            }

            .stat-value {

                font-size: 24px;
            }

            .panel-header {

                padding:
                    16px;
            }

            .chart-wrapper {

                height: 300px;

                padding: 12px;
            }

            .legend {

                padding:
                    0 15px 15px;
            }

        }

        @media (max-width: 400px) {

            .stats-grid {

                grid-template-columns:
                    1fr;
            }

        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {

                animation: none !important;

                transition: none !important;
            }
        }

    </style>

</head>


<body>


<header class="navbar">

    <div class="container">

        <div class="nav-inner">

            <a href="/" class="brand">

                <img
                    src="{{ asset('images/logo.jpeg') }}"
                    alt="Logo Agroteknologi"
                    class="brand-logo"
                >

                <div class="brand-text">

                    <strong>
                        AGROTEKNOLOGI 23
                    </strong>

                    <small>
                        SISTEM MONITORING
                    </small>

                </div>

            </a>

            <nav class="nav-links">

                <a href="/">
                    Home
                </a>

                <a
                    href="/dashboard-sensor"
                    class="active"
                >
                    Halaman Sensor
                </a>

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="logout-form"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-button"
                    >
                        Logout
                    </button>

                </form>

            </nav>

        </div>

    </div>

</header>


<main>

    <section class="hero">

        <div class="container">

            <div class="hero-top">

                <div>

                    <div class="system-status">

                        <span class="status-dot"></span>

                        Sistem Sensor Aktif

                    </div>

                    <h1 class="hero-title fade">

                        Dashboard

                        <span>
                            Sensor
                        </span>

                    </h1>

                    <p class="hero-description fade delay-1">

                        Monitoring data sensor secara
                        terstruktur untuk mendukung
                        kegiatan penelitian bidang
                        agroteknologi.

                    </p>

                </div>

                <div class="clock-box fade delay-2">

                    <div class="clock-label">
                        Waktu Sistem
                    </div>

                    <div
                        class="clock-value"
                        id="clock"
                    >
                        --:--:--
                    </div>

                </div>

            </div>

            <div class="stats-grid fade delay-2">

                <div class="stat-card">

                    <div class="stat-label">
                        Total Database
                    </div>

                    <div
                        class="stat-value"
                        id="totalData"
                    >
                        {{ $semuaData->count() }}
                    </div>

                    <div class="stat-icon">
                        ● DATABASE
                    </div>

                </div>

                <div class="stat-card">

                    <div class="stat-label">
                        Suhu Terakhir
                    </div>

                    <div class="stat-value">

                        <span id="latestSuhu">
                            {{ $semuaData->first()->suhu ?? '--' }}
                        </span>

                        <span class="stat-unit">
                            °C
                        </span>

                    </div>

                    <div class="stat-icon">
                        ● TEMPERATURE
                    </div>

                </div>

                <div class="stat-card">

                    <div class="stat-label">
                        Kelembapan
                    </div>

                    <div class="stat-value">

                        <span id="latestHumidity">
                            {{ $semuaData->first()->kelembapan ?? '--' }}
                        </span>

                        <span class="stat-unit">
                            %
                        </span>

                    </div>

                    <div class="stat-icon">
                        ● HUMIDITY
                    </div>

                </div>

                <div class="stat-card">

                    <div class="stat-label">
                        Jarak Terakhir
                    </div>

                    <div class="stat-value">

                        <span id="latestJarak">
                            {{ $semuaData->first()->jarak ?? '--' }}
                        </span>

                        <span class="stat-unit">
                            cm
                        </span>

                    </div>

                    <div class="stat-icon">
                        ● DISTANCE
                    </div>

                </div>

            </div>

        </div>

    </section>


    <section>

        <div class="container">

            <div class="content-grid">

                <div class="panel fade delay-2">

                    <div class="panel-header">

                        <div>

                            <div class="panel-title">
                                Grafik Sensor
                            </div>

                            <div class="panel-subtitle">
                                Data 20 pembacaan sensor terbaru
                            </div>

                        </div>

                    </div>

                    <div class="chart-wrapper">

                        <canvas id="sensorChart"></canvas>

                    </div>

                    <div class="legend">

                        <div class="legend-item">

                            <span
                                class="legend-dot legend-temperature"
                            ></span>

                            Suhu

                        </div>

                        <div class="legend-item">

                            <span
                                class="legend-dot legend-humidity"
                            ></span>

                            Kelembapan

                        </div>

                        <div class="legend-item">

                            <span
                                class="legend-dot legend-distance"
                            ></span>

                            Jarak

                        </div>

                    </div>

                </div>

                <div class="panel fade delay-3">

                    <div class="panel-header">

                        <div>

                            <div class="panel-title">
                                Informasi Sistem
                            </div>

                            <div class="panel-subtitle">
                                Status monitoring
                            </div>

                        </div>

                    </div>

                    <div class="info-list">

                        <div class="info-item">

                            <div class="info-item-label">
                                Status
                            </div>

                            <div
                                class="info-item-value online"
                            >
                                ● Online
                            </div>

                        </div>

                        <div class="info-item">

                            <div class="info-item-label">
                                Platform
                            </div>

                            <div class="info-item-value">
                                Laravel
                            </div>

                        </div>

                        <div class="info-item">

                            <div class="info-item-label">
                                Database
                            </div>

                            <div class="info-item-value">
                                MySQL
                            </div>

                        </div>

                        <div class="info-item">

                            <div class="info-item-label">
                                Update
                            </div>

                            <div class="info-item-value">
                                2 Detik
                            </div>

                        </div>

                        <div class="info-item">

                            <div class="info-item-label">
                                Sensor
                            </div>

                            <div class="info-item-value">
                                DHT22 + Ultrasonik
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div
                class="panel fade delay-3"
                style="margin-top:15px;"
            >

                <div class="panel-header">

                    <div>

                        <div class="panel-title">
                            Data Sensor
                        </div>

                        <div class="panel-subtitle">
                            Riwayat data hasil monitoring
                        </div>

                    </div>

                    <a
                        href="/sensor/tambah"
                        class="add-button"
                    >
                        + Tambah Data
                    </a>

                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Device ID
                                </th>

                                <th>
                                    Suhu
                                </th>

                                <th>
                                    Kelembapan
                                </th>

                                <th>
                                    Jarak
                                </th>

                                <th>
                                    Waktu
                                </th>

                            </tr>

                        </thead>

                        <tbody id="sensorTableBody">

                            @forelse($semuaData as $index => $item)

                                <tr>

                                    <td>
                                        {{ $index + 1 }}
                                    </td>

                                    <td class="device">
                                        {{ $item->device_id }}
                                    </td>

                                    <td class="temperature">
                                        {{ $item->suhu ?? '--' }} °C
                                    </td>

                                    <td class="humidity">
                                        {{ $item->kelembapan ?? '--' }} %
                                    </td>

                                    <td class="distance">
                                        {{ $item->jarak ?? '--' }} cm
                                    </td>

                                    <td class="date">
                                        {{ $item->created_at }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        class="empty"
                                    >
                                        Belum ada data sensor.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>

</main>


<footer>

    <div class="container">

        AGUS DWI CAHYO

        •

        <span>
            SISTEM MONITORING PERTANIAN
        </span>

        •

        <span id="year"></span>

    </div>

</footer>


<script>


    function updateClock() {

        const clock =
            document.getElementById("clock");

        if (!clock) return;

        const now =
            new Date();

        const hours =
            String(
                now.getHours()
            ).padStart(2, "0");

        const minutes =
            String(
                now.getMinutes()
            ).padStart(2, "0");

        const seconds =
            String(
                now.getSeconds()
            ).padStart(2, "0");

        clock.textContent =
            `${hours}:${minutes}:${seconds}`;

    }

    updateClock();

    setInterval(
        updateClock,
        1000
    );


    const yearElement =
        document.getElementById("year");

    if (yearElement) {

        yearElement.textContent =
            new Date().getFullYear();

    }


    const ctx =
        document
            .getElementById("sensorChart")
            .getContext("2d");


    const sensorChart =
        new Chart(ctx, {

            type: "line",

            data: {

                labels: [],

                datasets: [

                    {

                        label: "Suhu",

                        data: [],

                        borderColor:
                            "#ffb86b",

                        backgroundColor:
                            "rgba(255,184,107,0.10)",

                        borderWidth: 2,

                        pointRadius: 3,

                        pointHoverRadius: 5,

                        tension: 0.4,

                        fill: true,

                        yAxisID: "y"

                    },

                    {

                        label: "Kelembapan",

                        data: [],

                        borderColor:
                            "#35d6ff",

                        backgroundColor:
                            "rgba(53,214,255,0.08)",

                        borderWidth: 2,

                        pointRadius: 3,

                        pointHoverRadius: 5,

                        tension: 0.4,

                        fill: true,

                        yAxisID: "y1"

                    },

                    {

                        label: "Jarak",

                        data: [],

                        borderColor:
                            "#9b7cff",

                        backgroundColor:
                            "rgba(155,124,255,0.08)",

                        borderWidth: 2,

                        pointRadius: 3,

                        pointHoverRadius: 5,

                        tension: 0.4,

                        fill: true,

                        yAxisID: "y2"

                    }

                ]

            },


            options: {

                responsive: true,

                maintainAspectRatio: false,

                interaction: {

                    mode: "index",

                    intersect: false

                },

                plugins: {

                    legend: {

                        display: false

                    },

                    tooltip: {

                        backgroundColor:
                            "#0a1220",

                        borderColor:
                            "rgba(67,229,140,.20)",

                        borderWidth: 1,

                        titleColor:
                            "#43e58c",

                        bodyColor:
                            "#f4f7fb",

                        padding: 12

                    }

                },


                scales: {

                    x: {

                        ticks: {

                            color:
                                "#91a0b5",

                            font: {

                                family:
                                    "JetBrains Mono",

                                size: 9

                            }

                        },

                        grid: {

                            color:
                                "rgba(255,255,255,.045)"

                        }

                    },


                    y: {

                        position: "left",

                        beginAtZero: false,

                        ticks: {

                            color:
                                "#ffb86b",

                            font: {

                                family:
                                    "JetBrains Mono",

                                size: 9

                            }

                        },

                        grid: {

                            color:
                                "rgba(255,255,255,.045)"

                        },

                        title: {

                            display: true,

                            text: "Suhu °C",

                            color:
                                "#ffb86b"

                        }

                    },


                    y1: {

                        position: "right",

                        beginAtZero: false,

                        grid: {

                            drawOnChartArea: false

                        },

                        ticks: {

                            color:
                                "#35d6ff",

                            font: {

                                family:
                                    "JetBrains Mono",

                                size: 9

                            }

                        },

                        title: {

                            display: true,

                            text: "Kelembapan %",

                            color:
                                "#35d6ff"

                        }

                    },


                    y2: {

                        display: false,

                        position: "right",

                        beginAtZero: false,

                        grid: {

                            drawOnChartArea: false

                        }

                    }

                }

            }

        });


    function escapeHtml(value) {

        return String(value ?? "")
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");

    }


    async function loadSensorData() {

        try {

            const response =
                await fetch(
                    "/sensor/grafik",
                    {
                        cache: "no-store"
                    }
                );

            if (!response.ok) {

                throw new Error(
                    "Gagal mengambil data sensor"
                );

            }


            const responseData =
                await response.json();


            const data =
                responseData.data || [];


            const total =
                responseData.total ??
                data.length;


            const totalElement =
                document.getElementById(
                    "totalData"
                );

            if (totalElement) {

                totalElement.textContent =
                    total;

            }


            if (data.length > 0) {

                const latest =
                    data[data.length - 1];


                const suhuElement =
                    document.getElementById(
                        "latestSuhu"
                    );

                const humidityElement =
                    document.getElementById(
                        "latestHumidity"
                    );

                const jarakElement =
                    document.getElementById(
                        "latestJarak"
                    );


                if (suhuElement) {

                    suhuElement.textContent =
                        latest.suhu ?? "--";

                }


                if (humidityElement) {

                    humidityElement.textContent =
                        latest.kelembapan ?? "--";

                }


                if (jarakElement) {

                    jarakElement.textContent =
                        latest.jarak ?? "--";

                }

            }


            const labels = [];

            const suhuData = [];

            const humidityData = [];

            const jarakData = [];


            data.forEach(item => {

                let dateString =
                    item.created_at
                        ? item.created_at.replace(
                            " ",
                            "T"
                        )
                        : null;


                const date =
                    dateString
                        ? new Date(dateString)
                        : null;


                if (
                    date &&
                    !isNaN(date.getTime())
                ) {

                    labels.push(

                        date.toLocaleTimeString(
                            "id-ID",
                            {
                                hour: "2-digit",
                                minute: "2-digit",
                                second: "2-digit"
                            }
                        )

                    );

                } else {

                    labels.push("--");

                }


                suhuData.push(
                    item.suhu !== null &&
                    item.suhu !== undefined
                        ? Number(item.suhu)
                        : null
                );


                humidityData.push(
                    item.kelembapan !== null &&
                    item.kelembapan !== undefined
                        ? Number(item.kelembapan)
                        : null
                );


                jarakData.push(
                    item.jarak !== null &&
                    item.jarak !== undefined
                        ? Number(item.jarak)
                        : null
                );

            });


            sensorChart.data.labels =
                labels;

            sensorChart.data.datasets[0].data =
                suhuData;

            sensorChart.data.datasets[1].data =
                humidityData;

            sensorChart.data.datasets[2].data =
                jarakData;


            sensorChart.update();


            const tableBody =
                document.getElementById(
                    "sensorTableBody"
                );


            if (tableBody) {

                const latestFirst =
                    [...data].reverse();


                if (latestFirst.length === 0) {

                    tableBody.innerHTML = `

                        <tr>

                            <td
                                colspan="6"
                                class="empty"
                            >
                                Belum ada data sensor.
                            </td>

                        </tr>

                    `;

                } else {

                    tableBody.innerHTML =
                        latestFirst
                            .map(
                                (item, index) => {

                                    let dateString =
                                        item.created_at
                                            ? item.created_at.replace(
                                                " ",
                                                "T"
                                            )
                                            : null;


                                    const date =
                                        dateString
                                            ? new Date(
                                                dateString
                                            )
                                            : null;


                                    let formattedDate =
                                        "--";


                                    if (
                                        date &&
                                        !isNaN(
                                            date.getTime()
                                        )
                                    ) {

                                        formattedDate =
                                            date.toLocaleString(
                                                "id-ID"
                                            );

                                    }


                                    return `

                                        <tr>

                                            <td>
                                                ${index + 1}
                                            </td>

                                            <td class="device">
                                                ${escapeHtml(
                                                    item.device_id
                                                )}
                                            </td>

                                            <td class="temperature">
                                                ${
                                                    item.suhu ??
                                                    "--"
                                                } °C
                                            </td>

                                            <td class="humidity">
                                                ${
                                                    item.kelembapan ??
                                                    "--"
                                                } %
                                            </td>

                                            <td class="distance">
                                                ${
                                                    item.jarak ??
                                                    "--"
                                                } cm
                                            </td>

                                            <td class="date">
                                                ${formattedDate}
                                            </td>

                                        </tr>

                                    `;

                                }
                            )
                            .join("");

                }

            }


            const statusElement =
                document.getElementById(
                    "systemStatus"
                );

            if (statusElement) {

                statusElement.textContent =
                    "ONLINE";

                statusElement.style.color =
                    "var(--green)";

            }

        } catch (error) {

            console.error(
                "Sensor error:",
                error
            );


            const statusElement =
                document.getElementById(
                    "systemStatus"
                );

            if (statusElement) {

                statusElement.textContent =
                    "OFFLINE";

                statusElement.style.color =
                    "var(--danger)";

            }

        }

    }


    loadSensorData();


    setInterval(
        loadSensorData,
        2000
    );


</script>


</body>

</html>