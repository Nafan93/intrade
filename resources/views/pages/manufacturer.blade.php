@extends('pages.layouts.page')

@section('pagecontent')
    <div aria-label="breadcrumb">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li><span>Производители</span></li>
        </ul>
    </div>
    <!-- /.breadcrumb -->
    <h2>Производители</h2>
@endsection