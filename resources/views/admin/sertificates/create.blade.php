@extends('admin.home')


@section('admincontent')
    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><a href="{{ route('products.index') }}">Продукция</a></li>
                <li><span>Добавление сертификата</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Добавление сертификата</h2>
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
                    <form method="post" action="{{ route('sertificates.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="uk-margin">
                            <div class="uk-inline">    
                                <input type="text" class="uk-input uk-form-width-large" id="title" name="title" placeholder="Название"/>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">    
                                <input type="text" class="uk-input uk-form-width-large" id="product_id" name="product_id" placeholder="Produc_id"/>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <div class="js-upload" uk-form-custom>
                                    <input type="file" name="prew" multiple>
                                    <button class="uk-button uk-button-default" type="button" tabindex="-1">Изображение</button>
                                </div>
                            </div> 
                        </div>
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <div class="js-upload" uk-form-custom>
                                    <input type="file" name="file" multiple>
                                    <button class="uk-button uk-button-default" type="button" tabindex="-1">Сертификат</button>
                                </div>
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
