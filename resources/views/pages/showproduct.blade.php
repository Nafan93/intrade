@extends('layouts.app')
@section('content')
    @if (isset($product))
       
            <div class="">
                <div class="">
                    <h1>{{ $product->name }}</h1>
                </div>
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
            </div>
            <!-- /.card -->
        
    @endif
@endsection