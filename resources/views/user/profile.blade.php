@extends('layouts.app')

@section('title', 'Profil: '.$user->name)

@section('content')
    <div id="left-container">
        <img id="photo-profile" src="{{ asset('storage/user_photo_profile/'.$user->photo) }}" alt="Foto pengguna">
        <div id="user-information">
            <p>Tanggal bergabung: {{ $user->created_at }}</p>
            <p>Jumlah pengajuan: {{ $user->verification_items_count }}</p>
            <p>Jumlah yang belum direview: {{ $user->unreviewed_verification_items_count }}</p>
        </div>
    </div>

    <div id="main-container">
        <!-- kotak daftar verification item -->
        <div class="list-of-verification-item">
            @foreach ($user->verification_items as $verification_item)
                <!-- kotak item... setiap item berisi 3 gambard dan keterangan tanggal upload + status review -->
                <div class="list-item">
                    @foreach ($verification_item->verification_item_images as $verification_item_image)
                        <img src="{{ asset('storage/verification_sneakers_images/'.$verification_item_image->path) }}" alt="Sneakers Image" width="150" height="120">
                        @if ($loop->iteration == 3)
                            @break
                        @endif
                    @endforeach
                    Tanggal upload: {{ $verification_item->created_at }}
                    Status review: {{ $verification_item->status_review }}
                </div>
            @endforeach
        </div>
    </div>
@endsection

