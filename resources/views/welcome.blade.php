<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Microsite pendaftaran Ngomongin Duit Bareng Tante Diany">
    <title>Ngomongin Duit Bareng Tante Diany</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('img/logo.JPG') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/logo.JPG') }}">
    <style>
        :root {
            --ink: #101014;
            --muted: #6d647a;
            --line: #e7deef;
            --accent: #e33724;
            --accent-dark: #b52014;
            --purple: #2a1775;
            --purple-deep: #180f4d;
            --purple-dark: #34207f;
            --gold: #d6b15e;
            --orange: #d97825;
            --white: #ffffff;
            --surface: #fbf9ff;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            color: var(--ink);
            font-family: "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at 86% 6%, rgba(48, 32, 135, .22), transparent 28%),
                radial-gradient(circle at 8% 42%, rgba(52, 32, 127, .12), transparent 30%),
                radial-gradient(circle at 50% 100%, rgba(214, 177, 94, .08), transparent 26%),
                linear-gradient(180deg, #ffffff 0%, #f9f6ff 48%, #eee8fb 100%);
        }

        body::before,
        body::after {
            content: "";
            position: fixed;
            top: 0;
            bottom: 0;
            width: calc((100vw - 430px) / 2);
            background: #ececf1;
            pointer-events: none;
        }

        body::before {
            left: 0;
        }

        body::after {
            right: 0;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .page {
            width: min(430px, calc(100% - 24px));
            margin: 0 auto;
            padding: 16px 0 34px;
        }

        .site-header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            min-height: 64px;
            margin-bottom: 6px;
            padding: 10px 12px;
            border-radius: 6px 6px 0 0;
            background: linear-gradient(180deg, #3b2393 0%, var(--purple) 100%);
        }

        .logo {
            width: min(142px, 41vw);
            height: 70px;
            object-fit: contain;
        }

        .content {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .banner-wrap {
            overflow: hidden;
            border-radius: 0 0 6px 6px;
            background: var(--white);
            border: 1px solid rgba(52, 32, 127, .18);
            box-shadow: 0 14px 30px rgba(9, 5, 33, .26);
        }

        .banner {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: contain;
            background: #f3efe7;
        }

        .copy {
            text-align: center;
            color: var(--purple-deep);
        }

        .headline {
            margin: 0;
            font-size: 29px;
            line-height: 1.16;
            font-weight: 650;
            letter-spacing: 0;
        }

        .headline span {
            color: var(--orange);
        }

        .redaksi {
            margin-top: 16px;
            padding: 3px 0 0;
            /* border-top: 1px solid rgba(52, 32, 127, .16); */
        }

        .redaksi h2 {
            margin: 0 0 8px;
            font-size: 22px;
            line-height: 1.1;
            font-weight: 650;
            color: var(--purple-dark);
        }

        .redaksi p {
            margin: 0;
            color: var(--muted);
            font-size: 16px;
            line-height: 1.5;
            max-width: 34ch;
            margin-inline: auto;
        }

        .event-info {
            margin-top: 18px;
            padding: 18px 18px 16px;
            border-radius: 18px;
            background:
                linear-gradient(180deg, rgba(251, 249, 255, .98) 0%, rgba(241, 236, 253, .96) 100%);
            border: 1px solid rgba(52, 32, 127, .12);
            box-shadow: 0 14px 30px rgba(24, 15, 77, .1);
            text-align: left;
        }

        .event-info-title {
            margin: 0 0 2px;
            font-size: 12px;
            line-height: 1.3;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #6f61a8;
            text-align: center;
        }

        .event-info-list {
            display: grid;
            gap: 10px;
            padding-inline: 10px;
        }

        .event-info-item {
            display: grid;
            justify-items: start;
            gap: 4px;
            padding: 4px 0;
        }

        .event-label {
            color: #7667ac;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .event-value {
            color: var(--purple-deep);
            font-size: 17px;
            line-height: 1.35;
            font-weight: 600;
        }

        .form-panel {
            border-radius: 6px;
            background: var(--white);
            border: 1px solid var(--line);
            box-shadow: 0 14px 30px rgba(9, 5, 33, .24);
            padding: 20px;
        }

        .form-panel h3 {
            margin: 0 0 18px;
            font-size: 21px;
            line-height: 1.15;
            font-weight: 650;
            text-align: center;
            color: var(--purple-dark);
        }

        .field {
            display: grid;
            gap: 8px;
            margin-bottom: 16px;
        }

        label {
            font-size: 15px;
            font-weight: 700;
        }

        input {
            width: 100%;
            min-height: 48px;
            border: 1px solid #d8cee8;
            border-radius: 6px;
            padding: 12px 14px;
            color: var(--ink);
            background: #fcfaff;
            font: inherit;
            outline: none;
        }

        input:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 4px rgba(79, 75, 196, .14);
        }

        .error {
            color: var(--accent-dark);
            font-size: 13px;
        }

        .submit {
            width: 100%;
            min-height: 52px;
            margin-top: 4px;
            border: 0;
            border-radius: 6px;
            color: #24145f;
            background: var(--gold);
            font: inherit;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 12px 22px rgba(9, 5, 33, .18);
        }

        .submit:hover {
            background: #e6ba5b;
        }

        .floating-action {
            position: fixed;
            right: max(14px, calc((100vw - 430px) / 2 + 14px));
            bottom: 18px;
            z-index: 20;
        }

        .floating-action button {
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            border-radius: 999px;
            color: var(--white);
            background: var(--purple-dark);
            border: 1px solid rgba(255, 255, 255, .82);
            box-shadow: 0 12px 24px rgba(24, 15, 77, .24);
            cursor: pointer;
        }

        .floating-action svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            stroke-width: 2.2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 40;
            display: grid;
            place-items: center;
            padding: 20px;
            background: rgba(19, 13, 42, .42);
        }

        .success-modal {
            width: min(360px, 100%);
            border-radius: 8px;
            padding: 24px 20px 20px;
            text-align: center;
            background: var(--white);
            border: 1px solid rgba(52, 32, 127, .18);
            box-shadow: 0 22px 50px rgba(24, 15, 77, .28);
        }

        .success-modal-icon {
            display: grid;
            place-items: center;
            width: 54px;
            height: 54px;
            margin: 0 auto 14px;
            border-radius: 999px;
            color: var(--white);
            background: var(--purple-dark);
        }

        .success-modal-icon svg {
            width: 28px;
            height: 28px;
            stroke: currentColor;
            stroke-width: 2.4;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .success-modal h4 {
            margin: 0 0 8px;
            color: var(--purple-deep);
            font-size: 21px;
            font-weight: 650;
        }

        .success-modal p {
            margin: 0;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.5;
        }

        .modal-close {
            width: 100%;
            min-height: 46px;
            margin-top: 18px;
            border: 0;
            border-radius: 6px;
            color: var(--white);
            background: var(--purple-dark);
            font: inherit;
            font-weight: 700;
            cursor: pointer;
        }

        @media (max-width: 430px) {
            .page {
                width: 100%;
                padding: 0 0 34px;
            }

            .site-header {
                min-height: 88px;
                margin-bottom: 12px;
                padding: 14px 16px;
                border-radius: 0;
            }

            .logo {
                width: 130px;
                height: 62px;
            }

            .content {
                margin-inline: 8px;
            }

            body::before,
            body::after {
                display: none;
            }
        }

        @media (min-width: 431px) {
            .event-info {
                width: min(340px, 84%);
                margin-inline: auto;
                padding: 16px;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <header id="top" class="site-header" aria-label="Logo">
            <img class="logo" src="{{ asset('img/logo.JPG') }}" alt="Logo Fire Bro">
        </header>

        <section class="content">
            <div class="banner-wrap">
                <img class="banner" src="{{ asset('img/banner2.png') }}" alt="Banner Fire Bro">
            </div>

            <div class="copy">
                
                <div class="redaksi">
                    <h2>yuk mulai ngomongin duit</h2>
                    <p>Langkah kecil hari ini bisa membuat masa depan terasa lebih tenang</p>

                    <div class="event-info" aria-label="Informasi acara">
                        <p class="event-info-title">Dengan mengikuti</p>
                        <div class="event-info-list">
                            <div class="event-info-item">
                                <span class="event-label">Acara</span>
                                <span class="event-value">Ngomonginduit</span>
                            </div>
                            <div class="event-info-item">
                                <span class="event-label">Hari</span>
                                <span class="event-value">Kamis</span>
                            </div>
                            <div class="event-info-item">
                                <span class="event-label">Tanggal</span>
                                <span class="event-value">16 Juli 2026</span>
                            </div>
                            <div class="event-info-item">
                                <span class="event-label">Via</span>
                                <span class="event-value">Zoom</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <aside id="registration-form" class="form-panel" aria-label="Form pendaftaran">
                <h3>Daftarkan diri anda disini</h3>

                <form method="POST" action="{{ route('registrations.store') }}" novalidate>
                    @csrf

                    <div class="field">
                        <label for="name">Nama:</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" placeholder="Masukkan nama lengkap" required>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email:</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" placeholder="contoh@email.com" required>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="whatsapp">Whatsapp:</label>
                        <input id="whatsapp" name="whatsapp" type="tel" value="{{ old('whatsapp') }}" autocomplete="tel" placeholder="08xxxxxxxxxx" required>
                        @error('whatsapp')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="submit" type="submit">Submit</button>
                </form>
            </aside>
        </section>
    </main>

    <nav class="floating-action" aria-label="Navigasi cepat">
        <button type="button" id="scrollToggle" aria-label="Ke form pendaftaran" title="Ke form pendaftaran">
            <svg id="scrollIcon" viewBox="0 0 24 24" aria-hidden="true">
                <path id="scrollLine" d="M12 5v14"></path>
                <path id="scrollArrow" d="M5 12l7 7 7-7"></path>
            </svg>
        </button>
    </nav>

    @if (session('success'))
        <div class="modal-backdrop" id="successModal" role="dialog" aria-modal="true" aria-labelledby="successTitle">
            <div class="success-modal">
                <div class="success-modal-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                </div>
                <h4 id="successTitle">Data berhasil dikirim</h4>
                <p>{{ session('success') }}</p>
                <button type="button" class="modal-close" id="closeSuccessModal">OK</button>
            </div>
        </div>
    @endif

    <script>
        const scrollToggle = document.getElementById('scrollToggle');
        const scrollLine = document.getElementById('scrollLine');
        const scrollArrow = document.getElementById('scrollArrow');
        const formSection = document.getElementById('registration-form');

        function isAtBottom() {
            return window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 12;
        }

        function setScrollDirection() {
            const shouldGoUp = isAtBottom();

            scrollToggle.setAttribute('aria-label', shouldGoUp ? 'Kembali ke atas' : 'Ke form pendaftaran');
            scrollToggle.setAttribute('title', shouldGoUp ? 'Kembali ke atas' : 'Ke form pendaftaran');
            scrollLine.setAttribute('d', shouldGoUp ? 'M12 19V5' : 'M12 5v14');
            scrollArrow.setAttribute('d', shouldGoUp ? 'M5 12l7-7 7 7' : 'M5 12l7 7 7-7');
        }

        scrollToggle.addEventListener('click', function () {
            const shouldGoUp = isAtBottom();
            document.getElementById(shouldGoUp ? 'top' : 'registration-form').scrollIntoView({ behavior: 'smooth' });
        });

        window.addEventListener('scroll', setScrollDirection, { passive: true });
        window.addEventListener('resize', setScrollDirection);
        setScrollDirection();

        const successModal = document.getElementById('successModal');
        const closeSuccessModal = document.getElementById('closeSuccessModal');

        if (successModal && closeSuccessModal) {
            closeSuccessModal.addEventListener('click', function () {
                successModal.remove();
            });

            successModal.addEventListener('click', function (event) {
                if (event.target === successModal) {
                    successModal.remove();
                }
            });
        }
    </script>
</body>
</html>
