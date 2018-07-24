@extends('layouts.app')

@section('title', 'Verificator List')

@section('content')
    <table border="1">
    <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Aksi</th>
    </tr>
    @foreach ($verificators as $verificator)
    <tr>
        <td><img width="28" height="28" src="{{ asset($verificator->photo_path) }}" alt=""></td>
        <td>{{ $verificator->name }}</td>
        <td><a href="{{ route('public.verificator.profile', ['id' => $verificator->id]) }}">Lihat Profile</a></td>
    </tr>
    @endforeach
    </table>
@endsection
