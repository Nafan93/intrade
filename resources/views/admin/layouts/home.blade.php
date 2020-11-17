@extends('admin.home')


@section('admincontent')
    
       <div class="uk-container uk-padding">
        <h2>Панель управления</h2>

        <a href="{{ route('products.index') }}">Продукция</a>
        <a href="{{ route('categories.index') }}">Категории</a>
        <a href="{{ route('manufacturers.index') }}">Производители</a>
       </div>
       <!-- /.uk-container uk-padding -->

@endsection
