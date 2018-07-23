@extends('layouts.app')

@section('title', 'Profil: '.$user->name)

@section('content')
<<<<<<< HEAD
    <div class="frame-profile">
        <div class="fp-left" id="left-container">
            <div class="fp-block">
                <div class="top">
                    <div class="image image-full image-radius" style="background-image: url({{ asset($user->photo_path) }});"></div>
=======
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

            @if (Auth::check())
            @if ($user->id == Auth::user()->id)
                <a href="{{ url('/user/logout') }}">
                    <button class="btn btn-primary-color btn-all">
                        <span class="fa fa-lg fa-power-off"></span>
                        <span>Logout</span>
                    </button>
                </a>
                <div class="padding-10px"></div>
                <form method="post" action="{{ route('user_delete') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger-color btn-all">
                        <span class="fa fa-lg fa-trash-alt"></span>
                        Delete Account
                    </button>
                </form>
            @endif
            @endif

            @if (Auth::guard('web_admin')->check())
            <div id="admin-panel">
                <form method="post" action="{{ action('UserController@delete', ['id' => $user->id]) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary-color btn-all">
                        Hapus Akun
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>

    <div class="fp-right">
        @foreach ($user->verification_items as $verification_item)
            @if ($verification_item->type == 'Gambar')
            <div class="card-item ci-image">
                <a class="ctn-main-font ctn-mikro" href="{{ url('/verification/review-result/'.$verification_item->id) }}">
                    <div class="top">
                        @foreach ($verification_item->verification_item_images as $verification_item_image)
                            <div class="cl-{{ $loop->iteration }}">
                                <!--gambar tidak muncul-->
                                <div class="image image-full no-bg-color" style="background-image: url('{{ asset('storage/verification_sneakers_images/'.$verification_item_image->path) }}');"></div>
                            </div>


                            @if ($loop->iteration == 3)
                                @break
                            @endif
                        @endforeach
                    </div>
                </a>
                <div class="mid">
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Type: Image
                    </div>
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Uploaded : {{ $verification_item->created_at }}
                    </div>
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Status : <span class="ctn-main-font ctn-int-color ctn-16px">{{ $verification_item->status_review }}</span>
                    </div>
>>>>>>> 44cfdb7f220cdf3e5e9cf7d9a09c29c97b5e684b
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

