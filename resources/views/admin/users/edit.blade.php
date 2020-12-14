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
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <label for="categories">Роли</label>
                                    <button class="uk-button uk-button-default" type="button">Выберите...</button>
                                    <div uk-dropdown="mode: click" style="width: 100%">
                                        <hr>
                                        @foreach ($roles as $role)
                                            <div class="controls">
                                                <input type="radio" name="roles[]" value="{{ $role->id ?? '' }}"
                                                    @isset($user->id)   
                                                        @if ($user->roles->contains('id', $role->id))
                                                            checked
                                                        @endif
                                                    @endisset
                                                    class="uk-checkbox"/>
                                                <label for="" class="uk-form-label">{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div> 
                            <div class="uk-margin">
                                <div class="uk-inline">
                                    <input type="text" class="uk-input uk-form-width-large" value="{{ $user->chat_id }}" name="chat_id" placeholder="Телеграм чат ID"/>
                                </div> 
                                <div class="uk-padding-small uk-padding-remove-left uk-padding-remove-right">
                                    <span>Что бы узнать свой чат ID, нужно отправить боту <a href="https://t.me/chatid_echo_bot">@chatid_echo_bot</a> команду <a href="https://t.me/chatid_echo_bot/start">/start</a></span>
                                </div> 
                            </div> 
                            <!--  <div class="uk-margin">
                                <div class="uk-inline">
                                    <input type="hidden" name="send_message" value="0">
                                    <input type="checkbox" class="uk-checkbox" name="send_message"
                                            value='1' {{ old('$user->send_message') ? 'checked' : '' }}
                                                @if ($user->send_message === 1)
                                                    checked
                                                @endif
                                    />
                                    
                                  <label for="meta_title"><span>Получать сообщения в <a href="https://t.me/IntradeBackOfficeBot" target="_blank"> @IntradeBackOfficeBot</a></span></label>
                                </div>
                            </div>-->
                            <button type="submit" class="uk-button uk-button-primary">Сохранить</button>
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

