@extends('layouts.app')

@section('title', 'Profil: '.$user->name)

@section('content')
    <img src="{{ asset('storage/user_photo_profile/ed6780c63ddfde598b0ca2ea33acea2f.jpg') }}" alt="Foto pengguna">
    <p>Tanggal bergabung: {{ $user->created_at }}</p>
    <p>Jumlah pengajuan: {{ $user->verification_items_count }}</p>
    <p>Jumlah yang belum direview: {{ $user->unreviewed_verification_items_count }}</p>

    @foreach ($user->verification_items as $verification_item)
    <div>
        Tanggal upload: {{ $verification_item->created_at }}
        Status review: {{ $verification_item->status_review }}
    </div>
    @endforeach
@endsection

