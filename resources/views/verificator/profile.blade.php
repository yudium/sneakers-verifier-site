@extends('layouts.app')

@section('title', 'Profil: '.$verificator->name)

@section('content')
<div class="frame-profile">
    <div class="fp-left" id="left-container">
        <div class="fp-block">
            <div class="top">
                <div class="image image-full image-radius" style="background-image: url({{ asset($verificator->photo_path) }});"></div>
            </div>
            <div class="mid ctn-main-font ctn-16px ctn-min-color">
                <p class="ctn-main-font ctn-mikro ctn-main-font">
                    {{ $verificator->name }}
                </p>
                <p class="ctn-main-font ctn-16px ctn-main-font ctn-thin">
                    Joined on {{ $verificator->created_at }}
                </p>
                <p class="ctn-main-font ctn-16px ctn-main-font ctn-thin">
                    {{ $verificator->reviewed_count }} Reviewed
                </p>
            </div>
            <div class="padding-bottom-10px">
                <a href="{{ url('/verificator/'.$verificator->id.'/biography') }}">
                    <button class="btn btn-main-color btn-all">
                        <span class="fa fa-lg fa-id-card"></span>
                        <span>Biography</span>
                    </button>
                </a>
            </div>

            @if (Auth::guard('web_verificator')->check())
                @if ($verificator->id == Auth::guard('web_verificator')->user()->id)
                    <!--route('verificator_delete') : not defined-->
                    <div class="padding-bottom-10px">
                        <div class="bdr-bottom"></div>
                    </div>
                    <a href="{{ url('/verificator/change') }}">
                        <button class="btn btn-primary-color btn-all">
                            <span class="fa fa-lg fa-pencil-alt"></span>
                            <span>Edit Account</span>
                        </button>
                    </a>
                    <div class="padding-5px"></div>
                    <a href="{{ url('/verificator/logout') }}">
                        <button class="btn btn-primary-color btn-all">
                            <span class="fa fa-lg fa-power-off"></span>
                            <span>Logout</span>
                        </button>
                    </a>
                    <div class="padding-10px">
                        <div class="bdr-bottom"></div>
                    </div>
                    <form method="post" action="">
                        @csrf
                        <button type="submit" class="btn btn-danger-color btn-all">
                            <span class="fa fa-lg fa-trash-alt"></span>
                            Delete Account
                        </button>
                    </form>
                @endif
            @endif
        </div>
    </div>
    <div class="fp-right">
        @foreach ($verificator->reviews as $review)
            <div class="card-item ci-link">
                <div class="top">
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Review on: {{ $review->created_at }}
                    </div>
                    <div class="ctn-main-font ctn-min-color ctn-16px">
                        Review Result: {{ $review->status }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
{{ $verificator->reviews->links() }}
@endsection

