<!doctype html>
<html>
<head>
    <title>@yield('title', 'Foobooks')</title>
    <meta charset='utf-8'>
    <link href='../../../public/css/refuugees.css' type='text/css' rel='stylesheet'>

    @stack('head')
</head>
<body>

<header>
    <div style='margin-left:780px;' >
    <h2>Refugees Database </h2>
    </div>
    <link href='../../../public/css/refuugees.css' type='text/css' rel='stylesheet'>
</header>

<section>
    @yield('content')
</section>

<footer>
   Developed By Osama Balkasem
</footer>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

@stack('body')

</body>
</html>