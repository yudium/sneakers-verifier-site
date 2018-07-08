@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="login-container">
    <div class="ctn-main-font ctn-min-color ctn-standar padding-20px">{{ __('Login') }}</div>
    <div class="lc-place">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">{{ __('E-Mail Address') }}</div>
                <div>
                    <input id="email" type="email" class="txt txt-primary-color form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <div class="ctn-main-font ctn-err-color ctn-14px ctn-thin">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="lc-block">
                <div for="password" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">{{ __('Password') }}</div>
                <div>
                    <input id="password" type="password" class="txt txt-primary-color form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <div class="ctn-main-font ctn-err-color ctn-14px ctn-thin">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <div class="padding-top-15px">
                    <a class="ctn-main-font ctn-err-color ctn-14px" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            </div>
            <div class="lc-block">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" class="cck cck-min-color" {{ old('remember') ? 'checked' : '' }}>
                        <label class="ctn-main-font ctn-min-color ctn-14px">{{ __('Remember Me') }}</label>
                    </label>
                </div>
            </div>
            <div class="lc-block">
                <div class="lc-right">
                    <button type="submit" class="btn btn-main-color">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
