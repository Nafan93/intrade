@extends('layouts.app')
@include('layouts.navbar')
@foreach ($categories as $category)
    <div class="">{{ $category->category_name }}</div>
@endforeach