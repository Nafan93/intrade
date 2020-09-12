@extends('layouts.app')
@section('content')
    <header >
        @include('layouts.navbar')
    </header>
    <!-- /.header -->
    <main>
        <div class="container">
            <div class="container__wrap">
                @yield('pagecontent')
            </div>
            <!-- /.container__wrap -->
        </div>
        <!-- /.container -->
    </main>
    <!-- /.main -->
@endsection
