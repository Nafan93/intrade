<h4>Новая заявка на {{ $product }} с сайта {{ config('app.url') }}</h4>

<p>Пользователь {{ $name }}, 
    @if ($email != null)
        адрес электронной почты <a href="mailto:{{ $email }}">{{ $email }}</a>, 
    @endif
    @if ($phone != null)
            номер телефона <a href="tel:{{ $phone }}">{{ $phone }}</a>, 
    @endif
    оставил заявку на {{ $product }}
</p>
