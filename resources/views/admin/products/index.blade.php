@extends('admin.home')

@section('admincontent')



    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><span>Продукция</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Продукция</h2>
        <div class="uk-flex uk-flex-column">

            @if(session()->get('success'))
                <div class="uk-alert-success uk-width-1-2" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    {{ session()->get('success') }}  
                </div>
            @endif
            @if (isset($products))
            @foreach ($products as $product)
                <div class="uk-card">
                    <div class="uk-card-body">
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
                            
                            <div class="uk-padding-small uk-padding-remove-left uk-padding-remove-right">
                                {!! Str::words( $product->description, 17) !!}
                            </div>
                            
                            @if ($product->product_price != 0)
                                <p class="uk-text-lead uk-text-small">Цена: {{ $product->product_price }} рублей/тонна</p>
                            @else
                                <p class="uk-text-lead uk-text-small">Цена договорная</p>
                            @endif
                            
                            <span class="uk-text-lead">Категория:
                                @forelse ($product->categories as $category)
                                    <a href="{{ route('categories.show', $category->category_alias) }}"> {{ $category->category_name }} </a>
                                    @empty
                                        <span>Без категории</span>
                                @endforelse
                            </span>
                        </article>
                    </div>
                    <!-- /.uk-card-body -->
                    <hr>
                </div>
                <!-- /.uk-card -->
            @endforeach
                
            @endif
        </div>
        <!-- /.uk-flex -->
    </div>
    <!-- /.uk-container -->    

@endsection