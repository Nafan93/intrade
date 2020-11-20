@extends('pages.layouts.page')

@section('title', $doc->meta_title)
@section('description', $doc->meta_description)
@section('keywords', $doc->meta_keywords)

@section('pagecontent')
    <div aria-label="breadcrumb">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('index') }}">Главная</a></li>
            <li><a href="{{ route('docs') }}">Документы</a></li>
            <li><span>{{ $doc->name }}</span></li>
        </ul>
    </div>
    <!-- /.breadcrumb -->
    @if (isset($doc))
        
        <article class="uk-article">
            <div class="uk-article-title uk-flex uk-flex-between uk-flex-middle">
                <span class="uk-link-reset" >{{ $doc->name }}</span>
            </div>
            <div>
                <p class="uk-text-lead uk-text-small"> {{ $doc->content }} </p>
            </div>
        </article>
     
    @endif
   
@endsection
