<h4>Добрый день,  {{ $name }}</h4>
<p>Вы заказывали прайс-лист на сате {{ config('app.url') }}</p>
<table border="1" cols="3" cellpadding="10">
    <thead>
        <tr>
            <th>Наменование</th>
            <th>Производитель</th>
            <th>Цена*</th>
            <th>Ссылка</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>
                    @foreach ($product->manufacturers as $manufacturer)
                        {{ $manufacturer->name }}
                    @endforeach
                </td>
                <td>{{ $product->product_price }}</td>
                <td>{{ url(route('productShow', $product->alias)) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>*Цена указана в рублях с учетом НДС, без стоимости доставки.</p> 
<p>Цена может измениться, пожалуйста, уточните актуальность у наших менеджеров</p> 

<p>С уважением, ООО "Интрейд"</p>
<p>
    <a href="tel:88613762108"> 8(861-37) 6-21-08,</a><br>
    <a href="tel:88613762109">  8(861-37) 6-21-09</a><br>
    <a href="tel:88007006398"> 8 (800) 700-63-98</a>
</p>
<p><a href="mailto:contact@intrade.ru">contact@intrade.ru</a></p>