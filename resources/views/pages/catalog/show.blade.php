@extends('pages.layouts.page')

@section('title', $product->meta_title)
@section('description', $product->meta_description)
@section('keywords', $product->meta_keywords)

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
        
        <article class="uk-article">
            <div class="uk-article-title uk-flex uk-flex-between uk-flex-middle">
                <span class="uk-link-reset" >{{ $product->name }}</span>
            </div>
            <span class="uk-text-lead uk-text-meta">Категория:
                @forelse ($product->categories as $category)
                    <span class="uk-text-lead uk-text-meta"> {{ Str::lower($category->category_name) }} </span>
                    @empty
                        <span class="uk-text-lead uk-text-meta">Без категории</span>
                @endforelse
            </span>
            @if (isset($product->manufacturers))
                <span class="uk-text-lead uk-text-meta">Производители:
                    @forelse ($product->manufacturers as $manufacturer)
                        <span class="uk-text-lead uk-text-meta"> {{ $manufacturer->name }} </span>
                        @empty
                            <span class="uk-text-lead uk-text-meta">Производитель не указан</span>
                    @endforelse
                </span>
            @endif
            <div class="uk-margin-top uk-flex">
                @if (isset($product->image))
            <div class="uk-width-1-3 uk-margin-right">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 200px">
            </div>  
            @endif    
            <div>
                <span class="label ">Описание</span>
                <p class="uk-text-lead uk-text-small"> {!! $product->description !!} </p>
                <p class="uk-text-lead uk-text-small">Цена: {{ $product->product_price }} рублей/тонна</p>
                <div class="uk-flex uk-flex-middle uk-flex-column uk-margin-top">
                    @if (isset($product->sertificates))
                    <span class="uk-text-lead">Сертификаты</span>
                    @endif
                    <div class="uk-flex uk-flex-around uk-width-1-2 uk-margin-top">
                        @forelse ($product->sertificates as $sertificate)
                        <a href="{{ $sertificate->file }}" target="_blank" class="uk-flex uk-flex-column uk-flex-middle">
                            <img src="{{ $sertificate->prew }}" alt="{{ $sertificate->title }}" class="uk-padding-small" style="width: 98px">
                            <span>{{ $sertificate->title }}</span>
                        </a>
                        @empty
                        <span></span>
                        @endforelse
                    </div>
                    
                </div>
                <div class="uk-margin-top">
                    <a href="#modal-product" class="uk-button uk-button-primary" uk-toggle>Оставить заявку</a>
                </div>
            </div>
            </div>
        </article>
        <modal-catalog-product :id="{{ $product->id }}"></modal-catalog-product>
    @endif
   
@endsection
