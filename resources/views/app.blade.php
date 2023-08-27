<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>Daniël van der Spoel - Full-stack web developer</title>
    @routes
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <meta property="og:title" content=Daniël van der Spoel - Full stack web developer>
    <meta property="og:site_name" content=DanielvdSpoel>
    <meta property="og:url" content=https://danielvdspoel.com/>
    <meta property="og:description" content="{{ __('pages.home.description') }}">
    <meta property="og:type" content=website>
    <meta property="og:image" content=https://danielvdspoel.com/img/me_fancy.jpg>

    <script src="https://kit.fontawesome.com/ddae002269.js" crossorigin="anonymous"></script>
    <script defer type="text/javascript" src="https://api.pirsch.io/pirsch-extended.js"
            id="pirschextendedjs"
            data-code="rM2Hi82rMJvjxyeWQHa82n7xQBIXo3as"></script>
    <!-- Matomo -->
    <script>
        var _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//stats.danielvdspoel.com/";
            _paq.push(['setTrackerUrl', u+'matomo.php']);
            _paq.push(['setSiteId', '2']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>
    <!-- End Matomo Code -->
    @inertiaHead
</head>
<body class="flex h-full flex-col bg-zinc-50 dark:bg-black">
@inertia
</body>
</html>
