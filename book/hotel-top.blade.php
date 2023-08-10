<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Travelstory</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-page.css') }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/animation.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
</head>

<body>

  <button class="jump">Jump To Top </button>

  @include('book.header') <!--HEADER------------>

  <style>
      header {
          position: absolute;
          top: 0;
          background-color: black;
          z-index: 20;
      }
  </style>


    <p class="title">Hotel</h3>

        <div style="height: 80px;"></div>

        <form action="{{ route('hotel-result') }}" method="GET" class="hotelcountry">

      
        <div class="searchform1">
          
          <label for="country">国:</label>
          <select name="country" id="country" style="font-size: 20px; padding: 10px;">

            
              <!-- 日本 -->
              <optgroup label="日本">
                  <option value="tokyo">東京</option>
                  <option value="osaka">大阪</option>
                  <option value="fukuoka">福岡</option>
                  <option value="sapporo">札幌</option>
                  <option value="hiroshima">広島</option>
                  <option value="shizuoka">静岡</option>
                  <option value="nagasaki">長崎</option>
              </optgroup>
              
              <!-- 韓国及び東南アジア -->
              <optgroup label="韓国及び東南アジア">
                  <option value="Seoul">ソウル</option>
                  <option value="Busan">釜山</option>
                  <option value="Jeju">済州市</option>
                  <option value="Bangkok">バンコク</option>
                  <option value="Phuket">プーケット</option>
                  <option value="Singapore">シンガポール</option>
                  <option value="Ho-Chi-Minh">ホーチミン</option>
                  <option value="Hanoi">ハノイ</option>
                  <option value="Kuala-Lumpur">クアラルンプール</option>
                  <option value="Jakarta">ジャカルタ</option>
                  <option value="Bali">バリ島</option>
                  <option value="Manila">マニラ</option>
              </optgroup>
              
              <!-- 中華圏 -->
              <optgroup label="中華圏">
                  <option value="Shanghai">上海</option>
                  <option value="Beijing">北京</option>
                  <option value="Hong-Kong">香港</option>
                  <option value="Taipei">台北</option>
                  <option value="Guangzhou">広州</option>
                  <option value="Shenzhen">深セン</option>
                  <option value="Dalian">大連</option>
                  <option value="Tianjin">天津</option>
                  <option value="Qingdao">青島</option>
              </optgroup>
              
              <!-- 他の人気都市 -->
              <optgroup label="他の人気都市">
                  <option value="Honolulu">ホノルル</option>
                  <option value="Guam">グアム</option>
                  <option value="Saipan">サイパン</option>
                  <option value="London">ロンドン</option>
                  <option value="Paris">パリ</option>
                  <option value="Rome">ローマ</option>
                  <option value="Sydney">シドニー</option>
                  <option value="New-York">ニューヨーク</option>
                  <option value="Los-Angeles">ロサンゼルス</option>
              </optgroup>
          </select>
          
        </div>
        <div class="searchform">
          <label for="checkin">チェックイン日:</label>
          <!-- カレンダーのサイズを変更 -->
          <input type="date" name="checkin" id="checkin" style="font-size: 20px; padding: 10px;">
      </div>
      <div class="searchform">
          <label for="checkout">チェックアウト日:</label>
          <!-- カレンダーのサイズを変更 -->
          <input type="date" name="checkout" id="checkout" style="font-size: 20px; padding: 10px;">
      </div>

      <div class="searchform">
            <label for="guests">宿泊人数:</label>
            <select name="guests" id="guests" style="font-size: 20px; padding: 10px;">
                <option value="1">1人</option>
                <option value="2">2人</option>
                <option value="3">3人</option>
                <option value="4">4人</option>
                <option value="5">5人</option>
                <option value="6">6人</option>
                <option value="7">7人</option>
                <option value="8">8人</option>
                <option value="9">9人</option>
                <option value="10">10人</option>
                <!-- 他の宿泊人数のオプションを追加 -->
            </select>
        </div>
        <div class="searchform">
        <button type="submit">検索</button>
      </div>
    </form>



    <div class="advertizement">
      <h6>おすすめ最新情報</h6>
      
      <ul class="slider2">
          <li>
              <img src="{{ asset('img/goto1.png')}}">
              <h3 class="advtitle">gotoトラベル</h3>
              <p class="goto">gotoを利用してお得な旅を</p>
          </li>
          <li>
              <img src="{{ asset('img/adv2.png')}}">
              <h3 class="advtitle">お得なアジア旅を実現 ジンエアーなら</h3>
              <p class="goto">LCC 航空券価格に嬉しい無料サービスもついてくる</p>
          </li>
          <li>
              <img src="{{ asset('img/adv3.png')}}">
              <h3 class="advtitle">JALの旅</h3>
              <p class="goto">国内旅行は日本航空で快適な旅を</p>
          </li>
          <li>
              <img src="{{ asset('img/adv4.png')}}">
              <h3 class="advtitle">夏休みは海外旅行</h3>
              <p class="goto">今すぐ予約すると海外旅行が20%OFFになるチャンス</p>
          </li>
          <li>
              <img src="{{ asset('img/adv5.png')}}">
              <h3 class="advtitle">行こうよ倉吉キャンペーン</h3>
              <p class="goto">今なら10000円分のクーポンで倉吉へ</p>
          </li>
          <li>
              <img src="{{ asset('img/adv6.png')}}">
              <h3 class="advtitle">京王プラザホテル札幌</h3>
              <p class="goto">北海道で食の旅</p>
          </li>
      </ul>
  </div><!--.advertizement------------>






    <h5>人気都市</h5>

    <ul class="popcity">
      <li><img src="img/ホノルル.jpeg" alt=""></li>
      <li><img src="img/ロンドン.webp" alt=""></li>
      <li><img src="img/パリ.jpeg" alt=""></li>
      <li><img src="img/ニューヨーク.jpeg" alt=""></li>
      <li><img src="img/大阪.jpeg" alt=""></li>
      <li><img src="img/台湾.jpeg" alt=""></li>
      <!--/popcity--></ul>

      <h5>人気ホテル</h5>

      <ul class="popcity">
        <li><img src="img/ホテル１.jpeg" alt=""></li>
        <li><img src="img/ホテル２.jpeg" alt=""></li>
        <li><img src="img/ホテル３.webp" alt=""></li>
        <li><img src="img/ホテル４.webp" alt=""></li>
        <li><img src="img/ホテル６.webp" alt=""></li>
        <li><img src="img/ホテル７.jpeg" alt=""></li>
        <!--/popcity--></ul>

      
      <div style="height: 70px;"></div>

      <div class="faq-container">
        <h2>よくある質問</h2>
        <div class="faq-item">
          <input type="checkbox" id="faq1">
          <label for="faq1">Q1. パスポートの有効期限は何か確認しましたか？</label>
          <div class="faq-content">
            A1. 旅行先の国の要件に合わせてパスポートの有効期限を確認してください。
          </div>
        </div>
        <div class="faq-item">
          <input type="checkbox" id="faq2">
          <label for="faq2">Q2. キャンセルポリシーについて教えてください。</label>
          <div class="faq-content">
            A2. キャンセルポリシーは予約するホテルや航空会社によって異なります。詳細は各予約ページをご確認ください。
          </div>
      <div class="faq-item">
        <input type="checkbox" id="faq3">
        <label for="faq3">Q3. 支払い方法について教えてください。</label>
        <div class="faq-content">
          A3. 支払い方法はクレジットカードや銀行振込など複数の方法があります。各予約ページで受け付けている支払い方法を確認してください。
        </div>
      </div>
      <div class="faq-item">
        <input type="checkbox" id="faq4">
        <label for="faq4">Q4. 海外旅行保険に加入した方が良いですか？</label>
        <div class="faq-content">
          A4. 海外旅行保険に加入することを強くおすすめします。万が一の事態に備えて安心です。
        </div>
      </div>
      <div class="faq-item">
        <input type="checkbox" id="faq5">
        <label for="faq5">Q5. 予約のキャンセル・変更はどうすればいいですか？</label>
        <div class="faq-content">
          A5. 予約のキャンセルや変更は、マイページまたはお問い合わせフォームから手続きしてください。
        </div>
      </div>
      <div class="faq-item">
        <input type="checkbox" id="faq6">
        <label for="faq6">Q6. 航空券の予約はいつがベストですか？</label>
        <div class="faq-content">
          A6. 航空券は早めに予約することで割引料金を得ることができることがあります。早めの予約をおすすめします。
        </div>
      </div>
      <div class="faq-item">
        <input type="checkbox" id="faq7">
        <label for="faq7">Q7. ホテルのチェックイン・チェックアウト時間は何時ですか？</label>
        <div class="faq-content">
          A7. ホテルのチェックイン時間は通常14:00以降、チェックアウト時間は通常11:00ですが、ホテルによって異なる場合があります。
        </div>
      </div>
      <div class="faq-item">
        <input type="checkbox" id="faq8">
        <label for="faq8">Q8. 電子マネーは使えますか？</label>
        <div class="faq-content">
          A8. 一部の店舗やレストランでは電子マネーが使える場合がありますが、現金を持参することをおすすめします。
        </div>
      </div>
      <div class="faq-item">
        <input type="checkbox" id="faq9">
        <label for="faq9">Q9. 海外でのWi-Fi環境について教えてください。</label>
        <div class="faq-content">
          A9. 海外でWi-Fiを利用するには、空港やホテル、カフェなど公共の場所で提供されていることがあります。また、現地の携帯電話会社のSIMカードを利用する方法もあります。
        </div>
      </div>
    </div>
  </div>
</div>
</div>


    @include('book.footer')
    <!--FOOTER------------>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--自作のJS-->
    <script src="animation.js"></script>

</body>

</html>
