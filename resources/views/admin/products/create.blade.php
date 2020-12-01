@extends('admin.home')


@section('admincontent')
    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><a href="{{ route('products.index') }}">Продукция</a></li>
                <li><span>Добавление продукта</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Добавление продукта</h2>
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
                    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="uk-margin">
                            <div class="uk-inline">    
                                <input type="text" class="uk-input uk-form-width-large" name="name" placeholder="Название"/>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-inline">
                                <div class="js-upload" uk-form-custom>
                                    <input type="file" name="image" multiple>
                                    <button class="uk-button uk-button-default" type="button" tabindex="-1">Изображение</button>
                                </div>
                            </div> 
                        </div>
                        <div class="uk-flex uk-flex-between uk-flex-bottom">
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <button class="uk-button uk-button-default" type="button">Категория</button>
                                    <div uk-dropdown="mode: click" style="width: 100%" class="uk-width-large">
                                        <a href="{{ route('categories.create') }}">Добавить категорию</a>
                                        <hr>
                                        @foreach ($categories as $category)
                                            <div class="controls">
                                                <input type="checkbox"  value="{{ $category->id }}" name="categories[]" class="uk-checkbox">
                                                <label for="" class="uk-form-label">{{ $category->category_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <button class="uk-button uk-button-default" type="button">Производитель</button>
                                    <div uk-dropdown="mode: click"  style="width: 200%">
                                        <a href="{{ route('manufacturers.create') }}">Добавить производителя</a>
                                        <hr>
                                        @foreach ($manufacturers as $manufacturer)
                                            <div class="controls">
                                                <input type="checkbox"  value="{{ $manufacturer->id }}" name="manufacturers[]" class="uk-checkbox">
                                                <label for="" class="uk-form-label">{{ $manufacturer->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.uk-flex uk-flex-between -->
                        
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <textarea type="text" class="uk-textarea uk-form-width-large" name="description" rows=10 placeholder="Описание"></textarea>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <input type="text" class="uk-input uk-form-width-large" name="product_price" placeholder="Цена"/>
                            </div>
                        </div>
                        <div class="uk-flex uk-flex-center" style="align-items: flex-end">
                            <hr class="uk-divider-small">
                            <span class="uk-text-lead uk-margin-left uk-margin-right">SEO</span>
                            <hr class="uk-divider-small">
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <input type="text" class="uk-input uk-form-width-large" name="meta_keywords" placeholder="Meta keywords"/>
                            </div>  
                        </div>    
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <input type="text" class="uk-input uk-form-width-large" name="meta_description" placeholder="Meta description"/>
                            </div>  
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <label for="meta_title">Показывать на главной</label>
                                <input type="checkbox" class="uk-checkbox" name="show_on_home"
                                    value="{{ old('show_on_home', isset($product->show_on_home) ? 'checked' : '1') }}"/>
                            </div>  
                        </div>                       
                        <button type="submit" class="uk-button uk-button-primary">Добавить</button>
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
