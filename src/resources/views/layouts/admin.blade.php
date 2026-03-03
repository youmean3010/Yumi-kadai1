<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Admin - FashionablyLate</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <header class="admin-header">
        <div class="admin-header-inner">
            <h1 class="admin-logo">FashionablyLate</h1>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">logout</button>
            </form>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>