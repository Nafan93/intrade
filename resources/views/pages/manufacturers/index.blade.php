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

    @forelse ($manufacturers as $manufacturer)
    
        <div class="uk-card">
            <div class="uk-card-body">
                <a href="{{ route('manufacturerShow', $manufacturer->manufacturer_alias) }}"> {{ $manufacturer->name }} </a>
               
                <div>
                    <a href="{{ route('manufacturerShow', $manufacturer->manufacturer_alias) }}" class="uk-button uk-button-primary">Подробнее</a>
                </div>
               
            </div>
            <!-- /.uk-card-body -->
           
        </div>
        <!-- /.uk-card -->
    @empty
        <span>Здесь пок ничего нет</span>
    @endforelse
@endsection