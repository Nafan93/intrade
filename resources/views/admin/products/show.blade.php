@extends('admin.home')


@section('admincontent')
    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><a href="{{ route('products.index') }}">Продукция</a></li>
                <li><span>{{ $product->name }}</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        
        <article class="uk-article">
            <div class="uk-article-title uk-flex uk-flex-between uk-flex-middle">
                <span class="uk-link-reset" >{{ $product->name }}</span>
                <div class="uk-article-meta uk-flex uk-flex-around">
                    
                    <button class="uk-button uk-button-text uk-padding-right" type="button">
                        <a href="{{ route('products.edit', $product->id) }}" uk-icon="icon: file-edit" title="Редактировать"></a> 
                    </button>
                    <form action="{{ route('products.destroy', $product->id)}}" method="post" style="margin:0">
                        @csrf
                        @method('DELETE')
                        <button class="uk-button uk-button-danger uk-padding-remove uk-margin-left" type="submit" title="Удалить">
                            <span uk-icon="icon: close"></span>
                        </button>
                    </form>
                </div> 
                
            </div>
            <span class="uk-text-lead uk-text-meta">Категория:
                @forelse ($product->categories as $category)
                    <a href="{{ route('categories.index') }}"> {{ $category->category_name }} </a>
                    @empty
                        <span>Без категории</span>
                @endforelse
            </span>
            <span class="uk-text-lead uk-text-meta">Производители:
                @forelse ($product->manufacturers as $manufacturer)
                    <a href="{{ route('manufacturers.show', $manufacturer->manufacturer_alias) }}"> {{ $manufacturer->name }} </a>
                    @empty
                        <span>  </span>
                @endforelse
            </span>
            <div class="uk-margin-top uk-flex">
                @if (!empty($product->image))
            <div class="uk-width-1-3 uk-margin-right">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 200px">
            </div>  
            @endif    
            <div>
                <p class="uk-text-lead uk-text-small"> {{ $product->description }} </p>
                <p class="uk-text-lead uk-text-small">Цена: {{ $product->product_price }} рублей/тонна</p>
            </div>
            </div>
            <div class="uk-flex uk-flex-middle uk-flex-column uk-margin-top">
                @if (isset($product->sertificates))
                <span class="uk-text-lead">Сертификаты</span>
                @endif
                <div class="uk-flex uk-flex-around uk-width-1-2 uk-margin-top">
                    @forelse ($product->sertificates as $sertificate)
                       <div>
                        <a href="{{ $sertificate->file }}" target="_blank" class="uk-flex uk-flex-column uk-flex-middle">
                            <img src="{{ $sertificate->prew }}" alt="{{ $sertificate->title }}" class="uk-padding-small" style="width: 98px">
                            <span>{{ $sertificate->title }}</span>
                        </a>
                       </div>
                    @empty
                    <span>Здесь ничего нет. Но можно добавить</span>
                    @endforelse
                </div>
                <div class="uk-padding">
                    <a href="{{ route('sertificates.create', $product->id) }}" class="uk-button uk-button-primary">Добавить сертификат</a>
                </div>
                
            </div>
            
        </article>
            
    </div>
    <!-- /.uk-container -->    

@endsection