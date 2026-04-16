@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/thanks.css') }}">
@endsection

@section('content')
<div class="thanks">
    <h2 class="thanks__heading">Thank you</h2>
    <div class="thanks__content">
        <p class="thanks__message">お問い合わせありがとうございました</p>
        <a class="thanks__button" href="/">HOME</a>
    </div>
</div>
@endsection
