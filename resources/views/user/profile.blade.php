@extends('layouts.app')

@section('title', 'Profil: '.$user->name)

@section('content')
    <img src="{{ asset('storage/user_photo_profile/ed6780c63ddfde598b0ca2ea33acea2f.jpg') }}" alt="Foto pengguna">
    <p>Tanggal bergabung: {{ $user->created_at }}</p>
    <p>Jumlah pengajuan: {{ $user_num_verif_item }}</p>
    <p>Jumlah yang belum direview: {{ $user_num_unreviewed_verif_item }}</p>
@endsection

