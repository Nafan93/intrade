<!-- Main menu -->


<div class="menu__1" id="menu">
    <div class="uk-container">
        <div class="menu__nav">
            @if (isset($menusm))
                @foreach ($menusm as $item)
                    <a  href="{{ route('index') }}/{{ $item['url'] }}" class="menu__link">{{ $item['title'] }}</a>
                @endforeach
            @endif
           <!-- <a href="{{ route('catalog') }}" class="menu__link {{ request()->is('catalog') ? 'active' : '' }}">Каталог</a>-->
        </div>
        <!-- /.menu__nav --> 
    </div>
    <!-- /.container -->
</div>
<!-- /.menu -->

<nav class="navbar__1" id="navbar">
    <div class="container">
        <div class="navbar-wrap_1">
        <div class="logo  ">
            <a href="{{ $url=route('index') }}" class="   logo__link">
                <img src="{{ asset('/images/logo.svg') }}" alt="Интрейд лого">
            </a>
            <!-- /.logo_link -->
        </div>
        <!-- /.logo -->
        <div class="navbar__phone">
            <a href="tel:88007006398">8 (800) 700-63-98</a>
        </div>
        <!-- /.navbar__phone -->
        <div class="navbar__email">
            <a href="mailto:contact@intrade.ru">contact@intrade.ru</a>
        </div>
        <!-- /.navbar__email -->
        <button class="menu-btn navbar__menu" id="btnOpenMenu">
            <span class="menu-btn__line__1"></span>
            <span class="menu-btn__line__1"></span>
            <span class="menu-btn__line__1"></span>
        </button>
        <!-- menu-btn navbar__menu -->
        </div>
        <!-- /.nav-wrap -->
    </div>
    <!-- /.container -->
</nav>
<!-- /.nav -->