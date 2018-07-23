@extends('layouts.app')

@section('title', 'Biography: '.$verificator->name)

@section('content')
<div class="review-result">
    <h3 class="ctn-main-font ctn-min-color ctn-standar padding-10px">
        Biography
    </h3>
    <h2 class="ctn-main-font ctn-min-color ctn-mikro padding-10px">
        {{ $verificator->name }}
    </h2>

    @if ($verificator->biography !== '')
        <p class="ctn-main-font ctn-min-color ctn-16px ctn-thin">{{ $verificator->biography }}</p>
    @else
        Tidak ada biografi
    @endif
</div>
@endsection
