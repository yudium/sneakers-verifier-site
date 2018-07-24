@extends('layouts.app')

@section('title', 'Verificator List')

@section('content')
<div class="list">
    @foreach ($verificators as $verificator)
        <div class="card-profile">
            <div class="top">
                <div class="image image-150px image-circle" style="background-image: url({{ asset($verificator->photo_path) }})"></div>
            </div>
            <div class="mid">
                <span class="ctn-main-font ctn-min-color ctn-16px">{{ $verificator->name }}</span>
            </div>
            <div class="bot">
                <a href="{{ route('public.verificator.profile', ['id' => $verificator->id]) }}">Lihat Profile</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
