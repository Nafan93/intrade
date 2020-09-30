@extends('pages.layouts.page')

@section('pagecontent')
    <div aria-label="breadcrumb">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li><span>Категории</span></li>
        </ul>
    </div>
    <!-- /.breadcrumb -->
    <h2>Категории</h2>
    @forelse ($categories as $category)
    
        <div class="uk-card">
            <div class="uk-card-body">
                <a href="{{ route('categoryShow', $category->category_alias) }}"> {{ $category->category_name }} </a>
                <div>
                    <a href="{{ route('categoryShow', $category->category_alias) }}" class="uk-button uk-button-primary">Подробнее</a>
                </div>
            </div>
            <!-- /.uk-card-body -->
           
        </div>
        <!-- /.uk-card -->
        <hr>
    @empty
        <span>Здесь пок ничего нет</span>
    @endforelse
@endsection