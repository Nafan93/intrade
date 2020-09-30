<!-- top nav -->
<nav class="uk-navbar-container" uk-navbar uk-sticky>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-nav"><span uk-icon="menu"></span></button>
            <a href="#offcanvas-nav"></a>
            <li class="{{ request()->is('admin/') ? 'uk-active' : '' }}"><a href="{{ route('admin') }}">Заявки</a></li>
            <li class="{{ request()->is('admin/*/create') ? 'uk-active' : '' }}">
                <a href="#">Добавить</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="{{ request()->is('admin/products/create') ? 'uk-active' : '' }}">
                            <a href="{{ route('products.create') }}">Продукт</a>
                        </li>
                        <li class="{{ request()->is('admin/categories/create') ? 'uk-active' : '' }}">
                            <a href="{{ route('categories.create') }}">Категорию</a></li>
                        <li class="{{ request()->is('admin/manufacturers/create') ? 'uk-active' : '' }}">
                            <a href="{{ route('manufacturers.create') }}">Производителя</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li><a href="{{ route('index') }}" target="_blank">Перейти на сайт</a></li>
        </ul>
    </div>
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                Выйти
            </a>  </li>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
    </div>
</nav>
<!-- sidebar -->
<div id="offcanvas-nav" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <ul class="uk-nav uk-nav-default">
            <li class="uk-active"><a href="{{ route('products.index') }}">Продукция</a></li>
            <li class="uk-parent">
                <a href="#">Ссылка</a>
                <ul class="uk-nav-sub">
                    <li><a href="#">Ссылка</a></li>
                    <li><a href="#">Ссылка</a></li>
                </ul>
            </li>
            <li class="uk-nav-header">Заголовок</li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Пользовтели</a></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Ссылка</a></li>
            <li class="uk-nav-divider"></li>
            <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Ссылка</a></li>
        </ul>
    </div>
</div>