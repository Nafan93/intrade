@extends('admin.home')

@section('admincontent')



    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Админпанель</a></li>
                <li><span>Пользователи</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Пользователи</h2>
        <div class="uk-flex uk-flex-column">

            @if(session()->get('success'))
                <div class="uk-alert-success uk-width-1-2" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    {{ session()->get('success') }}  
                </div>
            @endif
           <div class="uk-grid uk-width-1-1">
              <div class="uk-card uk-card-body uk-width-1-6">№</div>
              <div class="uk-card uk-card-body uk-width-1-6">Имя</div>
              <div class="uk-card uk-card-body uk-width-1-6">Роли</div>
              <div class="uk-card uk-card-body uk-width-1-6">Email</div>
              <div class="uk-card uk-card-body uk-width-1-6"></div>
              <div class="uk-card uk-card-body uk-width-1-6"></div>
              @foreach ($users as $user)
                <div class="uk-card uk-card-body uk-width-1-6">{{ $user->id }}</div>
                <div class="uk-card uk-card-body uk-width-1-6">{{ $role->user }}</div>
                <div class="uk-card uk-card-body uk-width-1-6">{{ $user->name }}</div>
                <div class="uk-card uk-card-body uk-width-1-6">{{ $user->email }}</div>
                
                <div class="uk-card uk-card-body uk-width-1-6">
                    <a href="{{ route('users.edit', $user->id) }}" class="uk-button uk-button-primary">Редактировать</a>
                </div>
                <div class="uk-card uk-card-body uk-width-1-6">
                    <a href="#" class="uk-button uk-button-danger">Удалить</a>
                </div>
              @endforeach
           </div>
          
                
         
        </div>
        <!-- /.uk-flex -->
    </div>
    <!-- /.uk-container -->    

@endsection