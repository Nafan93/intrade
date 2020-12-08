@extends('admin.home')

@section('admincontent')



    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><span>Заказы</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Заказы</h2>
        <div class="uk-flex uk-flex-column">

            @if(session()->get('success'))
                <div class="uk-alert-success uk-width-1-2" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    {{ session()->get('success') }}  
                </div>
            @endif
            <table class="uk-table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th></th>
                        <th>Почта</th>
                        <th>Телефон</th>
                        <th>Продукт</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($orders as $order)
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
                    <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                    <td><a href="{{ route('orders.show', $order->id) }}" class="uk-button uk-button-primary">Перейти</a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>

          
                
         
        </div>
        <!-- /.uk-flex -->
    </div>
    <!-- /.uk-container -->    

@endsection