@extends('pages.layouts.page')

@section('pagecontent')
    <div aria-label="breadcrumb">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li><span>Каталог</span></li>
        </ul>
    </div>
    <!-- /.breadcrumb -->
    <div class="uk-margin-top uk-margin-medium-bottom">
        <h2>Каталог</h2>
    </div>
    <div class="catalog uk-margin-top">
        @foreach ($products as $product)
            <div class="catalog-card__body">

                <article class="uk-article ">
                    <div class="uk-article-title">
                        <a href="{{ route('productShow', $product->alias) }}"> <h3>{{ $product->name }}</h3></a>
                    </div>
                    <!-- /.uk-article-title -->
                    
                    <div class="uk-text-lead uk-text-meta">Категория:
                        @forelse ($product->categories as $category)
                            <a href="{{ route('categories.index') }}"> {{ $category->category_name }} </a>
                            @empty
                                <span>Без категории</span>
                        @endforelse
                    </div>
                    <div class="uk-text-lead uk-text-meta">Производители:
                        @forelse ($product->manufacturers as $manufacturer)
                            <a href="{{ route('manufacturers.show', $manufacturer->manufacturer_alias) }}"> {{ $manufacturer->name }} </a>
                            @empty
                                <span>  </span>
                        @endforelse
                    </div>   
                    <!-- /.uk-article-meta -->
                    <p class="uk-text-small">{{ Str::words( $product->description, 17) }}</p>
                    <p class="uk-text-bold">от {{ $product->product_price }} рублей/тонна</p>
                
                    <div class="catalog-card__footer uk-margin-top">
                        <a href="" class="uk-button uk-button-primary" >Оставить заявку</a>
                    </div>
                </article>
            </div>
            <!-- /.catalog-card__body -->
        @endforeach
    </div>
    <!-- /.catalog -->  

@endsection

