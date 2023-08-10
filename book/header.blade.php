<header>
    <div class="responsive-nav">
        <a href="{{ route('main-page') }}"></a>
        <img class="res-menu" >
    </div>
    <div class="res-nav">
        <a href="{{ route('login') }}"><button class="header-button">サインイン</button></a>
        <ul class="header-list">
            <li class="click1"><a href="{{ route('click-point1') }}">Top</a></li>
            <li><a href="{{ route('hotel-top') }}">Hotel</a></li>
            <li><a href="{{ route('hotel-ranking') }}">Ranking</a></li>
            <li><a href="{{ route('contact-form') }}">contact us</a></li>
            
        </ul>
    </div>
    <div class="header-nav">
        <div class="nav-between">
            <a href="{{ route('main-page') }}"></a>
            <a href="{{ route('login') }}"><button class="header-button">サインイン</button></a>
        </div>
        <ul class="header-list">
            <li class="click1"><a href="{{ route('click-point1') }}">Top</a></li>
            <li><a href="{{ route('hotel-top') }}">Hotel</a></li>
            <li><a href="{{ route('hotel-ranking') }}">Ranking</a></li>
            <li><a href="{{ route('contact-form') }}">contact us</a></li>
        </ul>
    </div>
</header>