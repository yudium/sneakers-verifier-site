@extends('layouts.app')

@section('title', 'Verification Link Based')

@section('content')
<div class="login-container">
    <form
        name="new_request"
        action="{{ route('new_request_link_based') }}"
        method="post">
        @csrf
        <div class="ctn-main-font ctn-min-color ctn-standar ctn-center padding-20px">
            {{ __('Verification Link Based') }}
        </div>
        <div class="padding-10px"></div>
        <div class="lc-place">
            <div class="lc-block">
                <div for="email" class="ctn-main-font ctn-min-color ctn-14px ctn-thin">{{ __('Link Address') }}</div>
                <div>
                    <input id="link" type="text" class="txt txt-primary-color" name="link" placeholder="http://...." required autofocus>
                    @if (session('status') == 'FAIL')
                        <div class="ctn-main-font ctn-err-color ctn-14px ctn-thin">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="lc-block">
                <div class="lc-right">
                    <button type="submit" class="btn btn-main-color">
                        {{ __('Post Request') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

