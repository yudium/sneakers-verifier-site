@extends('layouts.app')

@section('title', 'Verification Item: #'.$verification_item->id)

@section('content')
<<<<<<< HEAD
<div class="review-result">
    <h3 class="ctn-main-font ctn-min-color ctn-standar padding-10px">
        Detail Verification
    </h3>
    <div class="rr-block">
        <h3 class="ctn-main-font ctn-min-color ctn-20px padding-10px">
            Informations
        </h3>
        <div>
            <div class="ctn-main-font ctn-min-color ctn-16px">
                Submited on: {{ $verification_item->created_at }}
            </div>
            <div class="ctn-main-font ctn-min-color ctn-16px">
                Review status: {{ $verification_item->status_review }}
            </div>
        </div>
=======
    @if (Auth::guard('web_admin')->check())
    <div id="admin-panel">
        <a href="{{ action('VerificationController@delete', ['id' => $verification_item->id]) }}">Hapus Item ini</a>
    </div>
    @endif

    @if ($verification_item->type == 'Gambar')
    Berikut gambar foto sneakers terupload Anda:
    @foreach ($verification_item->verification_item_images as $verification_item_image)
    <img src="{{ asset('storage/verification_sneakers_images/'.$verification_item_image->path) }}" alt="Sneakers Image" width="150" height="120">
    @endforeach
    <div id="verification-info">
        Tanggal upload: {{ $verification_item->created_at }}
        Status review: {{ $verification_item->status_review }}
>>>>>>> 44cfdb7f220cdf3e5e9cf7d9a09c29c97b5e684b
    </div>
    @if ($verification_item->type == 'Gambar')
        <div class="rr-block">
            <h3 class="ctn-main-font ctn-min-color ctn-20px padding-10px">
                Images
            </h3>
            <div class="rr-image">
                @foreach ($verification_item->verification_item_images as $verification_item_image)
                    <img src="{{ asset('storage/verification_sneakers_images/'.$verification_item_image->path) }}">
                @endforeach
            </div>
        </div>
    @endif

    @if ($verification_item->type == 'Link')
        <div class="rr-block">
            <h3 class="ctn-main-font ctn-min-color ctn-20px padding-10px">
                Link
            </h3>
            <a href="{{ $verification_item->verification_item_link->link }}" target="_blank">
                <div class="rr-message">
                    <span class="ctn-main-font ctn-min-color ctn-mikro">
                        {{ $verification_item->verification_item_link->link }}
                    </span>
                </div>
            </a>
        </div>
    @endif
<<<<<<< HEAD
</div>
=======

    @if ($verification_item->status_review == 'Sudah Direview')
    <a href="{{ action('VerificationController@showReviewResult', ['id' => $verification_item]) }}">Lihat Hasil Review</a>
    @endif
>>>>>>> 44cfdb7f220cdf3e5e9cf7d9a09c29c97b5e684b
@endsection

