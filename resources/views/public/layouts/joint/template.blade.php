<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>WEBUILD - Construction Company Website Template Free</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta
        content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Egestas purus viverra accumsan"
        name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <link rel="alternative" href="https://webuild.testrun.ir/" hreflang="en" />
    <link rel="apple-touch-icon" href="img/favicon.ico">
    <link rel="canonical" href="https://webuild.testrun.ir/" />

    <meta property="og:title" content=Webuild>
    <meta property="og:site_name" content=Webuild>
    <meta property="og:url" content=https://webuild.testrun.ir />
    <meta property="og:description" content=construction company>
    <meta property="og:type" content=business.business>
    <meta property="og:image" content=https://webuild.testrun.ir/img/about.jpg>

    @include('public.layouts.joint.style')
</head>

<body>

    @include('public.layouts.joint.topbar')
    @include('public.layouts.joint.navbar')

    @yield('main')

    @include('public.layouts.joint.footer')

    @include('public.layouts.joint.arrowUp')

    <script type="application/ld+json">
    </script>

    @include('public.layouts.joint.javascript')

</body>

</html>
