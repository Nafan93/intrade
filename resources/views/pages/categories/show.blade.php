@extends('pages.layouts.page')

@section('pagecontent')
    <div aria-label="breadcrumb">
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('index') }}">Главная</a></li>
        <li><a href="{{ route('categories') }}">Категории</a></li>
        <li><span>{{ $category->category_name }}</span></li>
    </ul>
    </div>
    <!-- /.breadcrumb -->
    <h2>Продукция в категории {{ $category->category_name }}</h2>
    @forelse ($category->products as $product)
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
                <p class="uk-text-lead"> {!! Str::words( $product->description, 17) !!} </p>
            
                <a href="{{ route('productShow', $product->alias) }}" class="uk-button uk-button-primary">Подробнее</a>
            </article>
            <hr>
            {{-- Если ничего нет --}}
        @empty
            <span>Здесь пока ничего нет</span>
        @endforelse
@endsection