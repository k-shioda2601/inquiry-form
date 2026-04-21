@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact/index.css') }}">
@endsection

@section('content')
    <div class="contact">
        <h2 class="contact__heading">Contact</h2>

        <form class="contact__form" action="/confirm" method="POST">
            @csrf

            <div class="contact__row">
                <label class="contact__label">
                    お名前<span class="contact__required">※</span>
                </label>
                <div class="contact__input-group">
                    <input class="contact__input" type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                    <input class="contact__input" type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                </div>
            </div>
            <div class="contact__error">
                @error('last_name') <span>{{ $message }}</span> @enderror
                @error('first_name') <span>{{ $message }}</span> @enderror
            </div>

            <div class="contact__row">
                <label class="contact__label">
                    性別<span class="contact__required">※</span>
                </label>
                <div class="contact__input-group">
                    <label class="contact__radio">
                        <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>男性
                    </label>
                    <label class="contact__radio">
                        <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>女性
                    </label>
                    <label class="contact__radio">
                        <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>その他
                    </label>
                </div>
            </div>
            <div class="contact__error">
                @error('gender') <span>{{ $message }}</span> @enderror
            </div>

            <div class="contact__row">
                <label class="contact__label">
                    メールアドレス<span class="contact__required">※</span>
                </label>
                <div class="contact__input-group">
                    <input class="contact__input contact__input--wide" type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
            </div>
            <div class="contact__error">
                @error('email') <span>{{ $message }}</span> @enderror
            </div>

            <div class="contact__row">
                <label class="contact__label">
                    電話番号<span class="contact__required">※</span>
                </label>
                <div class="contact__input-group contact__input-group--tel">
                    <input class="contact__input contact__input--tel" type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                    <span class="contact__tel-separator">-</span>
                    <input class="contact__input contact__input--tel" type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                    <span class="contact__tel-separator">-</span>
                    <input class="contact__input contact__input--tel" type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                </div>
            </div>
            <div class="contact__error">
                @error('tel1') <span>{{ $message }}</span> @enderror
                @error('tel2') <span>{{ $message }}</span> @enderror
                @error('tel3') <span>{{ $message }}</span> @enderror
            </div>

            <div class="contact__row">
                <label class="contact__label">
                    住所<span class="contact__required">※</span>
                </label>
                <div class="contact__input-group">
                    <input class="contact__input contact__input--wide" type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                </div>
            </div>
            <div class="contact__error">
                @error('address') <span>{{ $message }}</span> @enderror
            </div>

            <div class="contact__row">
                <label class="contact__label">建物名</label>
                <div class="contact__input-group">
                    <input class="contact__input contact__input--wide" type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>

            <div class="contact__row">
                <label class="contact__label">
                    お問い合わせの種類<span class="contact__required">※</span>
                </label>
                <div class="contact__input-group">
                    <select class="contact__select" name="category_id">
                        <option value="">選択してください</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="contact__error">
                @error('category_id') <span>{{ $message }}</span> @enderror
            </div>

            <div class="contact__row contact__row--textarea">
                <label class="contact__label">
                    お問い合わせ内容<span class="contact__required">※</span>
                </label>
                <div class="contact__input-group">
                    <textarea class="contact__textarea" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
            </div>
            <div class="contact__error">
                @error('detail') <span>{{ $message }}</span> @enderror
            </div>

            <div class="contact__button-wrapper">
                <button class="contact__button" type="submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection
