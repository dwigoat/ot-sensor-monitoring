<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | AGUS RESEARCH</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap"
          rel="stylesheet">


    <style>

        :root {

            --bg: #060b14;

            --card: rgba(15, 24, 39, 0.78);

            --border: rgba(255,255,255,0.09);

            --text: #f4f7fb;

            --text-soft: #91a0b5;

            --green: #43e58c;

            --cyan: #35d6ff;

            --red: #ff5c6c;

        }


        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }


        body {

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 20px;

            font-family: 'Inter', sans-serif;

            color: var(--text);

            background:

                radial-gradient(
                    circle at 15% 20%,
                    rgba(67,229,140,0.10),
                    transparent 30%
                ),

                radial-gradient(
                    circle at 85% 10%,
                    rgba(53,214,255,0.10),
                    transparent 30%
                ),

                var(--bg);

            overflow: hidden;

        }


        /* GRID BACKGROUND */

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

            background-size: 45px 45px;

            pointer-events: none;

        }


        /* LOGIN CARD */

        .login-card {

            width: 100%;

            max-width: 430px;

            padding: 35px;

            position: relative;

            background: var(--card);

            border: 1px solid var(--border);

            border-radius: 24px;

            backdrop-filter: blur(20px);

            -webkit-backdrop-filter: blur(20px);

            box-shadow:
                0 25px 80px rgba(0,0,0,0.45);

            overflow: hidden;

        }


        /* TOP LINE */

        .login-card::before {

            content: "";

            position: absolute;

            top: 0;

            left: 0;

            right: 0;

            height: 2px;

            background:
                linear-gradient(
                    90deg,
                    var(--green),
                    var(--cyan)
                );

        }


        /* BRAND */

        .brand {

            text-align: center;

            margin-bottom: 30px;

        }


        .brand-name {

            font-family: 'Space Grotesk', sans-serif;

            font-size: 24px;

            font-weight: 700;

            letter-spacing: 1px;

            background:
                linear-gradient(
                    90deg,
                    var(--green),
                    var(--cyan)
                );

            -webkit-background-clip: text;

            -webkit-text-fill-color: transparent;

        }


        .brand-subtitle {

            margin-top: 8px;

            color: var(--text-soft);

            font-size: 13px;

        }


        /* STATUS */

        .status {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            margin-top: 15px;

            color: var(--green);

            font-family:
                'JetBrains Mono',
                monospace;

            font-size: 10px;

        }


        .status-dot {

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: var(--green);

            box-shadow:
                0 0 12px var(--green);

            animation: pulse 1.8s infinite;

        }


        @keyframes pulse {

            0%,100% {

                opacity: 1;

                transform: scale(1);

            }

            50% {

                opacity: .4;

                transform: scale(.8);

            }

        }


        /* HEADER */

        .login-header {

            margin-bottom: 25px;

        }


        .eyebrow {

            margin-bottom: 8px;

            color: var(--green);

            font-family:
                'JetBrains Mono',
                monospace;

            font-size: 11px;

            letter-spacing: 1px;

        }


        .login-header h1 {

            font-family:
                'Space Grotesk',
                sans-serif;

            font-size: 29px;

            margin-bottom: 8px;

        }


        .login-header p {

            color: var(--text-soft);

            font-size: 13px;

            line-height: 1.6;

        }


        /* ERROR */

        .alert {

            padding: 12px 14px;

            margin-bottom: 20px;

            border-radius: 10px;

            color: #ff929d;

            background:
                rgba(255,92,108,0.07);

            border:
                1px solid rgba(255,92,108,0.18);

            font-size: 12px;

        }


        /* FORM */

        .form-group {

            margin-bottom: 18px;

        }


        .form-group label {

            display: block;

            margin-bottom: 8px;

            color: #dce4ef;

            font-size: 13px;

            font-weight: 600;

        }


        .input-wrapper {

            position: relative;

        }


        .input-icon {

            position: absolute;

            left: 14px;

            top: 50%;

            transform:
                translateY(-50%);

            color: var(--text-soft);

            font-size: 14px;

            pointer-events: none;

        }


        .form-control {

            width: 100%;

            padding:
                13px
                14px
                13px
                40px;

            border-radius: 11px;

            border:
                1px solid rgba(255,255,255,0.09);

            background:
                rgba(5,11,20,0.75);

            color: var(--text);

            outline: none;

            font-family: 'Inter', sans-serif;

            transition: .3s;

        }


        .form-control:focus {

            border-color: var(--green);

            box-shadow:
                0 0 0 3px
                rgba(67,229,140,0.08);

        }


        .form-control::placeholder {

            color: #536176;

        }


        /* LOGIN BUTTON */

        .btn-login {

            width: 100%;

            padding: 13px;

            border: none;

            border-radius: 11px;

            cursor: pointer;

            color: #04100a;

            font-weight: 700;

            font-size: 13px;

            background:
                linear-gradient(
                    135deg,
                    var(--green),
                    #6cf2ae
                );

            box-shadow:
                0 10px 30px
                rgba(67,229,140,0.15);

            transition: .3s;

        }


        .btn-login:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 15px 35px
                rgba(67,229,140,0.25);

        }


        /* FOOTER */

        .footer {

            margin-top: 25px;

            padding-top: 18px;

            border-top:
                1px solid
                rgba(255,255,255,0.06);

            text-align: center;

            color: #59677b;

            font-family:
                'JetBrains Mono',
                monospace;

            font-size: 10px;

        }


        /* MOBILE */

        @media(max-width:500px) {

            .login-card {

                padding: 25px 20px;

                border-radius: 19px;

            }

            .login-header h1 {

                font-size: 25px;

            }

        }

    </style>

</head>


<body>


    <div class="login-card">


        <!-- BRAND -->

        <div class="brand">

            <div class="brand-name">
                AGUS RESEARCH
            </div>

            <div class="brand-subtitle">
                IoT Research Laboratory
            </div>

            <div class="status">

                <span class="status-dot"></span>

                SYSTEM ONLINE

            </div>

        </div>


        <!-- HEADER -->

        <div class="login-header">

            <div class="eyebrow">
                // authentication
            </div>

            <h1>
                Welcome Back
            </h1>

            <p>
                Silakan login untuk mengakses
                sistem monitoring IoT.
            </p>

        </div>


        <!-- ERROR -->

        @if($errors->any())

            <div class="alert">

                ⚠ {{ $errors->first() }}

            </div>

        @endif


        <!-- FORM LOGIN -->

        <form action="/login" method="POST">

            @csrf


            <!-- EMAIL -->

            <div class="form-group">

                <label>
                    Email
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        @
                    </span>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Masukkan email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >

                </div>

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label>
                    Password
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        ●
                    </span>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required
                    >

                </div>

            </div>


            <!-- BUTTON -->

            <button
                type="submit"
                class="btn-login"
            >

                LOGIN SYSTEM →

            </button>

        </form>


        <!-- FOOTER -->

        <div class="footer">

            IoT • Smart Agriculture • Sensor Technology

        </div>


    </div>


</body>

</html>

