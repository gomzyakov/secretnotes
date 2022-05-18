<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('favicon/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('favicon/favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('favicon/favicon-16x16.png') }}" sizes="16x16" type="image/png">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    {{-- TODO <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">--}}
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}">
    {{-- TODO <meta name="theme-color" content="#7952b3">--}}

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@yield('title', 'Секретные заметки') - SecretNotes</title>
    <meta name="description" content="SecretNotes - зашифрованные и самоуничтожающиеся заметки">
</head>
<body>

@yield('content')

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(88726860, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/88726860" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>
