<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\Reservation;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class BookController extends Controller
{
    // お問い合わせフォーム表示
    public function index() {
        $contacts = DB::table('contacts')->select('id', 'name', 'kana', 'tel', 'email', 'body', 'created_at')->get();
		return view('book.contact-form', compact('contacts'));
    }

    // トップページを表示
    public function mainIndex() {
        return view('book.main-page');
    }

    

    // トップページの’はじめに’表示
    public function clickPoint1() {
        return view('book.main-page#click-point1');
    }

    // トップページの’体験’表示
    public function clickPoint2() {
        return view('book.main-page#click-point2');
    }

    // 入力値のバリデーション、入力値に変数を入れて確認ページに渡す
    public function confirm(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
            'furigana' => 'required',
            'email' => 'required|email',
            'tell' => 'regex:/^[0-9-]+$/',
            'body' => 'required',
        ],[
            'name.required' => 'お名前をご記入ください。',
            'furigana.required' => 'フリガナをご記入ください。',
            'email.required' => 'メールアドレスをご記入ください。',
            'email.email' => 'メールアドレスを正しくご記入ください',
            'tell.regex' => '電話番号は0~9の数字でご記入ください',
            'body.required' => 'お問い合わせ内容をご記入ください',
            ]
        );
        // フォームからの入力値を全て取得
        $inputs = $request->all();
        // 確認ページに表示、入力値を引数に渡す
        return view('book.confirm', [
        'inputs' => $inputs,
        ]);
    }

    // 確認した値をデータベースに登録をして完了ページへ
    public function send(Request $request) {
        //フォームから受け取ったactionの値を取得
        $action = $request->input('action');
        //フォームから受け取ったactionを除いたinputの値を取得
        $inputs = $request->except('action');
        //actionの値で分岐
        if($action !== 'send'){
            // 戻るボタンで入力画面にデータを渡して戻る
            return redirect()
                ->route('contact-form')
                ->withInput($inputs);
        } else {
            //データベースへ登録
            Book::create([
                'name' => $inputs['name'],
                'kana' => $inputs['furigana'],
                'tel' => $inputs['tell'],
                'email' => $inputs['email'],
                'body' => $inputs['body'],
                'created_at' => date( "Y-m-d H:i:s" )
            ]);
            return view('book.complete');
        }
    }






    

    public function confirmRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'tel' => 'required|regex:/^[0-9-]+$/',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|in:credit_card,bank_transfer',
        ]);
    
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->tel = $request->tel;
        $user->address = $request->address;
    
        if ($request->payment_method === 'credit_card') {
            $user->payment_method = 'credit_card';
            $user->credit_card_number = $request->credit_card_number;
            $user->cardholder_name = $request->cardholder_name;
            $user->expiry_date = $request->expiry_date;
            $user->security_code = $request->security_code;
        } elseif ($request->payment_method === 'bank_transfer') {
            $user->payment_method = 'bank_transfer';
            $user->bank_name = $request->bank_name;
            $user->branch_name = $request->branch_name;
            $user->account_type = $request->account_type;
            $user->account_number = $request->account_number;
            $user->account_holder = $request->account_holder;
        }
    
        $user->save();
    
        return redirect()->route('done')->with('success', '新規登録が完了しました！');
    }
    
    // 新規会員登録の完了画面を表示
    public function done()
    {
        return view('book.done');
    }







    // ホテルランキングを処理
    public function searchRanking(Request $request)
    {
        
        // 実際のAPIエンドポイントURLに置き換える
        $apiEndpoint = 'https://app.rakuten.co.jp/services/api/Travel/HotelRanking/20170426?';
        // $apiEndpoint = 'https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024';

        // パラメータの共通部分
        $commonParams = [
            'format' => 'json',
            'genre' => 'all',
            // ここに共通のパラメータを追加する
        ];

        

        // GuzzleHttpを使用してAPIリクエストを送信
        $client = new Client();
        $response = $client->get($apiEndpoint, [
            'query' => array_merge(['applicationId' => '1064087381974691303']),
        ]);

            
        // APIからのレスポンスをJSON形式で取得し、連想配列に変換
        $Rankings = json_decode($response->getBody(), true);
        // dd($Rankings);


        // $hotelsにAPIから受け取ったホテルデータが含まれている
        // フィルタリングされたホテルデータをビューに渡す
        return view('book.hotel-ranking', ['filteredRankings' => $Rankings['Rankings']]);



    }













    // ホテル検索を処理
    public function searchHotels(Request $request)
    {
        // フォームから送信されたデータを取得
        $destination = $request->input('country');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');
        $guests = $request->input('guests');

    
        
        // 実際のAPIエンドポイントURLに置き換える
        $apiEndpoint = 'https://app.rakuten.co.jp/services/api/Travel/SimpleHotelSearch/20170426';
        // $apiEndpoint = 'https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024';

        // パラメータの共通部分
        $commonParams = [
            'format' => 'json',
            'largeClassCode' => 'japan',
            // ここに共通のパラメータを追加する
        ];

        // 特定の地域でのみ追加したいパラメータ
        $specialRegionParams = [
            'middleClassCode' => '',
            'smallClassCode' => '',
            'detailClassCode' => 'A', // 東京、大阪、札幌の場合のみ指定
        ];

        // 特定の地域の場合は$specialRegionParamsを追加
        if ($destination === 'tokyo' || $destination === 'osaka' || $destination === 'sapporo') {
            switch ($destination) {
                case 'tokyo':
                    $specialRegionParams['middleClassCode'] = 'tokyo';
                    $specialRegionParams['smallClassCode'] = 'tokyo';
                    break;
                case 'osaka':
                    $specialRegionParams['middleClassCode'] = 'osaka';
                    $specialRegionParams['smallClassCode'] = 'shi';
                    break;
                case 'sapporo':
                    $specialRegionParams['middleClassCode'] = 'hokkaido';
                    $specialRegionParams['smallClassCode'] = 'sapporo';
                    break;
            }

            // APIリクエストに特定の地域のパラメータを追加
            $params = array_merge($commonParams, $specialRegionParams);
        } else {
            // それ以外の場合は通常のパラメータを使用
            $params = array_merge($commonParams, [
                'middleClassCode' => $destination,
                'smallClassCode' => $destination,
            ]);
        }

        

        // GuzzleHttpを使用してAPIリクエストを送信
        $client = new Client();
        $response = $client->get($apiEndpoint, [
            'query' => array_merge($params, ['applicationId' => '1064087381974691303']),
        ]);

            
        // APIからのレスポンスをJSON形式で取得し、連想配列に変換
        $hotels = json_decode($response->getBody(), true);
        // dd($hotels);

        // チェックイン日、チェックアウト日、宿泊人数に応じてフィルタリング
        $filteredHotels = [];
        foreach ($hotels['hotels'] as $hotelItem) {
            if (isset($hotelItem['hotel'][0]['hotelBasicInfo'])) {
                $hotel = $hotelItem['hotel'][0]['hotelBasicInfo'];

                // ホテルの料金情報を取得
                $hotelMinCharge = isset($hotel['hotelMinCharge']) ? $hotel['hotelMinCharge'] : 0;

                // チェックイン日、チェックアウト日、宿泊人数の条件に合致するかチェック
                if ($hotelMinCharge > 0 && $this->isValidHotel($hotel, $checkin, $checkout, $guests)) {
                    $filteredHotels[] = $hotel;
                }
            }
        }
        // $hotelsにAPIから受け取ったホテルデータが含まれている
        // フィルタリングされたホテルデータをビューに渡す
        return view('book.hotel-result', ['hotels' => $filteredHotels]);


    }

        // ホテルがチェックイン日、チェックアウト日、宿泊人数の条件に合致するかを確認
        private function isValidHotel($hotel, $checkin, $checkout, $guests)
        {
            // チェックイン日、チェックアウト日、宿泊人数の条件を比較し、条件に合致するかを判定
            if (isset($checkin) && isset($checkout) && isset($guests)) {
                // ここで宿泊人数に応じて部屋の種類をチェックするロジックを追加します
                // 例: 1人の場合はシングルルームのみを表示するなど

                // チェックイン日とチェックアウト日が設定されているかを確認
                if (!empty($checkin) && !empty($checkout)) {
                    // チェックアウト日がチェックイン日より後であるかを確認
                    $checkinDate = new DateTime($checkin);
                    $checkoutDate = new DateTime($checkout);
                    if ($checkoutDate > $checkinDate) {
                        return true;
                    }
                }
            }

            return false;
        }








        public function showLoginForm()
        {
            return view('book.login');
        }
    
        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');
            
            if (Auth::attempt($credentials)) {
                // ログイン成功時の処理
                return response()->json(['success' => true]);
            } else {
                // ログイン失敗時の処理
                return response()->json(['success' => false, 'message' => 'メールアドレスまたはパスワードが間違っています。']);
            }
        }

        public function showLoginPage()
        {
            return view('book.login');
        }
        

        public function showNotLoginPage()
        {
            return view('book.notLogin');
        }

        public function logout()
        {
            Auth::logout(); // ログアウト
            return view('book.logout'); // ログアウト後のビューを表示
        }

        // 予約画面を表示するアクション
        public function showReservationForm($hotelId)
        {

            // ここで取得したデータを予約画面のビューに渡す例：
            $hotelInfo = User::find($hotelId);
            return view('book.reservation', compact('hotelInfo'));
        }


        // ユーザー情報を取得し、JSONレスポンスとして返す
    public function getUserInfo()
    {
        // ユーザーモデルが存在すると仮定して、ユーザー情報を取得します
        $user = auth()->user();


        // ユーザー情報をJSONレスポンスとして返す
        return response()->json($user);
    }

    // ホテル情報を取得し、JSONレスポンスとして返す
    public function getHotelInfo($hotelNo)
    {
         // ホテル情報をデータベースなどから取得します（適切に実装してください）
         // 以下はダミーデータの例です
         $hotelInfo = [
             'hotelName' => 'サンプルホテル',
             'checkInDate' => '2023-08-01',
             'checkOutDate' => '2023-08-05',
             'numPeople' => 2,
         ];
 
         // ホテル情報をJSONレスポンスとして返す
         return response()->json($hotelInfo);
    }

    public function processReservation(Request $request)
    {
        // 予約画面のフォームで入力された情報を取得
        $formData = $request->all();
    
       
    
        // 確認フォームに予約情報とホテル情報を渡して表示
        return view('book.reservation-confirm');
    }
    

    public function showReservationConfirm(Request $request)
    {
        // 確認フォームの情報を受け取る処理を追加することも可能
        // ただし、ここでは受け取った情報を表示するだけの例となっています
    
        $formData = $request->all();
        $hotelInfo = []; // 必要に応じてホテル情報を取得する処理を追加する
    
        return view('book.reservation-confirm', compact('formData', 'hotelInfo'));
    }
    






    public function store(Request $request)
    {
        // ユーザー情報を取得
        $user = auth()->user();
        
        
    
        // フォームからの入力値を取得
        $input = $request->all();
    
        // 予約情報をデータベースに登録
        $reservation = Reservation::create([
            'user_id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'tel' => $user->tel,
            'address' => $user->address,
            // 'hotelNo' => $input['hotelNo'],
            // 'hotelName' => $input['hotelName'],
            'address1' => $user->address1,
            'payment_method' => $user->payment_method, // ユーザー情報から取得
            'credit_card_number' => $user->credit_card_number, // ユーザー情報から取得
            'cardholder_name' => $user->cardholder_name, // ユーザー情報から取得
            'expiry_date' => $user->expiry_date, // ユーザー情報から取得
            'security_code' => $user->security_code, // ユーザー情報から取得
            'bank_name' => $user->bank_name, // ユーザー情報から取得
            'branch_name' => $user->branch_name, // ユーザー情報から取得
            'account_type' => $user->account_type, // ユーザー情報から取得
            'account_number' => $user->account_number, // ユーザー情報から取得
            'account_holder' => $user->account_holder, // ユーザー情報から取得
        ]);
    
        // 予約完了画面を表示するビューに予約情報を渡して表示
        return view('book.reservation-complete', ['reservationData' => $reservation]);
    }
    
    
    
    
    


    public function edit()
    {
        // Add the logic to fetch the user data from the database and pass it to the view
        $user = auth()->user();

        return view('book.user-edit', compact('user'));
    }


    public function update(Request $request)
    {
        // 送信されたフォームデータに基づいてユーザープロフィールを更新するロジックを追加
        $user = auth()->user();
    
        // フォームから送信されたデータを取得
        $userData = $request->only(['tel', 'address', 'email', 'payment_method']);
    
        // クレジットカード情報のフィールドがあれば、データを取得
        $creditCardData = $request->only(['credit_card_number', 'cardholder_name', 'expiry_date', 'security_code']);
        
        // 銀行振込情報のフィールドがあれば、データを取得
        $bankTransferData = $request->only(['bank_name', 'branch_name', 'account_type', 'account_number', 'account_holder']);
    
        // ユーザ情報を更新
        $user->update($userData);
    
        // 支払い方法に応じてクレジットカード情報または銀行振込情報を更新
        if ($userData['payment_method'] === 'credit_card') {
            $user->update($creditCardData);
        } elseif ($userData['payment_method'] === 'bank_transfer') {
            $user->update($bankTransferData);
        }
    
        // フォームデータのバリデーション（必要に応じてバリデーションルールを追加）
        $request->validate([
            'tel' => 'required|regex:/^[0-9-]+$/',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'payment_method' => 'required|in:credit_card,bank_transfer',
            'credit_card_number' => 'required_if:payment_method,credit_card',
            'cardholder_name' => 'required_if:payment_method,credit_card',
            'expiry_date' => 'required_if:payment_method,credit_card',
            'security_code' => 'required_if:payment_method,credit_card',
            'bank_name' => 'required_if:payment_method,bank_transfer',
            'branch_name' => 'required_if:payment_method,bank_transfer',
            'account_type' => 'required_if:payment_method,bank_transfer',
            'account_number' => 'required_if:payment_method,bank_transfer',
            'account_holder' => 'required_if:payment_method,bank_transfer',
        ]);
    
        // 更新されたユーザーデータをデータベースに保存
        $user->save();
    
    // ユーザー情報を更新したらログアウト
    Auth::logout();

    // ログアウト後にlogin.blade.phpにリダイレクトする
    return redirect()->route('login')->with('success', 'プロフィールが正常に更新されました。ログアウトしました。');

    }


    
public function reservationComplete(Request $request)
{
    $user = auth()->user();

    $data = $request->validate([
        'hotelNo' => 'required',
        'hotelName' => 'required',
        'telephoneNo' => 'required',
        'address1' => 'required',
        'payment_method' => 'required',
        'credit_card_number' => 'required_if:payment_method,credit_card',
        'cardholder_name' => 'required_if:payment_method,credit_card',
        'expiry_date' => 'required_if:payment_method,credit_card',
        'security_code' => 'required_if:payment_method,credit_card',
        'bank_name' => 'required_if:payment_method,bank_transfer',
        'branch_name' => 'required_if:payment_method,bank_transfer',
        'account_type' => 'required_if:payment_method,bank_transfer',
        'account_number' => 'required_if:payment_method,bank_transfer',
        'account_holder' => 'required_if:payment_method,bank_transfer',
    ]);

    $data['user_id'] = $user->id;

    Reservation::create($data);

        // 予約完了画面のビューを表示
        return view('book.reservation-complete');

}


    public function status()
    {
        // ログインしているユーザーのIDを取得
        $userId = Auth::id();
        
        // ユーザーに関連する予約情報を取得
        $reservations = Reservation::where('user_id', $userId)->get();
        
        return view('book.reservation-status', compact('reservations'));
    }

    

}


