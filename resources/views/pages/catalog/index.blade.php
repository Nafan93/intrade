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
    <div uk-grid>
        <div class="uk-width-1-4@m">
            @include('pages.layouts.filter')
        </div>
        <div class="uk-width-expand@m">
            <div class="catalog">
            @forelse ($products as $product)
                <div class="catalog-card__body">
    
                    <article class="uk-article ">
                        <div class="uk-article-title">
                            <a href="{{ route('productShow', $product->alias) }}"> <h3>{{ $product->name }}</h3></a>
                        </div>
                        <!-- /.uk-article-title -->
                        
                        <div class="uk-text-lead uk-text-meta">Категория:
                            @forelse ($product->categories as $category)
                                <span class="uk-text-lead uk-text-meta"> {{ Str::lower($category->category_name) }} </span>
                                @empty
                                    <span class="uk-text-lead uk-text-meta">Без категории</span>
                            @endforelse
                        </div>
                        <div class="uk-text-lead uk-text-meta">Производители:
                            @forelse ($product->manufacturers as $manufacturer)
                                <span class="uk-text-lead uk-text-meta"> {{ $manufacturer->name }} </span>
                                @empty
                                    <span class="uk-text-lead uk-text-meta"> Производитель не указан </span>
                            @endforelse
                        </div>   
                        <!-- /.uk-article-meta -->
                        <p class="uk-text-small">{{ Str::words( $product->description, 17) }}</p>
                        <p class="uk-text-bold">от {{ $product->product_price }} рублей/тонна</p>
                    
                    </article>
                </div>
                <!-- /.catalog-card__body -->
                @empty
                <span>Ничего нет. Попробуте изменить параметры фильтра.</span>
            @endforelse
        </div>
        <!-- /.catalog -->  </div>
    </div>

@endsection

