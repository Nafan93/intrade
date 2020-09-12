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
@endsection