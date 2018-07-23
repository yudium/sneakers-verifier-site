@extends('layouts.admin')

@section('title', 'Verification List')

@section('content')
    <div class="list">
        @foreach ($verification_items as $verification_item)
            @include('main.card-verification')
        @endforeach

        {{ $verification_items->links() }}
    </div>

@endsection

