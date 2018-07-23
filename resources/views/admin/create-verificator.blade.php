@extends('layouts.app')
@section('title', 'Create new Verificator')
@section('content')
<div class="login-container">
    <div class="ctn-main-font ctn-min-color ctn-standar padding-20px">{{ __('Buat akun verificator') }}</div>
    <div class="lc-place">
        <form method="POST" action="{{ route('create_verificator') }}">
            @csrf
            <div class="lc-block">
                <div for="name" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">{{ __('Name') }}</div>
                <div>
                    <input id="name" type="text" class="txt txt-primary-color form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <div class="ctn-main-font ctn-err-color ctn-14px ctn-thin">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">{{ __('E-Mail Address') }}</div>
                <div>
                    <input id="email" type="email" class="txt txt-primary-color form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
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
            </div>
            <div class="lc-block">
                <div for="password-confirm" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">{{{ __('Confirm Password') }}}</div>
                <div>
                    <input id="password-confirm" type="password" class="txt txt-primary-color" name="password_confirmation" required>
                </div>
            </div>
            <div class="lc-block">
                <div class="lc-right">
                    <button type="submit" class="btn btn-main-color">
                        {{ __('Buat verificator') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
