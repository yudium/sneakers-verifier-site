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
                </div>
                <div class="bot"></div>
            </div>
            @endif
            @if ($verification_item->type == 'Link')
            <div class="card-item ci-link">
                <a href="{{ url('/verification/review-result/'.$verification_item->id) }}">
                    <div class="top">
                        <div class="link ctn-main-font ctn-mikro">
                            {{ $verification_item->verification_item_link->link }}
                        </div>
                    </div>
                </a>
                <div class="mid">
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Type: Link
                    </div>
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Submited : {{ $verification_item->created_at }}
                    </div>
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Status : <span class="ctn-main-font ctn-int-color ctn-16px">{{ $verification_item->status_review }}</span>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
{{ $user->verification_items->links() }}
@endsection

