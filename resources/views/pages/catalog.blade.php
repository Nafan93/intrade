@extends('pages.layouts.page')

@section('pagecontent')
    <div aria-label="breadcrumb">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li><span>Каталог</span></li>
        </ul>
    </div>
    <!-- /.breadcrumb -->
    <h2>Каталог</h2>
    <div class="catalog">
        @foreach ($products as $product)
            <div class="catalog-card__body">
                <div class="catalog-card__title">
                    <a href="{{ route('productShow', $product->alias) }}"> <h3>{{ $product->name }}</h3></a>
                </div> 
                <!-- Category -->
                @foreach ($product->categories as $category)
                    <div class="catalog-card__category transparentText__small">
                        <a href="{{ $category->category_alias }}"> {{ $category->category_name }} </a>
                    </div>
                @endforeach
                <!--/ .Category --> 

                <div class="catalog-card__desc">
                    <p href="">{{ Str::words( $product->short_desc, 17) }}</p>
                </div>
                <div class="catalog-card__price">
                    <span>от {{ $product->product_price }} рублей/тонна</span>
                </div>

                <!-- Manufacturer -->
                @foreach ($product->manufacturers as $manufacturer)
                    <div class="catalog-card__manufacturer transparentText__small">
                        <a href="{{ route('manufacturerShow', $manufacturer->manufacturer_alias)}}"> {{ $manufacturer->name }} </span>
                    </div>
                @endforeach
                <!-- / .Manufacturer -->

                <div class="catalog-card__footer">
                    <a href="" class="btn catalog-card-footer__btn underline-text" >Оставить заявку</a>
                </div>
            </div>
            <!-- /.catalog-card__body -->
        @endforeach
    </div>
    <!-- /.catalog -->  

@endsection

