@extends('layouts.app')

@section('title', 'Profil: '.$user->name)

@section('content')
    <div class="frame-profile">
        <div class="fp-left" id="left-container">
            <div class="fp-block">
                <div class="top">
                    <div class="image image-full image-radius" style="background-image: url({{ asset($user->photo_path) }});"></div>
                </div>
                <div class="mid ctn-main-font ctn-16px ctn-min-color">
                    <p class="ctn-main-font ctn-mikro ctn-main-font">
                        {{ $user->name }}
                    </p>
                    <p class="ctn-main-font ctn-16px ctn-main-font ctn-thin">
                        Joined on {{ $user->created_at }}
                    </p>
                    <p class="ctn-main-font ctn-16px ctn-main-font ctn-thin">
                        {{ $user->verification_items_count }} Reviewed
                    </p>
                    <p class="ctn-main-font ctn-16px ctn-main-font ctn-thin">
                        {{ $user->unreviewed_verification_items_count }} Unreviewed
                    </p>
                </div>

                @if ($user->id == Auth::user()->id)
                    <a href="{{ url('/user/change') }}">
                        <button class="btn btn-primary-color btn-all">
                            <span class="fa fa-lg fa-pencil-alt"></span>
                            <span>Edit Account</span>
                        </button>
                    </a>
                    <div class="padding-5px"></div>
                    <a href="{{ url('/user/logout') }}">
                        <button class="btn btn-primary-color btn-all">
                            <span class="fa fa-lg fa-power-off"></span>
                            <span>Logout</span>
                        </button>
                    </a>
                    <div class="padding-10px">
                        <div class="bdr-bottom"></div>
                    </div>
                    <form method="post" action="{{ route('user_delete') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger-color btn-all">
                            <span class="fa fa-lg fa-trash-alt"></span>
                            Delete Account
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="fp-right">
            @foreach ($user->verification_items as $verification_item)
                @include('main.card-verification')
            @endforeach
        </div>
    </div>
    {{ $user->verification_items->links() }}
@endsection

