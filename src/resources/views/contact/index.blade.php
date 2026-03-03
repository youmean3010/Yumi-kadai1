@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<h2 class="page-title">Contact</h2>

   <form class="form" action="/confirm" method="post">
        @csrf

        <!-- お名前 -->
        <div class="form-group">
            <label>お名前 <span class="required">※</span></label>
            <div class="name-group">

          <div class="name-item">
           <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田">
           @error('last_name')
           <p class="error-message">{{ $message }}</p>
           @enderror
        </div>
  
        <div class="name-item">
           <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎">
           @error('first_name')
           <p class="error-message">{{ $message }}</p>
           @enderror
    </div>

</div>
            <!-- <div class="name-group">
                <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田">
                @error('last_name')<p class="error-message">{{ $message }}</p>@enderror
                <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎">
                @error('first_name')<p class="error-message">{{ $message }}</p>@enderror
            </div> -->
        </div>

        <!-- 性別 -->
        <div class="form-group">
            <label>性別 <span class="required">※</span></label>
            <div class="radio-group">

                <!-- <label>
                 <input type="radio" name="gender" value="1"
                  @checked(old('gender') == '1')>
                  男性
                </label>

                <label>
                 <input type="radio" name="gender" value="2"
                 @checked(old('gender') == '2')>
                   女性
                </label>

                <label>
                 <input type="radio" name="gender" value="3"
                  @checked(old('gender') == '3')>
                  その他
                </label> -->
                <input type="radio" name="gender" value="1"> 男性
                <input type="radio" name="gender" value="2"> 女性
                <input type="radio" name="gender" value="3"> その他

            </div>
          @error('gender')
          <p class="error-message">{{ $message }}</p>
          @enderror
        </div>

        <!-- メール -->
        <div class="form-group">
            <label>メールアドレス <span class="required">※</span></label>
            <input type="email" name="email" value="{{ old('email') }}"placeholder="例: test@example.com">@error('email')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- 電話番号 -->
        <div class="form-group">
            <label>電話番号 <span class="required">※</span></label>
            <div class="tel-group">
                <input type="text" name="tel1" value="{{ old('tel1') }}" placeholder="080">
                <span>-</span>
                @error('tel1')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="text" name="tel2" value="{{ old('tel2') }}" placeholder="1234">
                 @error('tel2')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <span>-</span>
                <input type="text" name="tel3" value="{{ old('tel3') }}" placeholder="5678"> @error('tel3')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 住所 -->
        <div class="form-group">
            <label>住所 <span class="required">※</span></label>
            <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
            @error('address')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- 建物名 -->
        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101">
        </div>

        <!-- お問い合わせ種類 -->
        <div class="form-group">
            <label>お問い合わせの種類 <span class="required">※</span></label>
            <select name="category_id">
                <!-- value="{{old('cartegory_id')}}" -->
                <option value="">選択してください</option>
                <option value="1">商品のお届けについて</option>
                <option value="2">商品の交換について</option>
                <option value="3">商品トラブル</option>
                <option value="4">ショップへのお問い合わせ</option>
                <option value="5">その他</option>
            </select>
            @error('category_id')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- お問い合わせ内容 -->
        <div class="form-group">
            <label>お問い合わせ内容 <span class="required">※</span></label>
            <!-- <textarea name="content" rows="6">{{ old('content') }}"       placeholder="お問い合わせ内容をご記載ください"></textarea> -->
            <textarea name="detail" rows="6" value="{{ old('content') }}" placeholder="お問い合わせ内容をご記載ください"></textarea>
            @error('content')
            <p class="error-message">{{ $message }}</p>
            @enderror

        </div>

        <div class="button-area">
            <button type="submit">確認画面</button>
        </div>

    </form>

@endsection