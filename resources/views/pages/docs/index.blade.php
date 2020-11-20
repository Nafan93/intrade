@extends('pages.layouts.page')

@section('title', 'Документы')
@section('description', 'Документы')
@section('keywords', 'Документы')

@section('pagecontent')
    <div aria-label="breadcrumb">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li><span>Документы</span></li>
        </ul>
    </div>
    <!-- /.breadcrumb -->
    @if (isset($docs))
        @forelse ($docs as $doc)
            <article class="uk-article">
                <div>
                    <a href="{{ route('showDoc', $doc->slug) }}" class="uk-text-lead uk-text-small">{{  $doc->name }} </p>
                </div>
            </article>
        @empty
            <span>Ничего нет.</span>
            <p>Вернуться на <a href="{{ route('index') }}" class="uk-button-link">главную</a></p>
        @endforelse
    @endif    
@endsection
