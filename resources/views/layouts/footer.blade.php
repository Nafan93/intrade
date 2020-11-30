<div class="footer" uk-scrollspy="cls: uk-animation-fade; repeat: false">
    <div class="container">
        <div class="footer-wrap">
            <div class="footer_logo">
                <a href="{{ route('index') }}"><img src="{{ asset('/images/logo.svg') }}" alt="Интрейд лого"></a>
            </div>
            <div class="footer_menu">
                <div class="footer_menu__left"> 
                    <legend>Навигация</legend>
                    <div class="footer_menu_list">
                        @if (isset($menusf))
                        @foreach ($menusf as $menu)
                            <a href="{{ $menu->url }}"> {{ $menu->name }}</a>
                        @endforeach
                        @endif
                        <a href="{{ route('catalog') }}">Каталог продукции</a>
                    </div>
                </div>
               <!-- /.footer_menu__left -->
               <div class="footer_menu__middle">
                    <legend>Помощь</legend>
                    <div class="footer_menu_list">
                        <a href="/docs/privacy">Политика конфиденциальности</a>
                        <a href="/docs/terms">Пользовательское соглашение</a>
                        <a href='{{ url('sitemap.xml') }}' rel='alternate' title='Sitemap' type='application/rss+xml'>Карта сайта</a>
                        @auth 
                            <ul class="uk-navbar-nav">
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    Выйти
                                </a>  </li>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        @endauth 
                    </div>
               </div>
               <!-- /.footer_menu__middle -->
               <div class="footer_menu__right">
                    <legend>Контакты</legend>
                    <div class="footer_contacts_city">
                        <div class="footer_contacts_city__addres">
                            <div>
                                <i uk-icon="icon: location"></i>
                            </div>
                            <div>
                                <span>&nbsp;г. Армавир: 352922, ул. Новороссийская, дом 89, помещение 33-36</span>
                            </div>
                        </div>
                        <div class="footer_contacts_city__number">
                            <div>
                                <i uk-icon="icon: receiver"></i>
                            </div>
                            <div>
                                <a href="tel:+78613762108">&nbsp;8(861-37) 6-21-08, </a>
                                <a href="tel:+78613762109">&nbsp;8(861-37) 6-21-09</a>
                            </div>  
                        </div>
                    </div>
                    <div class="footer_contacts_city">
                        <div class="footer_contacts_city__addres">
                            <div>
                                <i uk-icon="icon: location"></i>
                            </div>
                            <div>
                                <span>&nbsp;г. Ставрополь: 355016, ул. Маршала Жукова, дом 8, офис 501</span>
                            </div>
                        </div>
                        <div class="footer_contacts_city__number">
                            <span uk-icon="icon: receiver"></span>
                            <a href="tel:+78652296398">&nbsp;8(865) 229-63-98, </a>
                            <a href="tel:+78652941650">&nbsp;8(865) 294-16-50 </a>
                        </div>
                    </div>
                    <div class="footer_contacts_work-time">
                        <i uk-icon="icon: clock"></i>
                        <span>&nbsp;ПН — ПТ 10:00 — 17:00 </span>    
                    </div>
                    
               </div>
               <!-- /.footer_menu__right -->
            </div>
        </div>
        <!-- /.footer-wrap -->
        <div class="footer_bottom">
            <div class="footer_reg-data">
                <div class="footer_reg-data_ogrn">
                    <span>ОГРН 1022601952581</span>
                </div>
                <!-- /.footer_reg-data_ogrn -->
                <div class="footer_reg-data_inn">
                    <span>ИНН 2635045294</span>
                </div>
                <!-- /.footer_reg-data_inn -->
            </div>
            <!-- /.footer_reg-data -->
            <div class="footer-copyright">
                <span>© ООО Интрейд, 1999 — {{ date('Y') }}</span>
    
            </div>
            <!-- /.footer-copyright -->
            
            
        </div>
        <!-- /.footer_bottom -->
        
    </div>
</div>