@extends('admin.home')

@section('admincontent')



    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
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
           <div class="uk-grid uk-width-1-1@m">
              <div class="uk-card uk-card-body uk-width-1-6@m">№</div>
              <div class="uk-card uk-card-body uk-width-1-6@m">Имя</div>
              <div class="uk-card uk-card-body uk-width-1-6@m">Email</div>
              <div class="uk-card uk-card-body uk-width-1-6@m">Роль</div>
              <div class="uk-card uk-card-body uk-width-1-6@m"></div>
              <div class="uk-card uk-card-body uk-width-1-6@m">
                <a href="#" class="uk-button uk-button-primary">Добавить</a>
              </div>
             
              @foreach ($users as $user)
                <div class="uk-card uk-card-body uk-width-1-6@m"><span>{{ $user->id }} {{ $user->chat_id }}</span></div>
                <div class="uk-card uk-card-body uk-width-1-6@m">
                    <span>{{ $user->name }}</span>
                </div>
                <div class="uk-card uk-card-body uk-width-1-6@m"><span>{{ $user->email }}</span></div>
                <div class="uk-card uk-card-body uk-width-1-6@m">
                    @forelse ($user->roles as $role)
                        @if ($role->name == "Admin")
                            <span>Администратор</span>
                        @endif
                        @if ($role->name == "User")
                            <span>Пользователь</span>
                        @endif
                    @empty
                       <span>Пользователь</span>
                    @endforelse
                </div>
                <div class="uk-card uk-card-body uk-width-1-6@m"> 
                    <a href="{{ route('users.edit', $user->id) }}" class="uk-button uk-button-primary">Редактировать</a>
                </div>
                <div class="uk-card uk-card-body uk-width-1-6@m">
                  <!--  <a href="#" class="uk-button uk-button-danger">Удалить</a>-->
                </div>
              @endforeach
           </div>
        </div>
        <!-- /.uk-flex -->
    </div>
    <!-- /.uk-container -->    

@endsection