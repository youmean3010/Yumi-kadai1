@extends('layouts.admin')

@section('content')

<div class="admin-wrapper">

    <h2 class="admin-title">お問い合わせ詳細</h2>

    <p><strong>お名前：</strong>
        {{ $contact->last_name }} {{ $contact->first_name }}
    </p>

    <p><strong>性別：</strong>
        {{ $contact->gender_label }}
    </p>

    <p><strong>メール：</strong>
        {{ $contact->email }}
    </p>

    <p><strong>お問い合わせの種類：</strong>
        {{ $contact->category->content ?? '' }}
    </p>

    <p><strong>お問い合わせ内容：</strong></p>
    <div style="margin-top:10px;">
        {{ $contact->detail }}
    </div>

    <br>
    <a href="{{ route('admin.index') }}">← 戻る</a>

</div>

@endsection