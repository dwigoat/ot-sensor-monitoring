<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agroteknologi 23 | Sistem Monitoring Pertanian</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        /* =====================================================
           ROOT
        ===================================================== */

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

            --display: 'Space Grotesk', sans-serif;
            --body: 'Inter', sans-serif;
            --mono: 'JetBrains Mono', monospace;
        }


        /* =====================================================
           RESET
        ===================================================== */

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


        /* =====================================================
           GRID BACKGROUND
        ===================================================== */

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


        /* =====================================================
           GENERAL
        ===================================================== */

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


        /* =====================================================
           NAVBAR
        ===================================================== */

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


        /* =====================================================
           LOGO
        ===================================================== */

        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

            font-family: var(--display);

            font-weight: 700;

            font-size: 14px;
        }


        /*
        ========================================================
        LOGO DIBUAT BESAR
        ========================================================

        Untuk mengganti logo:

        public/images/logo.png

        Kemudian bagian HTML di bawah
        tinggal menggunakan gambar tersebut.
        */

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


        /* =====================================================
           NAV LINKS
        ===================================================== */

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


        /* =====================================================
           LOGOUT
        ===================================================== */

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


        /* =====================================================
           HERO
        ===================================================== */

        .hero {

            padding:
                45px 0 35px;

            text-align: center;
        }


        /* =====================================================
           STATUS
        ===================================================== */

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

            margin-bottom: 22px;
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


        /* =====================================================
           HERO TITLE
        ===================================================== */

        .hero h1 {

            font-family:
                var(--display);

            font-size:
                clamp(38px, 6vw, 70px);

            line-height: 1.05;

            letter-spacing: -2px;

            margin-bottom: 18px;
        }

        .hero h1 span {

            display: block;

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

        .hero p {

            max-width: 650px;

            margin: auto;

            color:
                var(--text-soft);

            line-height: 1.8;

            font-size: 15px;
        }


        /* =====================================================
           LIVE INFORMATION
        ===================================================== */

        .live-bar {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            margin-top: 38px;

            border:
                1px solid var(--border);

            background:
                rgba(12,20,33,0.65);

            backdrop-filter:
                blur(15px);

            border-radius: 18px;

            overflow: hidden;
        }

        .live-item {

            padding:
                19px 22px;

            border-right:
                1px solid var(--border);

            transition: .3s ease;
        }

        .live-item:hover {

            background:
                rgba(67,229,140,0.035);
        }

        .live-item:last-child {

            border-right: none;
        }

        .live-label {

            font-size: 10px;

            text-transform: uppercase;

            color:
                var(--text-soft);

            font-family:
                var(--mono);

            letter-spacing: 1px;
        }

        .live-value {

            margin-top: 7px;

            font-family:
                var(--mono);

            font-size: 17px;

            color: white;
        }

        .live-value.green {

            color:
                var(--green);
        }


        /* =====================================================
           PROFILE
        ===================================================== */

        .profile-section {

            padding:
                25px 0 45px;
        }

        .profile-card {

            position: relative;

            display: grid;

            grid-template-columns:
                290px 1fr;

            overflow: hidden;

            border:
                1px solid var(--border);

            border-radius: 24px;

            background:

                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.055),
                    rgba(255,255,255,0.018)
                );

            backdrop-filter:
                blur(20px);

            box-shadow:
                0 30px 100px
                rgba(0,0,0,0.35);
        }

        .profile-card::before {

            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            top: -150px;
            right: -100px;

            background:
                var(--cyan);

            opacity: .07;

            filter:
                blur(80px);

            pointer-events: none;
        }


        /* =====================================================
           PROFILE LEFT
        ===================================================== */

        .profile-left {

            padding:
                45px 30px;

            display: flex;

            flex-direction: column;

            align-items: center;

            text-align: center;

            background:

                linear-gradient(
                    180deg,
                    rgba(67,229,140,0.045),
                    transparent
                );

            border-right:
                1px solid var(--border);
        }


        /* =====================================================
           PROFILE PHOTO
        ===================================================== */

        .photo-wrapper {

            position: relative;

            width: 150px;
            height: 150px;

            margin-bottom: 20px;
        }

        .photo-wrapper::before {

            content: "";

            position: absolute;

            inset: -7px;

            border-radius: 50%;

            background:

                conic-gradient(
                    var(--green),
                    var(--cyan),
                    var(--purple),
                    var(--green)
                );

            animation:
                rotate 5s linear infinite;
        }

        .photo-wrapper::after {

            content: "";

            position: absolute;

            inset: -2px;

            background:
                var(--bg-secondary);

            border-radius: 50%;
        }


        @keyframes rotate {

            to {
                transform:
                    rotate(360deg);
            }
        }

        .profile-photo {

            position: relative;

            z-index: 2;

            width: 150px;
            height: 150px;

            object-fit: cover;

            border-radius: 50%;

            border:
                5px solid #0b1422;
        }


        /* =====================================================
           RESEARCHER STATUS
        ===================================================== */

        .researcher-status {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding:
                7px 13px;

            border-radius: 100px;

            background:
                rgba(67,229,140,0.08);

            color:
                var(--green);

            border:
                1px solid
                rgba(67,229,140,0.16);

            font-family:
                var(--mono);

            font-size: 10px;

            text-transform:
                uppercase;

            letter-spacing:
                .5px;
        }

        .profile-left h3 {

            margin-top: 18px;

            font-family:
                var(--display);

            font-size: 21px;
        }

        .profile-left .role {

            margin-top: 5px;

            color:
                var(--text-soft);

            font-size: 12px;
        }


        /* =====================================================
           PROFILE RIGHT
        ===================================================== */

        .profile-right {

            padding: 45px;
        }

        .section-tag {

            color:
                var(--green);

            font-family:
                var(--mono);

            font-size: 10px;

            letter-spacing: 1.5px;

            text-transform:
                uppercase;

            margin-bottom: 10px;
        }

        .profile-name {

            font-family:
                var(--display);

            font-size:
                clamp(28px, 4vw, 42px);

            letter-spacing:
                -1px;
        }

        .nim {

            margin-top: 6px;

            font-family:
                var(--mono);

            font-size: 12px;

            color:
                var(--text-soft);
        }


        /* =====================================================
           INFORMATION GRID
        ===================================================== */

        .info-grid {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;

            margin-top: 28px;
        }

        .info-card {

            padding: 16px;

            border:
                1px solid var(--border);

            background:
                rgba(255,255,255,0.025);

            border-radius: 13px;

            transition: .3s ease;
        }

        .info-card:hover {

            transform:
                translateY(-3px);

            border-color:
                rgba(67,229,140,0.3);

            background:
                rgba(67,229,140,0.04);
        }

        .info-title {

            color:
                var(--text-soft);

            font-size: 10px;

            text-transform:
                uppercase;

            font-family:
                var(--mono);

            letter-spacing:
                .8px;

            margin-bottom: 7px;
        }

        .info-value {

            font-size: 14px;

            font-weight: 600;

            color: white;
        }


        /* =====================================================
           TERMINAL
        ===================================================== */

        .terminal {

            margin-top: 25px;

            overflow: hidden;

            border-radius: 15px;

            border:
                1px solid
                rgba(67,229,140,0.14);

            background:
                #050a11;

            box-shadow:
                inset 0 0 40px
                rgba(0,0,0,.3);
        }

        .terminal-head {

            display: flex;

            align-items: center;

            gap: 7px;

            padding:
                11px 15px;

            border-bottom:
                1px solid
                rgba(255,255,255,.06);

            background:
                rgba(255,255,255,.025);
        }

        .terminal-dot {

            width: 8px;
            height: 8px;

            border-radius: 50%;

            background:
                var(--text-soft);
        }

        .terminal-title {

            margin-left: 5px;

            color:
                var(--text-soft);

            font-family:
                var(--mono);

            font-size: 10px;
        }

        .terminal-body {

            padding: 18px;

            font-family:
                var(--mono);

            font-size: 12px;

            line-height: 1.8;
        }

        .terminal-command {

            color:
                var(--text-soft);

            margin-bottom: 7px;
        }

        .terminal-command span {

            color:
                var(--green);
        }

        .terminal-output {

            color:
                #d5ffe3;
        }

        .cursor {

            display: inline-block;

            width: 7px;
            height: 14px;

            margin-left: 3px;

            vertical-align: -2px;

            background:
                var(--green);

            animation:
                blink .8s infinite;
        }

        @keyframes blink {

            50% {
                opacity: 0;
            }
        }


        /* =====================================================
           RESEARCH AREA
        ===================================================== */

        .research-section {

            padding:
                0 0 55px;
        }

        .research-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 15px;
        }

        .research-card {

            position: relative;

            padding: 24px;

            border:
                1px solid var(--border);

            border-radius: 18px;

            background:
                rgba(15,24,39,0.65);

            overflow: hidden;

            transition: .3s ease;
        }

        .research-card:hover {

            transform:
                translateY(-5px);

            border-color:
                rgba(67,229,140,.25);

            box-shadow:
                0 15px 40px
                rgba(0,0,0,.25);
        }

        .research-number {

            font-family:
                var(--mono);

            font-size: 11px;

            color:
                var(--green);

            margin-bottom: 18px;
        }

        .research-card h3 {

            font-family:
                var(--display);

            font-size: 18px;

            margin-bottom: 9px;
        }

        .research-card p {

            color:
                var(--text-soft);

            font-size: 12px;

            line-height: 1.8;
        }


        /* =====================================================
           ABOUT
        ===================================================== */

        .about {

            padding:
                0 0 70px;
        }

        .about-card {

            padding: 28px;

            border-radius: 18px;

            border:
                1px solid var(--border);

            background:
                rgba(255,255,255,.025);
        }

        .about-card h2 {

            font-family:
                var(--display);

            font-size: 20px;

            margin-bottom: 10px;
        }

        .about-card p {

            max-width: 850px;

            color:
                var(--text-soft);

            font-size: 13px;

            line-height: 1.9;
        }

        .about-card strong {

            color:
                var(--green);
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        footer {

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


        /* =====================================================
           ANIMATION
        ===================================================== */

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


        /* =====================================================
           RESPONSIVE TABLET
        ===================================================== */

        @media (max-width: 850px) {

            .profile-card {

                grid-template-columns:
                    1fr;
            }

            .profile-left {

                border-right: none;

                border-bottom:
                    1px solid var(--border);
            }

            .research-grid {

                grid-template-columns:
                    1fr 1fr;
            }

        }


        /* =====================================================
           RESPONSIVE MOBILE
        ===================================================== */

        @media (max-width: 650px) {

            .container {

                width:
                    min(
                        calc(100% - 24px),
                        1120px
                    );
            }


            /* NAVBAR */

            .navbar {

                padding-top: 10px;

                padding-bottom: 5px;
            }

            .nav-inner {

                flex-direction:
                    column;

                gap: 12px;

                padding:
                    12px;
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


            /* HERO */

            .hero {

                padding:
                    30px 0 30px;
            }

            .hero h1 {

                letter-spacing:
                    -1px;

                font-size:
                    clamp(
                        34px,
                        11vw,
                        48px
                    );
            }

            .hero p {

                font-size: 13px;
            }


            /* LIVE */

            .live-bar {

                grid-template-columns:
                    1fr;
            }

            .live-item {

                border-right:
                    none;

                border-bottom:
                    1px solid var(--border);
            }

            .live-item:last-child {

                border-bottom:
                    none;
            }

            .live-value {

                font-size: 14px;
            }


            /* PROFILE */

            .profile-right {

                padding:
                    28px 22px;
            }

            .info-grid {

                grid-template-columns:
                    1fr;
            }


            /* RESEARCH */

            .research-grid {

                grid-template-columns:
                    1fr;
            }

        }


        /* =====================================================
           REDUCED MOTION
        ===================================================== */

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


<!-- =====================================================
     NAVBAR
===================================================== -->

<header class="navbar">

    <div class="container">

        <div class="nav-inner">


            <!-- =================================================
                 LOGO
            ================================================== -->

            <a
                href="/"
                class="brand"
            >

                <!--
                    GANTI LOGO DI SINI

                    Simpan logo kamu di:

                    public/images/logo.png

                    Kalau nama file berbeda,
                    tinggal ubah bagian src.
                -->

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


            <!-- =================================================
                 NAVIGATION
            ================================================== -->

            <nav class="nav-links">

                <a
                    href="/"
                    class="active"
                >
                    Home
                </a>


                <a
                    href="/dashboard-sensor"
                >
                    Halaman Sensor
                </a>


                <!-- LOGOUT -->

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



<!-- =====================================================
     HERO
===================================================== -->

<section class="hero">

    <div class="container">


        <!-- SYSTEM STATUS -->

        <div class="system-status">

            <span class="status-dot"></span>

            Sistem Aktif

        </div>


        <!-- TITLE -->

        <h1 class="fade">

            DWI GOAT

            <span>
                AGROTEKNOLOGI 23
            </span>

        </h1>


        <!-- DESCRIPTION -->

        <p class="fade delay-1">

            Website sederhana untuk menampilkan
            informasi dan data hasil monitoring
            dalam kegiatan penelitian bidang
            agroteknologi.

        </p>



        <!-- =================================================
             LIVE INFORMATION
        ================================================== -->

        <div class="live-bar fade delay-2">


            <!-- SYSTEM -->

            <div class="live-item">

                <div class="live-label">
                    Status Sistem
                </div>

                <div class="live-value green">

                    ● Aktif

                </div>

            </div>


            <!-- SERVER -->

            <div class="live-item">

                <div class="live-label">
                    Platform
                </div>

                <div class="live-value">

                    Laravel

                </div>

            </div>


            <!-- TIME -->

            <div class="live-item">

                <div class="live-label">
                    Waktu
                </div>

                <div
                    class="live-value"
                    id="clock"
                >
                    --:--:--
                </div>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     PROFILE
===================================================== -->

<section class="profile-section">

    <div class="container">


        <div class="profile-card fade delay-2">


            <!-- =================================================
                 PROFILE LEFT
            ================================================== -->

            <div class="profile-left">


                <!-- FOTO -->

                <div class="photo-wrapper">

                    <img
                        src="{{ asset('images/profil.jpeg') }}"
                        alt="Foto Profil Agus Dwi Cahyo"
                        class="profile-photo"
                    >

                </div>


                <!-- STATUS -->

                <div class="researcher-status">

                    <span class="status-dot"></span>

                    ACTIVE

                </div>


                <h3>

                    Agus Dwi Cahyo

                </h3>


                <div class="role">

                    Mahasiswa Agroteknologi

                </div>

            </div>



            <!-- =================================================
                 PROFILE RIGHT
            ================================================== -->

            <div class="profile-right">


                <div class="section-tag">

                    // profile

                </div>


                <h2 class="profile-name">

                    Agus Dwi Cahyo

                </h2>


                <div class="nim">

                    NIM : 0393282832

                </div>



                <!-- =================================================
                     INFORMATION
                ================================================== -->

                <div class="info-grid">


                    <!-- PROGRAM STUDI -->

                    <div class="info-card">

                        <div class="info-title">

                            Program Studi

                        </div>

                        <div class="info-value">

                            Agroteknologi

                        </div>

                    </div>


                    <!-- FAKULTAS -->

                    <div class="info-card">

                        <div class="info-title">

                            Fakultas

                        </div>

                        <div class="info-value">

                            Sains Terapan

                        </div>

                    </div>


                    <!-- UNIVERSITAS -->

                    <div class="info-card">

                        <div class="info-title">

                            Universitas

                        </div>

                        <div class="info-value">

                            Universitas Suryakancana

                        </div>

                    </div>


                    <!-- FOCUS -->

                    <div class="info-card">

                        <div class="info-title">

                            Fokus

                        </div>

                        <div class="info-value">

                            Monitoring Pertanian

                        </div>

                    </div>


                </div>



                <!-- =================================================
                     TERMINAL
                ================================================== -->

                <div class="terminal">


                    <div class="terminal-head">

                        <span class="terminal-dot"></span>

                        <span class="terminal-dot"></span>

                        <span class="terminal-dot"></span>

                        <span class="terminal-title">

                            agroteknologi

                        </span>

                    </div>


                    <div class="terminal-body">


                        <div class="terminal-command">

                            <span>
                                sistem
                            </span>:

                            proses penelitian sedang berjalan...

                        </div>


                        <div
                            class="terminal-output"
                            id="thesisText"
                        ></div>


                    </div>

                </div>


            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     RESEARCH AREA
===================================================== -->

<section class="research-section">

    <div class="container">


        <div class="section-tag">

            // kegiatan

        </div>


        <div class="research-grid">


            <!-- CARD 1 -->

            <div class="research-card">

                <div class="research-number">

                    01 / MONITORING

                </div>

                <h3>

                    Monitoring Pertanian

                </h3>

                <p>

                    Sistem digunakan untuk membantu
                    menampilkan dan memantau data
                    yang diperoleh dari kegiatan
                    penelitian pertanian.

                </p>

            </div>



            <!-- CARD 2 -->

            <div class="research-card">

                <div class="research-number">

                    02 / DATA

                </div>

                <h3>

                    Pengelolaan Data

                </h3>

                <p>

                    Data hasil pengamatan dapat
                    disimpan, dikelola, dan ditampilkan
                    kembali melalui sistem secara
                    terstruktur.

                </p>

            </div>



            <!-- CARD 3 -->

            <div class="research-card">

                <div class="research-number">

                    03 / PERTANIAN

                </div>

                <h3>

                    Teknologi Pertanian

                </h3>

                <p>

                    Pemanfaatan teknologi digital
                    untuk mendukung kegiatan
                    penelitian dan pengembangan
                    pertanian.

                </p>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     ABOUT SYSTEM
===================================================== -->

<section class="about">

    <div class="container">


        <div class="about-card">


            <div class="section-tag">

                // about_system

            </div>


            <h2>

                Tentang Sistem

            </h2>


            <p>

                Website ini merupakan

                <strong>
                    Sistem Monitoring Pertanian
                </strong>

                yang dikembangkan untuk mendukung
                kegiatan penelitian mahasiswa
                Agroteknologi. Sistem digunakan
                sebagai media untuk menampilkan
                informasi dan data hasil monitoring
                secara sederhana dan terstruktur.

                Data hasil pengamatan dapat diakses
                melalui halaman

                <strong>
                    Halaman Sensor
                </strong>

                yang tersedia pada website.

            </p>


        </div>

    </div>

</section>



<!-- =====================================================
     FOOTER
===================================================== -->

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



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>


    /* =====================================================
       CLOCK
    ===================================================== */

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



    /* =====================================================
       YEAR
    ===================================================== */

    const yearElement =
        document.getElementById("year");

    if (yearElement) {

        yearElement.textContent =
            new Date().getFullYear();

    }



    /* =====================================================
       TYPEWRITER
    ===================================================== */

    const thesis =

        '"Rancang Bangun Sistem Klasifikasi Tingkat Kematangan Buah Alpukat Berbasis Internet of Things Menggunakan Sensor Gas MQ-135"';


    const thesisElement =

        document.getElementById(
            "thesisText"
        );


    let index = 0;


    function typeWriter() {


        if (!thesisElement) return;


        if (
            index <
            thesis.length
        ) {


            thesisElement.textContent +=

                thesis.charAt(index);


            index++;


            setTimeout(
                typeWriter,
                25
            );


        } else {


            const cursor =
                document.createElement(
                    "span"
                );


            cursor.className =
                "cursor";


            thesisElement.appendChild(
                cursor
            );

        }

    }


    setTimeout(
        typeWriter,
        700
    );


</script>


</body>

</html>

