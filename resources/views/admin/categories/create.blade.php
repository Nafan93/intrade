@extends('admin.home')


@section('admincontent')
    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><a href="{{ route('categories.index') }}">Категории</a></li>
                <li><span>Добавление категории</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Добавление категории</h2>
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
            
                    <form method="post" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="uk-margin">
                            <div class="uk-inline">    
                                <input type="text" class="uk-input uk-form-width-large" name="category_name" placeholder="Название"/>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <input type="text" class="uk-input uk-form-width-large" name="category_img" placeholder="Изображение"/>
                            </div>
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
