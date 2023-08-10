<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// 最初にトップ画面を表示
Route::get('/', function () {
    return view('book/main-page');  // 変更：welcome → main-page
});


//トップページを表示
Route::get('book/main-page', [BookController::class, 'mainIndex'])->name('main-page');
//トップページ'はじめに'を表示
Route::get('book/main-page#click-point1', [BookController::class, 'clickPoint1'])->name('click-point1');
//トップページ'体験'を表示
Route::get('book/main-page#click-point2', [BookController::class, 'clickPoint2'])->name('click-point2');

//入力フォームページ
Route::get('book/contact-form', [BookController::class, 'index'])->name('contact-form');
//確認フォームページ
Route::post('book/confirm', [BookController::class, 'confirm'])->name('confirm');
//送信完了ページ
Route::post('book/complete', [BookController::class, 'send'])->name('complete');



//ホテルのトップページ
Route::get('/hotel-top', function () {
    return view('book/hotel-top');
})->name('hotel-top');

//ホテル検索
Route::get('hotel-result', [BookController::class, 'searchHotels'])->name('hotel-result');


// ホテルの予約画面
Route::get('/reserve/{hotelId}', [BookController::class, 'showReservationForm'])->name('reservation.form');


// ユーザー情報を取得するためのルートを定義
Route::get('/user-info', [BookController::class, 'getUserInfo'])->name('user-info');

// ホテル情報を取得するためのルートを定義
Route::get('/hotel/{hotelNo}', [BookController::class, 'getHotelInfo'])->name('hotel-info');

// 予約処理を行うルートを定義
Route::post('/reservation-process', [BookController::class, 'processReservation'])->name('reservation-process');

// 予約確認処理を行うルートを定義
Route::post('/reservation-confirm', [BookController::class, 'showReservationConfirm'])->name('reservation-confirm');


Route::post('/reservation-complete', [BookController::class, 'store'])->name('reservation-complete');

// 予約確認ページのGETメソッドを許可するルートを定義
Route::get('/reservation-confirm', [BookController::class, 'showReservationConfirm'])->name('reservation-confirm');



// 予約完了画面へのルートを定義
Route::get('/reservation-complete', [BookController::class, 'store'])->name('reservation-complete');


Route::get('/reservation-status', [BookController::class, 'status'])->name('reservation-status');


//ランキングのトップページ
Route::get('/hotel-ranking', function () {
    return view('book/hotel-ranking');
})->name('hotel-ranking');

//ランキング表示
Route::get('hotel-ranking', [BookController::class, 'searchRanking'])->name('hotel-ranking');






// ログインページ表示
Route::get('/login', [BookController::class, 'showLoginForm'])->name('login');

//ログイン入力フォームページ
Route::get('login', [BookController::class, 'showLoginPage'])->name('login');

// ログイン処理を行うルート
Route::post('login', [BookController::class, 'login'])->name('login.post');



// ログアウト処理
Route::get('/logout', [BookController::class, 'logout'])->name('logout');

//ログアウトしていない場合のトップページを表示
Route::get('notLogin', [BookController::class, 'showNotLoginPage'])->name('notLogin');



//新規会員登録のトップページ
Route::get('/sign-up', function () {
    return view('book/sign-up');
})->name('sign-up');




// ユーザ編集・更新
Route::get('/book/user-edit', [BookController::class, 'edit'])->name('user-edit');
Route::put('/book/user-update', [BookController::class, 'update'])->name('user-update');


// 新規会員登録確認
Route::get('book/confirm-registration', [BookController::class, 'confirmRegistration'])->name('confirm-registration');
Route::post('book/confirm-registration', [BookController::class, 'confirmRegistration'])->name('confirm-registration');


// 新規会員登録完了
Route::match(['get', 'post'], 'book/done', [BookController::class, 'done'])->name('done');







