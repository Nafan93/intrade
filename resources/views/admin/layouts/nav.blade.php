<!-- top nav -->
<nav class="uk-navbar-container" uk-navbar uk-sticky>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-nav"><span uk-icon="menu"></span></button>
            <a href="#offcanvas-nav"></a>
            <li class="{{ request()->is('dashboard/orders') ? 'uk-active' : '' }}"><a href="{{ route('orders.index') }}">Заявки</a></li>
            <li class="{{ request()->is('dashboard/*/create') ? 'uk-active' : '' }}">
                <a href="#">Добавить</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="{{ request()->is('dashboard/products/create') ? 'uk-active' : '' }}">
                            <a href="{{ route('products.create') }}">Продукт</a>
                        </li>
                        <li class="{{ request()->is('dashboard/categories/create') ? 'uk-active' : '' }}">
                            <a href="{{ route('categories.create') }}">Категорию</a></li>
                        <li class="{{ request()->is('dashboard/manufacturers/create') ? 'uk-active' : '' }}">
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
            <li class="{{ request()->is('dashboard/products/*') ? 'uk-active' : '' }}">
                <a href="{{ route('products.index') }}">Продукция</a>
            </li>
            <li class="{{ request()->is('dashboard/categories/*') ? 'uk-active' : '' }}">
                <a href="{{ route('categories.index') }}">Категории</a>
            </li>
            <li class="{{ request()->is('dashboard/manufactures/*') ? 'uk-active' : '' }}">
                <a href="{{ route('manufacturers.index') }}">Производители</a>
            </li>
            
            <li class="uk-nav-divider"></li>
            <li><a href="{{ route('users.index') }}"><span class="uk-margin-small-right" uk-icon="icon: user"></span> Пользовтели</a></li>
           
            
           
        </ul>
    </div>
</div>