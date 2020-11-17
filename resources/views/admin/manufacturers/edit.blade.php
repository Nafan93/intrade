@extends('admin.home')


@section('admincontent')
    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><a href="{{ route('manufacturers.index') }}">Производители</a></li>
                <li><span>{{ $manufacturer->name }}</span></li>
                <li><span>Редактирование</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Редактирование {{ $manufacturer->name }}</h2>
        @if ($errors->any())
            <div class="uk-alert-danger uk-width-1-2" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <ul class="uk-list">    
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="uk-card">
            <div class="uk-card-body">
                <div class="uk-flex uk-flex-center">
                    <form method="post" action="{{ route('manufacturers.update', $manufacturer->id) }}">
                        @method('PATCH') 
                        {{ csrf_field() }}
                        <div class="uk-margin">
                            <div class="uk-inline">    
                                <input type="text" class="uk-input uk-form-width-large" value="{{ $manufacturer->name }}" name="name" placeholder="Название"/>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <textarea type="text" class="uk-textarea uk-form-width-large" name="desc" rows=10 placeholder="Описание">
                                    {!! $manufacturer->desc !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <label for="products">Продукция</label>
                                <button class="uk-button uk-button-default" type="button">Выберите...</button>
                                <div uk-dropdown="mode: click" style="width: 100%">
                                    <a href="{{ route('products.create') }}">Добавить продукцию</a>
                                    <hr>
                                    @foreach ($products as $product)
                                        <div class="controls">
                                            <input type="checkbox" name="products[]" value="{{ $product->id ?? '' }}"
                                                @isset($product->id)   
                                                    @if ($manufacturer->products->contains('id', $product->id))
                                                        checked
                                                    @endif
                                                @endisset
                                            class="uk-checkbox">
                                            <label for="" class="uk-form-label">{{ $product->name }}</label>
                                        </div>
                                        
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <input type="text" class="uk-input uk-form-width-large" value="{{ $manufacturer->site }}" name="site" placeholder="Сайт"/>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <input type="text" class="uk-input uk-form-width-large" value="{{ $manufacturer->meta_keywords }}" name="meta_keywords" placeholder="Meta keywords"/>
                            </div>  
                        </div>    
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <input type="text" class="uk-input uk-form-width-large" value="{{ $manufacturer->meta_description }}" name="meta_description" placeholder="Meta description"/>
                            </div>  
                        </div>
                                             
                        <button type="submit" class="uk-button uk-button-primary">Изменить</button>
                    </form>
        
                </div>
                <!-- /.uk-flex -->
            </div>
            <!-- /.uk-card-body -->
        </div>
        <!-- /.uk-card -->
    </div>
    <!-- /.uk-container -->    

@endsection
