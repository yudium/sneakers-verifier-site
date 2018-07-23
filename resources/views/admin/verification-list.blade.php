@extends('layouts.admin')

@section('title', 'Verification Lists')

@section('content')
<div>
    <div class="ctn-main-font ctn-min-color ctn-standar padding-20px">Verification Lists</div>
    <div class="list">
        @foreach ($verification_items as $verification_item)
            @include('main.card-verification')
        @endforeach

        {{ $verification_items->links() }}
    </div>
</div>
@endsection

