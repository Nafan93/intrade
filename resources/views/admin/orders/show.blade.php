@extends('admin.home')


@section('admincontent')
    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><a href="{{ route('orders.index') }}">Заказы</a></li>
                <li><span>Заказ № {{ $order->id }}</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Заказ № {{ $order->id }}</h2>
        <table class="uk-table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Почта</th>
                    <th>Телефон</th>
                    <th>Продукт</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>
                        @if (isset( $order->email))
                            {{ $order->email }}
                        @else
                            <span class="uk-text-center">-</span>
                        @endif
                    </td>
                    <td>
                        @if (isset( $order->phone))
                        {{ $order->phone }}
                        @else
                            <span class="uk-text-center">-</span>
                        @endif
                    </td>
                    <td>
                        @if (isset( $order->product))
                            {{ $order->product->name }}
                        @else
                            <span class="uk-text-center">All</span>
                        @endif
                    </td>
                    <td>{{ $order->status }}</td>
                    
                </tr>
            </tbody>
    </div>
    <!-- /.uk-container -->    
@endsection