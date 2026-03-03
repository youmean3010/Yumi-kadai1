<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>FashionablyLate</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- 画面別CSS --}}
    @yield('css')
</head>

<body>

    <header class="header">
        <h1 class="logo">FashionablyLate</h1>
        <!-- 
        @auth
        <a href="/logout" class="header-btn">logout</a>
        @endauth

        @guest
        <a href="/login" class="header-btn">login</a>
        <a href="/register" class="header-btn">register</a>
        @endguest -->
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>