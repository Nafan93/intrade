@extends('admin.home')


@section('admincontent')
    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><a href="{{ route('categories.index') }}">Категории</a></li>
                <li><span>{{ $category->name }}</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Продукция в категории {{ $category->category_name }}</h2>
        @forelse ($category->products as $product)
            <article class="uk-article">
                <div class="uk-article-title uk-flex uk-flex-between uk-flex-middle">
                    <a class="uk-link-reset" href="{{ route('products.show', $product->alias) }}">{{ $product->name }}</a>
                </div>
                <span class="uk-text-lead uk-text-meta">Категория:
                    @forelse ($product->categories as $category)
                    <a href="{{ route('categories.show', $category->category_alias) }}"> {{ $category->category_name }} </a>
                        @empty
                            <span>Без категории</span>
                    @endforelse
                </span>
                <span class="uk-text-lead uk-text-meta">Производители:
                    @forelse ($product->manufacturers as $manufacturer)
                        <a href="{{ route('manufacturers.index') }}"> {{ $manufacturer->name }} </a>
                        @empty
                            <span>  </span>
                    @endforelse
                </span>      
                <p class="uk-text-lead"> {!! $product->description !!} </p>
            
                <p class="uk-text-lead">Цена: {{ $product->product_price }} рублей/тонна</p>
            </article>
            <hr>
            {{-- Если ничего нет --}}
        @empty
            <span>Здесь пока ничего нет</span>
        @endforelse
    </div>
    <!-- /.uk-container -->    
@endsection