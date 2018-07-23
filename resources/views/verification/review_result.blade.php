@extends('layouts.app')

@section('title', 'Review result: #'.$verification_item->id)

@section('content')
<div class="review-result">
    <h3 class="ctn-main-font ctn-min-color ctn-standar padding-10px">
        Review Result
    </h3>
    @if ($verification_item->status_review == 'Sudah Direview')
    <div class="rr-special">
        <div class="rr-block">
            <div class="padding-top-15px">
                @if ($verification_item->review->status == 'Asli')
                    <div class="rr-status">
                        <div class="rr-content real">
                            <div class="icn fa fa-2x fa-check-circle"></div>
                            <div class="ttl">REAL</div>
                        </div>
                    </div>
                @endif
                
                @if ($verification_item->review->status == 'Tidak Asli')
                    <div class="rr-status">
                        <div class="rr-content fake">
                            <div class="icn fa fa-2x fa-times"></div>
                            <div class="ttl">FAKE</div>
                        </div>
                    </div>
                @endif

                @if ($verification_item->review->status == 'Review Ditolak')
                    <div class="rr-status">
                        <div class="rr-content reject">
                            <div class="icn fa fa-2x fa-cog"></div>
                            <div class="ttl">REJECT</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="rr-block">
            <h3 class="ctn-main-font ctn-min-color ctn-20px padding-10px">
                Message
            </h3>
            <div class="ctn-main-font ctn-min-color ctn-16px">
                {{ $verification_item->review->note OR 'There is no message' }}
            </div>
        </div>
    </div>
    @endif
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
</div>
@endsection

