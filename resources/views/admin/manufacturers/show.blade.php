@extends('admin.home')


@section('admincontent')
    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><a href="{{ route('manufacturers.index') }}">Производители</a></li>
                <li><span>{{ $manufacturer->name }}</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Продукция производителя {{ $manufacturer->name }}</h2>
        @forelse ($manufacturer->products as $product)
            <article class="uk-article">
                <div class="uk-article-title uk-flex uk-flex-between uk-flex-middle">
                    <a class="uk-link-reset" href="{{ route('products.show', $product->alias) }}">{{ $product->name }}</a>
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
                        <a href="{{ route('categories.index') }}"> {{ $manufacturer->name }} </a>
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