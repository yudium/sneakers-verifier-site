@extends('layouts.app')

@section('title', 'Verification Item: #'.$verification_item->id)

@section('content')
<div class="review-result">
    <h3 class="ctn-main-font ctn-min-color ctn-standar padding-10px">
        Sneaker Details
    </h3>
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

    <div class="padding-10px"></div>

    <h3 class="ctn-main-font ctn-min-color ctn-standar padding-10px">
        Sneaker Reviews
    </h3>

    <form method="post" action="{{ url()->full() }}">
            @csrf
        <div class="rr-block">
            <h3 class="ctn-main-font ctn-min-color ctn-20px padding-10px">
                Your Message
            </h3>
            <textarea name="note" class="txt edit-text txt-primary-color"></textarea>
        </div>
        <div class="rr-block">
            <h3 class="ctn-main-font ctn-min-color ctn-20px padding-10px">
                Your Decision
            </h3>
            <button name="btn_original" value="original" type="submit" class="btn btn-main-color">
                <span class="fa fa-lg fa-check"></span>
                REAL
            </button>
            <button name="btn_not_original" value="not original" type="submit" class="btn btn-danger-color">
                <span class="fa fa-lg fa-times"></span>
                FAKE
            </button>
            <button name="btn_rejected" value="rejected" type="submit" class="btn btn-primary-color" style="float: right;">
                <span class="fa fa-lg fa-cog"></span>
                CAN NOT BE PROCESS
            </button>

        </div>
    </form>

</div>
@endsection

