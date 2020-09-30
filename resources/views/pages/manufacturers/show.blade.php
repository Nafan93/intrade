@extends('pages.layouts.page')
@section('pagecontent')
    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('index') }}">Главная</a></li>
                <li><a href="{{ route('manufacturers') }}">Производители</a></li>
                <li><span>{{ $manufacturer->name }}</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Продукция производителя {{ $manufacturer->name }}</h2>
        @forelse ($manufacturer->products as $product)
            <article class="uk-article">
                <div class="uk-article-title uk-flex uk-flex-between uk-flex-middle">
                    <a class="uk-link-reset" href="{{ route('productShow', $product->alias) }}">{{ $product->name }}</a>
                </div>
                <span class="uk-text-lead uk-text-meta">Категория:
                    @forelse ($product->categories as $category)
                        <a href="{{ route('categoryShow', $category->category_alias) }}"> {{ $category->category_name }} </a>
                        @empty
                            <span>Без категории</span>
                    @endforelse
                </span>
                <span class="uk-text-lead uk-text-meta">Производители:
                    @forelse ($product->manufacturers as $manufacturer)
                        <a href="{{ route('manufacturerShow', $manufacturer->manufacturer_alias) }}"> {{ $manufacturer->name }} </a>
                        @empty
                            <span>  </span>
                    @endforelse
                </span>      
                <p class="uk-text-lead"> {!! $product->description !!} </p>
            
                <button class="uk-button uk-button-primary">Подробнее</button>
            </article>
            <hr>
            {{-- Если ничего нет --}}
        @empty
            <span>Здесь пока ничего нет</span>
        @endforelse
    </div>
    <!-- /.uk-container -->    
@endsection