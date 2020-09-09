@extends('layouts.app')

    @section('content')        
       @foreach ($manufacturers as $manufacturer)
            <p>{{ $manufacturer->name }}
            <a href="#">{{ $manufacturer->product->name }}</a></p>

       @endforeach
    @endsection
