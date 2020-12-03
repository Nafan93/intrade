@extends('layouts.app')

    @section('content')  
        @include('layouts.sections.navbar')
        @include('layouts.sections.header')
        <main>
            @include('layouts.sections.about')
            @include('layouts.sections.products')
            @include('layouts.sections.advantages')
            @include('layouts.sections.partners')
            @include('layouts.sections.contacts') 
        </main>
        <a href="#" id="totop" uk-totop uk-scroll></a>
        <!-- /main -->
    @endsection
