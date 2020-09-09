@extends('layouts.app')

    @section('content')  
        @include('layouts.sections.navbar')
        @include('layouts.sections.header')
        @include('layouts.sections.about')
        @include('layouts.sections.products')
        @include('layouts.sections.advantages')
        @include('layouts.sections.partners')
        @include('layouts.sections.contacts')
    @endsection
