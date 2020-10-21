@extends('admin.home')

@section('admincontent')



    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Админпанель</a></li>
                <li><a href="{{ route('users.index') }}">Пользователи</a></li>
                <li><span>Редактирование пользователя {{ $user->name }}</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Редактирование пользователя {{ $user->name }}</h2>
        <div class="uk-flex uk-flex-column">

            @if(session()->get('success'))
                <div class="uk-alert-success uk-width-1-2" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    {{ session()->get('success') }}  
                </div>
            @endif
           
            <div class="uk-card"> 
                <div class="uk-card-body">
                    <div class="uk-flex uk-flex-center">
                        <form method="post" action="{{ route('users.update', $user->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="uk-margin">
                                <div class="uk-inline">    
                                    <input type="text" class="uk-input uk-form-width-large" value="{{ $user->name }}" name="name" placeholder="Имя" disabled/>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <input type="text" class="uk-input uk-form-width-large" value="{{ $user->email }}" name="e-mail" placeholder="E-mail" disabled/>
                                </div>  
                            </div>    
                            
                                                
                            <button type="submit" class="uk-button uk-button-primary">Применить</button>
                        </form>
            
                    </div>
                    <!-- /.uk-flex -->
                </div>
                <!-- /.uk-card-body -->
            </div>
            <!-- /.uk-card -->
          
                
         
        </div>
        <!-- /.uk-flex -->
    </div>
    <!-- /.uk-container -->    

@endsection

