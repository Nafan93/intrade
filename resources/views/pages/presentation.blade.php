@extends('layouts.app')
<div class="uk-container">
    <div class="uk-padding uk-padding-remove-left uk-padding-remove-right">
        <h1 class="uk-heading-medium uk-text-uppercase uk-text-bold">Презентация сайта 
            <a href="{{ route('index') }}" target="_blank">ООО "Интрейд"</a> 
        </h1>
    </div>
    <article class="uk-article">
       
        <p class="uk-text-lead">
           <a class="uk-button uk-botton-text" href="{{ route('index') }}" target="_blank">
            Перейти на сайт 
        </a>
        </p>
    </article>
    <article class="uk-article">
        <h3 class="uk-article-title uk-text-uppercase">1. Концепция сайта</h3>
        <p class="uk-text-lead">
            Часто сайт – это первое знакомство клиента с компанией. 
            Поэтому в работе над концепцией закладывались такие понятия как надежность, 
            доступность, профессионализм, внимание к деталям. Декоративные элементы, 
            текстуры и цветовая гамма придают сайту большую респектабельность.
        </p>
    </article>

    <article class="uk-article">
        <h3 class="uk-article-title uk-text-uppercase">2. Отображение на различных устройствах</h3>
        <p class="uk-text-lead">
            Доступность — один из главных принципов этого сайта. 
            Гибкое масштабирование для всех типов устройств: лэптопов, планшетов,
            смартфонов включает не только оптимальное изменение пропорций, но и учитывает
            особенности различных моделей управления интерфейсом.
        </p>
        <img src="{{ asset('images/presentation/devices.png') }}" alt="">
    </article>

    <article class="uk-article">
        <h3 class="uk-article-title uk-text-uppercase">3. Навигация</h3>
        <p class="uk-text-lead">
            Навигация по сайту осуществляется с помощью основного меню, которое реализовано 
            в компактном виде вверху страницы, которое позволяет практично 
            использовать пространство экрана.
        </p>
        <p class="uk-text-lead">
            На страницах каталога присутствует поиск по названию товара и расширенный фильтр, 
            с возможностью фильтрации по категориям, производителям и цене.
        </p>
       <img src="{{ asset('images/presentation/filter.png') }}" alt="">
    </article>
    <article class="uk-article">
        <h3 class="uk-article-title uk-text-uppercase">4. Заказ прайс-листа</h3>
        <p class="uk-text-lead">
            На первом экране главной страницы сайта реализована кнопка заказа прайс-листа.
        </p>
        <p class="uk-text-lead">
            Во время оформления заявки пользователь оставляет в полях формы свое имя, номер 
            телефона и адрес электронной почты. 
            Данные формы отправляются на почтовые адреса всех зарегистрированных пользователей
            сайта с ролью "Администрантор" а также в телеграм бот 
            <a class="uk-link-muted" target="_blank" href="https://t.me/IntradeBackOfficeBot">@IntradeBackOfficeBot</a>
        </p>
        <p class="uk-text-lead">
            Прайс-лист формируется автоматически и отправляется по указанному пользователем адресу
            электронной почты.
        </p>
    </article>
    <article class="uk-article">
        <h3 class="uk-article-title uk-text-uppercase">5. Заказ коммерческого предложения</h3>
        <p class="uk-text-lead">
            Заказ коммерческого предложения по продукту аналогичен заказу прайс-листа.
        </p>
        <p class="uk-text-lead">
            Во время оформления заявки пользователь оставляет в полях формы свое имя, номер 
            телефона и адрес электронной почты. 
            Данные формы отправляются на почтовые адреса всех зарегистрированных пользователей
            сайта с ролью "Администрантор" а также в телеграм бот 
            <a class="uk-link-muted" target="_blank" href="https://t.me/IntradeBackOfficeBot">@IntradeBackOfficeBot</a>
        </p>
    </article>
    <article class="uk-article">
        <h3 class="uk-article-title uk-text-uppercase">6. телеграм бот</h3>
        <p class="uk-text-lead">
            Телеграм бот служит для оперативного информирования администраторов о действиях 
            пользователя на сайте. 
            Для запуска бота необходимо в разделе "Пользователи" панели управления сайтом внести
            изменения в поле "Chat_ID". Chat_ID представляет собой девятизначное цифровое 
            уникальное значение, присвоенное полльзователю при регистрации аккаунта.
            Что бы узнать Chat_ID нужно написать боту   
            <a class="uk-link-muted" target="_blank" href="https://t.me/chatid_echo_bot">@chatid_echo_bot</a>
            в ответном сообщении бот пришлет Chat_ID
        </p>
    </article>
    <article class="uk-article">
        <h3 class="uk-article-title uk-text-uppercase">7. Онлайн чат </h3>
        <p class="uk-text-lead">
            На сайте реализован онлан чат, который позволяет общаться с посетителями,
            отвечать на их вопросы, помогать выбрать товары и оформлять заказы. 
            Наличие чата повышает конверсию, т.е. число заказов.
            Операторы чата могут общаться с пользователями сайта чераз телеграм бота Re:plain.
        </p>

    </article>
    <article class="uk-article">
        <h3 class="uk-article-title uk-text-uppercase">8. SSL сертификат </h3>
        <p class="uk-text-lead">
            SSL – это защищённый протокол. Данный протокол обеспечивает шифрование 
            информации между браузером и сервером. 
        </p>
        <p class="uk-text-lead">
            Зачем нужен сертифик та сайте: <br>
            <ul class="uk-list uk-list-bullet uk-text-lead">
                <li>Доверие посетителей;</li>
                <li>Поисковые системы в выдаче отдают предпочтение сайтам с сертификатом;</li>
                <li>Защищенное соединение.</li>
            </ul>
        </p>
        <img src="{{ asset('images/presentation/ssl.png') }}" alt="">
        <p class="uk-text-lead">
           На сайте реализован бесплатный автообновляемый сертификат от сертификационного центра 
           <a class="uk-link-muted" target="_blank" href="https://letsencrypt.org/">Let’s Encrypt</a>
        </p>
    </article>
    <article class="uk-article">
        <h3 class="uk-article-title uk-text-uppercase">9. Панель управления </h3>
        <p class="uk-text-lead">
            Доступ к панели управления доступен только зарегистрированным пользователям с ролью
            "Администратор" по ссылке 
            <a class="uk-link-muted" target="_blank" href="{{ route('admin') }}">https://intrade.infantyev.ru/dashboard</a>
        </p>
        <p class="uk-text-lead">
            В панели управления можно создавать, редактировать и удалять продукцию, категории, производителей
            и пользователей. Просматривать заявки.
        </p>
    </article>
    <article class="uk-article">
        <h3 class="uk-article-title uk-text-uppercase">10. Стоимость содержания </h3>
        <p class="uk-text-lead">
            Для работы сайта требуется VDS сервервер с минимальными хараетеристиками:
            <ul class="uk-list uk-list-bullet uk-text-lead">
                <li>Процессор - 1*2.8ГГц</li>
                <li>Оперативная память - 2Гб</li>
                <li>Дисковое пространство - 30Гб</li>
            </ul>
        </p>
        <p class="uk-text-lead">
            Данная версия сайта выгружена на VDS сервер компании 
            <a class="uk-link-muted" target="_blank"  href="https://timeweb.com/">TimeWeb.</a>
            Стоимость аренды виртуального сервера с этой кофигурацией 4202 рубля в год.
        </p>
    </article>
    
</div>
<!-- /.container -->