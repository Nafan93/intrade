@extends('admin.home')


@section('admincontent')
    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Админпанель</a></li>
                <li><a href="{{ route('products.index') }}">Продукция</a></li>
                <li> <span> {{ $product->name }}</li>
                <li><span>Редактирование </span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Редактирование {{ $product->name }}</h2>
        <div class="uk-flex uk-flex-column">
            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <div class="uk-card">
            <div class="uk-card-body">
                <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @method('PATCH') 
                    @csrf
                    <div class="uk-margin">
                        <div class="">    
                            <label class="uk-form-label" for="name">Название</label>
                            <input type="text" class="uk-input uk-width-1-1" value="{{ $product->name }}" name="name"/>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <div class="js-upload" uk-form-custom>
                                <input type="file" id="image" name="image" multiple>
                                <button class="uk-button uk-button-default" type="button" tabindex="-1">Изображение</button>
                            </div>
                        </div> 
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <label for="categories">Категория</label>
                            <button class="uk-button uk-button-default" type="button">Выберите...</button>
                            <div uk-dropdown="mode: click" style="width: 100%">
                                <a href="{{ route('categories.create') }}">Добавить категорию</a>
                                <hr>
                                @foreach ($categories as $category)
                                    <div class="controls">
                                        <input type="checkbox" name="categories[]" value="{{ $category->id ?? '' }}"
                                            @isset($product->id)   
                                                @if ($product->categories->contains('id', $category->id))
                                                    checked
                                                @endif
                                            @endisset
                                        class="uk-checkbox">
                                        <label for="" class="uk-form-label">{{ $category->category_name }}</label>
                                    </div>
                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <label for="categories">Производители</label>
                            <button class="uk-button uk-button-default" type="button">Выберите...</button>
                            <div uk-dropdown="mode: click" style="width: 100%">
                                <a href="{{ route('manufacturers.create') }}">Добавить производителя</a>
                                <hr>
                                @foreach ($manufacturers as $manufacturer)
                                    <div class="controls">
                                        <input type="checkbox" name="manufacturers[]" value="{{ $manufacturer->id ?? '' }}"
                                            @isset($product->id)   
                                                @if ($product->manufacturers->contains('id', $manufacturer->id))
                                                    checked
                                                @endif
                                            @endisset
                                            class="uk-checkbox"/>
                                        <label for="" class="uk-form-label">{{ $manufacturer->name }}</label>
                                    </div>
                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <label for="description">Описание</label>
                            <textarea type="text" class="uk-textarea tinymce-editor" name="description">
                                {!! $product->description !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <label for="product_price">Цена</label>
                            <input type="text" class="uk-input" value="{{ $product->product_price }}" name="product_price"/>
                        </div>
                    </div>
                    
                    <div class="uk-flex uk-flex-center" style="align-items: flex-end">
                        <hr class="uk-divider-small">
                        <span class="uk-text-lead uk-margin-left uk-margin-right">SEO</span>
                        <hr class="uk-divider-small">
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <label for="meta_title">Meta keywords</label>
                            <input type="text" class="uk-input" value="{{ $product->meta_keywords }}" name="meta_keywords"/>
                        </div>  
                    </div>    
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <label for="meta_title">Meta description</label>
                            <input type="text" class="uk-input" value="{{ $product->meta_description }}" name="meta_description"/>
                        </div>  
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <label for="meta_title">Показывать на главной</label>
                            <input type="hidden" name="show_on_home" value="0">
                            <input type="checkbox" class="uk-checkbox" name="show_on_home"
                                    value='1' {{ old('$product->show_on_home') ? 'checked' : '' }}
                                        @if ($product->show_on_home === 1)
                                            checked
                                        @endif
                            />
                        </div>  
                    </div>                       
                    <button type="submit" class="uk-button uk-button-primary">Применить</button>
                </form>
            </div>
            <!-- /.uk-card-body -->
        </div>
        <!-- /.uk-card -->
    </div>
</div>
           
        </div>
        <!-- /.uk-flex -->
    </div>
    <!-- /.uk-container -->    

@endsection
