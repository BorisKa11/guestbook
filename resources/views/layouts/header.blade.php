<header class="header">
    <div class="container header__block">
        <div class="header__title">Гостевая книга</div>
        @auth
            <a href="javascripot:;" class="header__link answerLink" data-id="0">Свой комментарий</a>
            <a href="{{ route('logout') }}" class="header__link">{{ Auth::user()->email }}</a>
        @else
            <a href="javascript:void();" class="header__link enterLink">Войти</a>
        @endauth
    </div>
</header>
