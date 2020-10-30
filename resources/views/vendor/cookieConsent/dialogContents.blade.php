<div class="js-cookie-consent cookie-consent">

    <div class="cookie-consent__wrap">
        <span class="cookie-consent__message">
            {!! trans('cookieConsent::texts.message', ['link' => '<a href="">файлы cookie</a>']) !!}
        </span>
    
        <div class="cookie-consent__buttons">
            <button class="js-cookie-consent-agree cookie-consent__agree">
                {!! trans('cookieConsent::texts.agree') !!}
            </button>
            <a  class="js-cookie-consent-disagree cookie-consent__disagree">
                Отклонить
            </a>
        </div>
    </div>

</div>
