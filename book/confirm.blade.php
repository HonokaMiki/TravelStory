<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Travelstory</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-page.css')  }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <script src="{{ asset('js/animation.js') }}"></script>
</head>

@include('book.header') <!--HEADER------------>
<style>
    header {
        position: absolute;
        top: 0;
        background-color: black;
        z-index:20;
    }
    .form-item {
        border-bottom: 1px solid rgb(183, 183, 183);
        margin-bottom: 10px;
    }
</style>


<form method="post" action="{{ route('complete') }}">
    @csrf
    <h1>お問い合わせ内容</h1>
    <div class="form-content">
        <p class="form-text">下記の下記の内容をご確認の上送信ボタンを押してください<br>内容を訂正する場合は戻るを押してください。</p>
        <p class="form-item">氏名</p>
        {{ $inputs['name'] }}
        <input name="name" value="{{ $inputs['name'] }}" type="hidden">
        <p class="form-item">フリガナ</p>
        {{ $inputs['furigana'] }}
        <input name="furigana" value="{{ $inputs['furigana'] }}" type="hidden">
        <p class="form-item">電話番号</p>
        {{ $inputs['tell'] }}
        <input name="tell" value="{{ $inputs['tell'] }}" type="hidden">
        <p class="form-item">メールアドレス</p>
        {{ $inputs['email'] }}
        <input name="email" value="{{ $inputs['email'] }}" type="hidden">
        <p class="form-item">お問い合わせ内容</p>
        {!! nl2br(e( $inputs['body'] )) !!}
        <input name="body" value="{{ $inputs['body'] }}" type="hidden">
        <div class="button">
            <button class="button-firm" type="submit" name="action" value="send">送 &nbsp; 信</button>
            <button class="button-back" type="submit" name="action" value="back" >戻 &nbsp; る</button>
        </div>
    </div>
</form>

@include('book.footer') <!--FOOTER------------>