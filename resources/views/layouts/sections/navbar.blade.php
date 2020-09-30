<menu-component :menu="{{ json_encode($menuArr ?? '') }}"></menu-component>
<nav class="navbar" id="navbar">
    <div class="container">
        <div class="navbar-wrap ">
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
            <span class="menu-btn__line"></span>
            <span class="menu-btn__line"></span>
            <span class="menu-btn__line"></span>
        </button>
        <!-- menu-btn navbar__menu -->
        </div>
        <!-- /.nav-wrap -->
    </div>
    <!-- /.container -->
</nav>
<!-- /.nav -->
