@extends('layouts.app')

@section('title', 'Verification Item: #'.$verification_item->id)

@section('content')

    <div id="verification-item">
    @if ($verification_item->type == 'Gambar')
    @foreach ($verification_item->verification_item_images as $verification_item_image)
    <img src="{{ asset('storage/verification_sneakers_images/'.$verification_item_image->path) }}" alt="Sneakers Image" width="150" height="120">
    @endforeach
    @endif

    @if ($verification_item->type == 'Link')
    Link: {{ $verification_item->verification_item_link->link  }}   <br>
    @endif
    </div>

    <form method="post" action="{{ url()->full() }}">
        @csrf
        <textarea name="note" cols="30" rows="10"></textarea>
        <button name="btn_original"     value="original"        type="submit">TANDAI ASLI</button>
        <button name="btn_not_original" value="not original"    type="submit">TANDAI PALSU</button>
        <button name="btn_rejected"     value="rejected"        type="submit">TANDAI TIDAK BISA DIPROSES</button>
    </form>
@endsection

