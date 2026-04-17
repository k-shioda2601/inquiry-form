@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('header-nav')
<nav class="header__nav">
    <form action="/logout" method="POST">
        @csrf
        <button class="header__nav-button" type="submit">logout</button>
    </form>
</nav>
@endsection

@section('content')
<div class="admin">
    <h2 class="admin__heading">Admin</h2>

    <form class="admin__search" action="/search" method="GET">
        <input class="admin__search-input" type="text" name="name" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">
        <select class="admin__search-select" name="gender">
            <option value="">性別</option>
            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
        </select>
        <select class="admin__search-select" name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
            @endforeach
        </select>
        <input class="admin__search-date" type="date" name="date" value="{{ request('date') }}">
        <button class="admin__search-button" type="submit">検索</button>
        <a class="admin__reset-button" href="/reset">リセット</a>
    </form>

    <div class="admin__toolbar">
        <div class="admin__actions">
            <a class="admin__export-button" href="/export?{{ http_build_query(request()->query()) }}">エクスポート</a>
        </div>
        <div class="admin__pagination">
            {{ $contacts->appends(request()->query())->links() }}
        </div>
    </div>

    <table class="admin__table">
        <thead>
            <tr class="admin__table-header">
                <th class="admin__table-th">お名前</th>
                <th class="admin__table-th">性別</th>
                <th class="admin__table-th">メールアドレス</th>
                <th class="admin__table-th">お問い合わせの種類</th>
                <th class="admin__table-th"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr class="admin__table-row">
                <td class="admin__table-td">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td class="admin__table-td">
                    @if($contact->gender == 1) 男性
                    @elseif($contact->gender == 2) 女性
                    @else その他
                    @endif
                </td>
                <td class="admin__table-td">{{ $contact->email }}</td>
                <td class="admin__table-td">{{ $contact->category->content }}</td>
                <td class="admin__table-td">
                    <button class="admin__detail-button" onclick="openModal({{ $contact->id }})">詳細</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @foreach($contacts as $contact)
    <div class="modal" id="modal-{{ $contact->id }}">
        <div class="modal__overlay" onclick="closeModal({{ $contact->id }})"></div>
        <div class="modal__content">
            <button class="modal__close" onclick="closeModal({{ $contact->id }})">&times;</button>
            <table class="modal__table">
                <tr>
                    <th class="modal__label">お名前</th>
                    <td class="modal__value">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                </tr>
                <tr>
                    <th class="modal__label">性別</th>
                    <td class="modal__value">
                        @if($contact->gender == 1) 男性
                        @elseif($contact->gender == 2) 女性
                        @else その他
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="modal__label">メールアドレス</th>
                    <td class="modal__value">{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th class="modal__label">電話番号</th>
                    <td class="modal__value">{{ $contact->tel }}</td>
                </tr>
                <tr>
                    <th class="modal__label">住所</th>
                    <td class="modal__value">{{ $contact->address }}</td>
                </tr>
                <tr>
                    <th class="modal__label">建物名</th>
                    <td class="modal__value">{{ $contact->building }}</td>
                </tr>
                <tr>
                    <th class="modal__label">お問い合わせの種類</th>
                    <td class="modal__value">{{ $contact->category->content }}</td>
                </tr>
                <tr>
                    <th class="modal__label">お問い合わせ内容</th>
                    <td class="modal__value">{{ $contact->detail }}</td>
                </tr>
            </table>
            <form class="modal__delete-form" action="/delete" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $contact->id }}">
                <button class="modal__delete-button" type="submit">削除</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.add('modal--active');
    }
    function closeModal(id) {
        document.getElementById('modal-' + id).classList.remove('modal--active');
    }
</script>
@endsection
