@extends('pages.layouts.page')

@section('pagecontent')
<div class="uk-container">
    <div class="">
        <div class="uk-flex uk-flex-center">
            <div class="uk-card">
                
                <div class="uk-card-body">
                    <div class="uk-card-title">{{ __('Авторизация') }}</div>
                    <hr class="uk-divider-small">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="uk-margin">
                            <div class="uk-inline">
                                <div class="uk-form-controls">
                                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                                    <input id="email" type="email" class="uk-input @error('email') uk-form-danger @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                        </div>
                        
                        <div class="uk-margin">
                            <div class="uk-inline uk-flex">
                                <div class="uk-form-control">
                                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <input id="password" type="password" class="uk-input @error('password') uk-form-danger @enderror" name="password" value="{{ old('password') }}" placeholder="{{ __('Пароль') }}" required autocomplete="current-password">
                                </div>
                                
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-inline">
                                <div class="form-check">
                                    <input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="uk-form-label" for="remember">
                                        {{ __('Запомнить') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-inline">
                                <button type="submit" class="uk-button uk-button-primary">
                                    {{ __('Войти') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="uk-button-text" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif
                            </div>

                            <hr >
                            <div class="uk-flex uk-flex-center uk-flex-column">
                                <span class="uk-align-center">
                                    Нет аккаута? 
                                    <a class="uk-button-link" href="{{ route('register') }}">
                                        {{ __('Зарегистрируйтесь') }}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
