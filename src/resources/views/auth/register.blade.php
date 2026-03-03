<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<div class="auth-header">
    <div class="auth-logo">FashionablyLate</div>
    <div class="auth-header-btn">
        <a href="{{ route('login') }}">login</a>
    </div>
</div>

<div class="auth-bg">
    <br>
    <div class="auth-title">Register</div>
    <div class="auth-container">


        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>お名前</label>
                <input type="text" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                @error('name')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>メールアドレス</label>
                <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>パスワード</label>
                <input type="password" name="password" placeholder="例: coachtech1106">
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <button type="submit">登録</button>
        </form>
    </div>
</div>