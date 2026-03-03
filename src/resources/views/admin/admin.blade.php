@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="admin-wrapper">

    <h2 class="admin-title">Admin</h2>

    <!-- 🔍 検索フォーム -->
    <form method="GET" action="{{ route('admin.index') }}" class="search-area">

        <input type="text"
            name="keyword"
            value="{{ request('keyword') }}"
            placeholder="名前やメールアドレスを入力してください">

        <select name="gender">
            <option value="">性別</option>
            <option value="1" {{ request('gender')==1?'selected':'' }}>男性</option>
            <option value="2" {{ request('gender')==2?'selected':'' }}>女性</option>
            <option value="3" {{ request('gender')==3?'selected':'' }}>その他</option>
        </select>

        <select name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ request('category_id')==$category->id?'selected':'' }}>
                {{ $category->content }}
            </option>
            @endforeach
        </select>

        <input type="date" name="date" value="{{ request('date') }}">

        <button type="submit" class="search-btn">検索</button>

        <a href="{{ route('admin.index') }}" class="reset-btn">リセット</a>

    </form>

    <!-- 🔹 エクスポート + ページネーション -->
    <div class="table-header">
        <button class="export-btn">エクスポート</button>

        <div class="pagination-wrapper">
            {{ $contacts->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- 🔹 テーブル -->
    <table>
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>{{ $contact->gender_label }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content ?? '' }}</td>
                <td>
                    <a href="{{ route('admin.show', $contact->id) }}"
                        class="detail-btn">
                        詳細
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection