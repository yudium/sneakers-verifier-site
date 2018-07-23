@extends('layouts.app')

@section('title', 'Reviewed Verification Item List')

@section('content')

    <div class="list">
        @foreach ($verification_items as $verification_item)
            @include('main.card-verification')
        @endforeach

        {{ $verification_items->links() }}
    </div>

@endsection

