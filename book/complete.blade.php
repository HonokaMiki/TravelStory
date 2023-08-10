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
</style>

<form method="post" action="confirm.php">
    <h1>お問い合わせ</h1>
    <div class="form-content">
        <p class="form-text">
            お問い合わせ頂きありがとうございます。<br>
            送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
            なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。
        </p>
        <a href="{{ route('main-page') }}">トップへ戻る</a>
    </div>
</form>

@include('book.footer') <!--FOOTER------------>