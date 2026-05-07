<!doctype html>
<html @php language_attributes() @endphp>

<head>
    <meta charset="{{ get_bloginfo('charset') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">

    <style>
        :root {
            --ja-red: #541D23;
            --ja-yellow: #FCBA59;
            --ja-beige: #EFEAE8;
            --ja-white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            min-height: 100%;
        }

        body {
            background: var(--ja-red);
            color: var(--ja-red);
            font-family: Arial, Helvetica, sans-serif;
        }

        .maintenance-page {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            background: var(--ja-red);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 24px;
        }

        .maintenance-page::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            left: -140px;
            top: -140px;
            background: rgba(252, 186, 89, 0.14);
            border-radius: 999px;
            filter: blur(60px);
        }

        .maintenance-page::after {
            content: "";
            position: absolute;
            width: 320px;
            height: 320px;
            right: -120px;
            bottom: -120px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 999px;
            filter: blur(60px);
        }

        .maintenance-card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 900px;
            background: var(--ja-beige);
            padding: 56px 32px;
            text-align: center;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.28);
        }

        .maintenance-eyebrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            background: var(--ja-white);
            border: 1px solid rgba(252, 186, 89, 0.55);
            color: rgba(84, 29, 35, 0.72);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .maintenance-title {
            margin: 34px 0 0;
            color: var(--ja-red);
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(42px, 7vw, 82px);
            line-height: 0.98;
            font-weight: 400;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .maintenance-text {
            max-width: 650px;
            margin: 32px auto 0;
            color: rgba(84, 29, 35, 0.72);
            font-size: 18px;
            line-height: 1.75;
        }

        .maintenance-actions {
            margin-top: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .maintenance-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 220px;
            height: 56px;
            padding: 0 28px;
            color: var(--ja-red);
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: opacity 0.2s ease, background 0.2s ease, border-color 0.2s ease;
        }

        .maintenance-button--phone {
            background: var(--ja-white);
            border: 1px solid rgba(84, 29, 35, 0.16);
        }

        .maintenance-button--phone:hover {
            border-color: var(--ja-yellow);
            background: rgba(252, 186, 89, 0.12);
        }

        .maintenance-button--email {
            background: var(--ja-yellow);
            border: 1px solid var(--ja-yellow);
        }

        .maintenance-button--email:hover {
            opacity: 0.9;
        }

        .maintenance-note {
            margin-top: 42px;
            padding-top: 26px;
            border-top: 1px solid rgba(84, 29, 35, 0.12);
            color: rgba(84, 29, 35, 0.56);
            font-size: 15px;
            line-height: 1.6;
        }

        @media (min-width: 768px) {
            .maintenance-card {
                padding: 72px 64px;
            }

            .maintenance-text {
                font-size: 20px;
            }
        }

        @media (max-width: 520px) {
            .maintenance-page {
                padding: 24px 16px;
            }

            .maintenance-card {
                padding: 44px 22px;
            }

            .maintenance-title {
                letter-spacing: 0.05em;
            }

            .maintenance-text {
                font-size: 16px;
            }

            .maintenance-button {
                width: 100%;
                min-width: 0;
            }
        }
    </style>

    @php wp_head() @endphp
</head>

<body @php body_class('maintenance-mode') @endphp>
    @php wp_body_open() @endphp

    <main class="maintenance-page">
        <section class="maintenance-card">
            <p class="maintenance-eyebrow">
                Joinery Atelier
            </p>

            <h1 class="maintenance-title">
                Website Coming<br>
                Soon
            </h1>

            <p class="maintenance-text">
                We are currently refining our new website and reviewing final feedback.
                Thank you for your patience — we’ll be launching soon.
            </p>
        </section>
    </main>

    @php wp_footer() @endphp
</body>

</html>
