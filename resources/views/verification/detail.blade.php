@extends('layouts.app')

@section('title', 'Verification Item: #'.$verification_item->id)

@section('content')
    @if ($verification_item->type == 'Gambar')
    Berikut gambar foto sneakers terupload Anda:
    @foreach ($verification_item->verification_item_images as $verification_item_image)
    <img src="{{ asset('storage/verification_sneakers_images/'.$verification_item_image->path) }}" alt="Sneakers Image" width="150" height="120">
    @endforeach
    <div id="verification-info">
        Tanggal upload: {{ $verification_item->created_at }}
        Status review: {{ $verification_item->status_review }}
    </div>
    @endif

    @if ($verification_item->type == 'Link')
    <div class="verification-info">
        Link: {{ $verification_item->verification_item_link->link  }}   <br>
        Tanggal submit: {{ $verification_item->created_at }}            <br>
        Status review: {{ $verification_item->status_review }}
    </div>
    @endif
@endsection

