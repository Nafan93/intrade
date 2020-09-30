@extends('pages.layouts.page')

@section('pagecontent')
<div class="uk-container">
    <div class="uk-flex uk-flex-center">
        <div class="">
            <div class="uk-card">
                <div class="uk-card-body">
                    <div class="uk-card-title">{{ __('Регистрация') }}</div>
                    <hr class="uk-divider-small">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="uk-margin">
                            <label for="name" class="uk-form-label">{{ __('Имя') }}</label>

                            <div class="uk-form-controls">
                                <input id="name" type="text" class="uk-input uk-form-width-large @error('name') uk-form-danger @enderror" placeholder="{{ __('Ваше имя') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="uk-form-danger" uk-icon="icon: warning"></span>
                                    <span class="uk-form-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label for="email" class="uk-form-label">{{ __('E-Mail') }}</label>

                            <div class="uk-form-controls">
                                <input id="email" type="email" class="uk-input uk-form-width-large @error('email') uk-form-danger @enderror" placeholder="{{ __('Ваш E-mail') }}" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="uk-form-danger" uk-icon="icon: warning"></span>
                                    <span class="uk-form-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label for="password" class="uk-form-label">{{ __('Пароль') }}</label>

                            <div class="uk-form-controls">
                                <input id="password" type="password" class="uk-input uk-form-width-large @error('password') uk-form-danger @enderror" placeholder="{{ __('Введите пароль') }}" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label for="password-confirm" class="uk-form-label">{{ __('Подтвердите пароль') }}</label>

                            <div class="uk-form-controls">
                                <input id="password-confirm" type="password" class="uk-input uk-form-width-large"  placeholder="{{ __('Введите пароль еще раз') }}" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-inline uk-flex uk-flex-center">
                                <button type="submit" class="uk-button uk-button-primary">
                                    {{ __('Регистрация') }}
                                </button>
                            </div>
                            <hr >
                            <div class="uk-flex uk-flex-center uk-flex-column">
                                <span class="uk-align-center">
                                    Есть аккаунт? 
                                    <a class="uk-button-link" href="{{ route('login') }}">
                                        {{ __('Войти') }}
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
