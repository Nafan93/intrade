@extends('pages.layouts.page')
@section('pagecontent')
    <div aria-label="breadcrumb">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li><a href="{{ route('catalog') }}">Каталог</a></li>
            <li><span>{{ $product->name }}</span></li>
        </ul>
    </div>
    <!-- /.breadcrumb -->
    @if (isset($product))
        <h2>{{ $product->name }}</h2>
        
        @foreach ($product->categories as $category)
            <div class="">
                <span> {{ $category->category_name }} </span>
            </div>
        @endforeach
        <div class="">
            <p href="">{{ $product->desc }}</p>
        </div>
        <div class="">
            <span>от {{ $product->product_price }} р/т</span>
        </div>
        @foreach ($product->manufacturers as $manufacturer)
            <div class="">
                <span> {{ $manufacturer->name }} </span>
            </div>
        @endforeach
        <div class="">
            <a href="" class="btn product-card-footer__btn">Оставить заявку</a>
        </div>
    @endif
@endsection
